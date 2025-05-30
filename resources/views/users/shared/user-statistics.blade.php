            <div class = "d-flex justify-content-start">
                <a href="#" title="followers" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $user->followers()->count() }} Followers
                </a>
                <a href="#" title="following" class = "fw-light nav-link fs-6 me-3"> <span class = "fas fa-user me-1">
                    </span> {{ $user->followings()->count() }} Following
                </a>
                <a href="#" title="ideas" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->ideas()->count() }}
                </a>
                <a href="#" title="comments" class="fw-light nav-link fs-6 me-3"> <span
                        class="fas fa-comment me-1">
                    </span> {{ $user->comments()->count() }}
                </a>
                <a href = "#" title = "likes" class = "fw-light nav-link fs-6 me-3"> <span
                        class ="fas fa-heart text-danger">
                    </span> {{ $user->likes()->count() }}
                </a>
            </div>
