<div class = "card border-2 shadow-sm">
    <div class = "card-body">
        <div class="row">
            <ul class = "nav nav-link-secondary flex-column fw-bold gap-1 list-unstyled">
                <li class = "nav-item">
                    <a class = "{{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link d-block text-truncate py-2 px-1"
                        href  = "{{ route('admin.dashboard') }}">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class = "nav-item">
                    <a class = "{{ Route::is('admin.users.index') ? 'text-white bg-primary rounded' : '' }} nav-link d-block text-truncate py-2 px-1"
                        href = "{{ route('admin.users.index') }}">
                        <span>Users</span>
                    </a>
                </li>
                <li class = "nav-item">
                    <a class = "{{ Route::is('admin.ideas.index') ? 'text-white bg-primary rounded' : '' }} nav-link d-block text-truncate py-2 px-1"
                        href = "{{ route('admin.ideas.index') }}">
                        <span>Ideas</span>
                    </a>
                </li>
                <li class = "nav-item">
                    <a class = "{{ Route::is('admin.comments.index') ? 'text-white bg-primary rounded' : '' }} nav-link d-block text-truncate py-2 px-1"
                        href = "{{ route('admin.comments.index') }}">
                        <span>Comments</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
