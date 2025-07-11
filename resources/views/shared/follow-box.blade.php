                    <div class="card-header pb-0 border-0">
                        <h5 class="">Top Users</h5>
                    </div>
                    <div class = "card-body">
                     @foreach ($topUsers as $user)
                        <div class="hstack gap-2 mb-3">
                            <div class="avatar">
                                <a href="{{ route('users.show', $user->id) }}"><img style="width:45px; height:45px; object-fit: cover;" class="avatar-img rounded-circle"
                                        src="{{ $user->getImageUrl() }}" alt=""></a>
                            </div>
                            <div class="overflow-hidden">
                                <a class="h6 mb-0" href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                                <p class="mb-0 small text-truncate">{{ $user->email }}</p>
                            </div>
                        </div>
                     @endforeach
                    </div>