@extends('layout.layout')
@section('title', 'Messages')
@section('content')
    <div class="container col-md-8 mt-4">
        <h4 class="mb-4">Conversation with {{ $receiver->name }}</h4>

        {{-- LIST YA MESSAGES --}}
        @forelse ($messages as $message)
            @php
                $isSender = $message->sender_id === auth()->id();
            @endphp

            <div class="d-flex mb-3 {{ $isSender ? 'justify-content-end' : 'justify-content-start' }}">
                @if (!$isSender)
                    {{-- Avatar ya receiver upande wa kushoto --}}
                    <img src="{{ $message->sender->getImageUrl() }}" alt="{{ $message->sender->name }}"
                        class="me-2 rounded-circle" style="width: 35px; height: 35px;">
                @endif

                <div class="p-2 rounded" style="max-width: 70%; background-color: {{ $isSender ? '#d1e7dd' : '#f8f9fa' }};">
                    <div class="d-flex justify-content-between">
                        <strong class="me-2">{{ $isSender ? 'You' : $message->sender->name }}</strong>
                        <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-0">{{ $message->content }}</p>
                    @if ($isSender)
                        <small class="text-muted d-block text-end">
                            {{ $message->is_read ? 'Seen' : 'Sent' }}
                        </small>
                    @endif

                </div>

                @if ($isSender)
                    {{-- Avatar ya sender upande wa kulia --}}
                    <img src="{{ $message->sender->getImageUrl() }}" alt="You" class="ms-2 rounded-circle"
                        style="width: 35px; height: 35px;">
                @endif
            </div>
        @empty
            <p class="text-center text-muted">No messages yet. Start the conversation!</p>
        @endforelse

        {{-- FORM YA KUTUMA MESSAGE --}}
        <form action="{{ route('messages.store', $receiver->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="2" autofocus placeholder="Write your message here..."></textarea>
            </div>
            @error('content')
                <span class="d-block text-danger mb-2">{{ $message }}</span>
            @enderror
            <div class="mb-4">
                <button type="submit" class="btn btn-primary btn-sm">Send</button>
            </div>
        </form>
    </div>
@endsection
