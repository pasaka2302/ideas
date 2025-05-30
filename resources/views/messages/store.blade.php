@extends('layout.layout')
@section('title', 'Messages')
@section('content')
    <div class = "container py-4">
        <div class = "row">
            @include('shared.success-msg')
            <!-- Sidebar collapses into button on mobile -->
            <div class = "col-md-3 d-none d-md-block">
                @include('shared.left-sidebar')
            </div>

            <div class = "col-12 d-md-none mb-3">
                <!-- Toggle button for mobile sidebar -->
                <button class="btn btn-primary w-100" data-bs-toggle="collapse" data-bs-target="#mobileSidebar">
                    Menu
                </button>
                <div id="mobileSidebar" class="collapse mt-2">
                    @include('shared.left-sidebar')
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-12 col-md-6">
                {{-- @include('shared.success-msg') --}}
                @include('ideas.shared.form')
                <hr>

                <!-- Ideas List -->
                @forelse ($ideas as $idea)
                    <div class="mt-3">
                        {{-- @include('ideas.shared.idea-card') --}}
                    </div>
                @empty
                    <p class="text-center mt-4">No results Found!</p>
                @endforelse

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $ideas->withQueryString()->links() }}
                </div>
            </div>

            <!-- Sidebar for search and follow boxes -->
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
