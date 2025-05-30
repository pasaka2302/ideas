<div class = "card">
    <div class = "px-3 pt-4 pb-2">
        <div class = "d-flex align-items-center justify-content-between">
            <div class = "d-flex align-items-center">
                <img style = "width:150px; height:150px;" class = "me-3 avatar-sm rounded-circle"
                    src   = "{{ $user->getImageUrl() }}" alt   = "{{ $user->name }} Avatar">
                <div>
                    <h3 class="card-title mb-0">
                        <a href="#"> {{ $user->name }} </a>
                    </h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            @can('update', $user)
                <a class="mx-1" href="{{ route('users.edit', $user->id) }}">
                    <i class="fas fa-pen" title="Edit"></i>
                </a>
            @endcan
        </div>
        <div class="px-2 mt-4">
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            @include('users.shared.user-statistics')

            @auth
                {{-- Follow/Unfollow and DM Actions --}}
                @if (Auth::user()->isNot($user))
                    <div class="mt-3 d-flex align-items-center">
                        {{-- Follow/Unfollow Button --}}
                        @if (Auth::user()->follows($user))
                            <form action="{{ route('users.unfollow', $user->id) }}" method="post" class="me-2">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">UnFollow</button>
                            </form>
                        @else
                            <form action="{{ route('users.follow', $user->id) }}" method="post" class="me-2">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Follow</button>
                            </form>
                        @endif

                        {{-- DM Button --}}
                        <a href="{{ route('messages.store', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">
                            Message
                        </a>
                        {{-- <form action="{{ route('messages.index', $user->id) }}" method="post" class="me-2">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Message</button>
                        </form> --}}
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
<hr>
