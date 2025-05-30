    @extends('layout.layout')
    @section('title', 'Terms')
    @section('content')
        <div class = "container py-4">
            <div class = "row">
                <!-- Desktop Sidebar (visible on larger screens) -->
                <div class = "col-md-3 d-none d-md-block">
                    @include('shared.left-sidebar')
                </div>
                <div class="col-12 d-md-none mb-2">
                    <!-- Toggle button for mobile sidebar -->
                    <button class="btn btn-primary w-100" data-bs-toggle="collapse" data-bs-target="#mobileSidebar">
                        Menu
                    </button>
                    <div id = "mobileSidebar" class = "collapse mt-2">
                        @include('shared.left-sidebar')
                    </div>
                </div>
                <!-- Main Content Area -->
                <div class="col-12 col-md-6">
                    @include('shared.success-msg')
                    <div class="mt-3">
                        <h4>Terms</h4>
                        <p class = "fs-6">
                            Welcome to ideas! Before accessing its features, please take note of the following:
                        </p>
                        <p class="fw-light">
                            1. <b>Registration and Login:</b>
                            To engage with the platform and use its features such as sharing ideas, liking, commenting,
                            updating your profile, and following other users, you must first create an account and log in.
                            Without an account, you will still be able to browse and search for ideas or view user profiles,
                            but you won’t be able to interact with or contribute to the community.
                        </p>
                        <p class="fw-light">
                            2. <b>Comments and Content:</b> While we encourage open discussions, any comments containing
                            insults or
                            offensive language will be removed to maintain a respectful environment. Please engage
                            thoughtfully and respectfully with others.
                        </p>
                        <p class="fw-light">
                            3. <b>Feed: </b>This section provides a customized experience by showing you ideas
                            exclusively from users you have chosen to follow. It allows you to focus on content that matters
                            to you by filtering out posts from users you haven’t followed. This ensures your feed stays
                            relevant and keeps you updated on the thoughts and contributions of the people you are most
                            interested in.
                        </p>
                        <p class="fw-light">
                            4.<b> Version and Future Updates:</b> This is version 1.0 of the system, focused on text-based
                            interaction. In future versions, we plan to introduce more exciting features. We value your
                            feedback, so feel free to share suggestions or ideas for improvements with us. Your input could
                            shape future updates!
                        </p>
                        <p>
                            Thank you <i class="fas fa-heart text-danger"></i> for being part of our community!
                        </p>
                    </div>
                </div>
                <div class="col-md-3 d-none d-md-block">
                    <div class="card">
                        @include('shared.search-box')
                    </div>
                    <div class="card mt-3">
                        @include('shared.follow-box')
                    </div>
                </div>
                <!-- Collapsible search and follow on mobile -->
                <div class="col-12 d-md-none">
                    <button class="btn btn-secondary w-100 mt-3" data-bs-toggle="collapse" data-bs-target="#mobileSearch">
                        <i class="fas fa-search"></i>
                    </button>
                    <div id="mobileSearch" class="collapse mt-2">
                        @include('shared.search-box')
                    </div>
                    <button class="btn btn-secondary w-100 mt-3" data-bs-toggle="collapse" data-bs-target="#mobileFollow">
                        Follow
                    </button>
                    <div id="mobileFollow" class="collapse mt-2">
                        @include('shared.follow-box')
                    </div>
                </div>
            </div>
        </div>
    @endsection
