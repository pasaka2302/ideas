<nav class = "navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark sticky-top bg-body-tertiary"
    data-bs-theme = "dark">
    <div class = "container">
        <a class = "navbar-brand fw-light" href = "/">
            <span class = "fas fa-brain me-1"></span>{{ config('app.name') }}
        </a>
        <!-- Toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="{{ Route::is('login') ? 'active' : '' }} nav-link" aria-current="page"
                            href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::is('register') ? 'active' : '' }} nav-link"
                            href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

                @auth
                    @if (auth()->user()->is_admin)
                        <li class="nav-item">
                            <a class="{{ Route::is('admin.dashboard') ? 'active' : '' }} nav-link" aria-current="page"
                                href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        </li>
                    @endif
                    @php
                        $unread = Auth::user()->unreadMessagesCount();
                    @endphp
                    @if ($unread > 0)
                        <li class="nav-item">
                            <a class="{{ Route::is('messages.inbox') ? 'active' : '' }} nav-link" aria-current="page"
                                href="{{ route('messages.inbox') }}" title="{{ $unread }} unread messages">
                                <i class="fas fa-envelope"></i>
                                <span class="badge bg-danger">{{ $unread }} </span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="{{ Route::is('profile') ? 'active' : '' }} nav-link" aria-current="page"
                            href="{{ route('profile') }}">Hi, {{ Auth::user()->name }}</a>
                    </li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <li class="nav-item">
                            <button type="submit" class="btn btn-danger" title="Logout">
                                <i class="fas fa-power-off" title="Logout"></i> Logout
                            </button>
                        </li>
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>
