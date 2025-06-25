@extends('layout.layout')
@section('title', 'Inbox')
@section('content')
    <div class="container col-md-8 mt-4">
        <h4 class="mb-4">📥 Inbox</h4>

        @if ($conversations->isEmpty())
            <p class="text-center text-muted">No messages yet.</p>
        @else
            <ul class="p-0 list-unstyled">
                @foreach ($conversations as $conversation)
                    @php
                        $user = $conversation['user'];
                        $lastMessage = $conversation['last_message'];
                        $unread = $conversation['unread_count'];
                    @endphp
                    <li class="mb-3">
                        <a href="{{ route('messages.show', $user->id) }}"
                            class="d-flex align-items-center justify-content-between text-decoration-none p-3 rounded"
                            style="background-color: #f8f9fa;">
                            <div class="d-flex align-items-center">
                                <img src="{{ $user->getImageUrl() }}" alt="{{ $user->name }} Avatar"
                                    class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">

                                <div class="text-start">
                                    <div class="fw-bold text-dark">{{ $user->name }}</div>
                                    <div class="text-muted small">
                                        {{ \Illuminate\Support\Str::limit($lastMessage->content, 50) }}
                                        <br>
                                        <small
                                            class="text-secondary">{{ $lastMessage->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>

                            @if ($unread > 0)
                                <span class="badge bg-danger rounded-pill">
                                    {{ $unread }} Unread
                                </span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Pagination links --}}
            <div class="mt-4">
                {{ $conversations->links() }}
            </div>
        @endif
    </div>
@endsection
