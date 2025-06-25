<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    // showing Conversation between two users
    public function show(User $user)
    {
        // Update the status of is_read from false to true when receiver read message
        Message::where('receiver_id', Auth::id())
            ->where('sender_id', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        // Displaying all messages between sender and receiver
        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view(
            'messages.show',
            [
                'messages' => $messages,
                'receiver' => $user
            ]
        );
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'content' => 'required|string|max:5000'
        ]);

        try {

            Message::create(
                [
                    'sender_id'   => Auth::id(),
                    'receiver_id' => $user->id,
                    'content'     => $request->content,
                    'is_read'     => false
                ]
            );
        } catch (\Exception $e) {
            // log the error message
            Log::error("Failed to send message: " .  $e->getMessage());
            // redirect back with error Message
            return redirect()->back()->withErrors(["content" => "Failed to send Message. Please try again later!"]);
        }

        // Disabling sweetalert message to show on successfuly sending of messages
        // return redirect()->route("messages.show", $user->id)->with('flash', "Message sent Successfully");
        return redirect()->route("messages.show", $user->id);
    }

    // public function inbox()
    // {
    //     $userId = Auth::id();
    //     // group unread messages by sender
    //     $conversations = Message::where('receiver_id', $userId)
    //         ->where('is_read', false)
    //         ->with('sender')
    //         ->get()
    //         ->groupBy('sender_id')
    //         ->map(function ($message) {
    //             return
    //                 [
    //                     'sender' => $message->first()->sender,
    //                     'unread_count' => $message->count()
    //                 ];
    //         });

    //     return view('messages.inbox', [
    //         'conversations' => $conversations
    //     ]);
    // }


    public function inbox(Request $request)
    {
        $userId = Auth::id();

        // Step 1: Get all messages where the current user is either the sender or receiver
        $messages = Message::with('sender', 'receiver')
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Step 2: Build an array to hold conversations grouped by the "other" user
        $conversations = [];

        foreach ($messages as $message) {
            // Figure out who the "other" person is in this message
            $otherUser = $message->sender_id == $userId ? $message->receiver : $message->sender;
            $otherUserId = $otherUser->id;

            // If this conversation hasn't been added yet, initialize it
            if (!isset($conversations[$otherUserId])) {
                $conversations[$otherUserId] = [
                    'user' => $otherUser,
                    'last_message' => $message,
                    'unread_count' => 0,
                    'has_unread' => false
                ];
            }

            // If the message is from the other user and not read, increase the unread count
            if ($message->receiver_id == $userId && !$message->is_read) {
                $conversations[$otherUserId]['unread_count']++;
                $conversations[$otherUserId]['has_unread'] = true;
            }
        }

        // Step 3: Convert to collection and sort — unread conversations first, then by latest message
        $sortedConversations = collect($conversations)->sortByDesc(function ($conv) {
            return [$conv['has_unread'], $conv['last_message']->created_at];
        });

        // Step 4: Paginate manually (10 per page)
        $perPage = 10;
        $page = $request->get('page', 1);
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $sortedConversations->slice(($page - 1) * $perPage, $perPage)->values(),
            $sortedConversations->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('messages.inbox', [
            'conversations' => $paginated
        ]);
    }
}
