<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MessageController extends Controller
{
    // function to show list of conversations
    public function index()
    {
        $conversations = Message::where('sender_id', Auth::id())
            ->orWhere('receiver_id', Auth::id())
            ->with('sender', 'receiver')
            ->get()
            ->groupBy(function ($message) {
                return $message->sender_id === Auth::id() ? $message->receiver_id : $message->sender_id;
            });

        return view('messages.index', compact('conversations'));
    }

    // showing Conversation between two users
    public function show(User $user)
    {
        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', Auth::id());
        })->orderBy('created_at')->get();

        return view('messages.show', compact('user', 'messages'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'receiver_id' => 'required|exists:users,id',
        //     'content' => 'required|string|max:1000'
        // ]);

        // Message::create(
        //     [
        //         'sender_id'   => Auth::id(),
        //         'receiver_id' => $request->receiver_id,
        //         'content'     => $request->content
        //     ]
        // );

        // return back()->with('flash', "Message sent Successfully");

        return view('messages.store');
    }
}
