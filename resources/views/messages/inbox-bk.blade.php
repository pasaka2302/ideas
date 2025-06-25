@extends('layout.layout')
@section('title', 'Inbox')
@section('content')
    <div class="container col-md-8 mt-4">
        <h4 class="mb-4">📥 Unread Messages</h4>

        {{-- check if there are unread messages --}}
        @if ($conversations->isEmpty())
            <p class="text-center text-muted">No unread messages!.</p>
        @else

        <ul class="p-0 list-unstyled">
            @foreach ($conversations as $conversation)
                @php
                    $sender = $conversation['sender'];
                @endphp
                <li class="mb-3">
                    <a href="{{ route('messages.show', $sender->id) }}"
                        class="d-flex align-items-center justify-content-between text-decoration-none p-3 rounded"
                        style="background-color: #f8f9fa;">
                        <div class="d-flex align-items-center">
                            {{-- Profile Image --}}
                            <img src="{{ $sender->getImageUrl() }}" alt="{{ $sender->name }} Avatar"
                                class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">

                            {{-- Name + Email --}}
                            <div class="text-start">
                                <div class="fw-bold text-dark">{{ $sender->name }}</div>
                                <div class="text-muted small">{{ $sender->email }}</div>
                            </div>
                        </div>

                        {{-- Unread Badge --}}
                        <span class="badge bg-danger rounded-pill">
                            {{ $conversation['unread_count'] }} Unread
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
        @endif
    </div>
@endsection



{{-- inbox method --}}

public function inbox()
    {
        $userId = Auth::id();
        // group unread messages by sender
        $conversations = Message::where('receiver_id', $userId)
            ->where('is_read', false)
            ->with('sender')
            ->get()
            ->groupBy('sender_id')
            ->map(function ($message) {
                return
                    [
                        'sender' => $message->first()->sender,
                        'unread_count' => $message->count()
                    ];
            });

        return view('messages.inbox', [
            'conversations' => $conversations
        ]);
    }

    $userId = Auth::id();

    $messages = Message::with('sender', 'receiver')
              ->where(function ($query) use ($userId){
                $query->where('sender_id', $userId)
                ->orWhere('receiver_id', $userId)
              })
              ->orderBy('created_at', 'DESC')
              ->get();
              