    @extends('layout.layout')
    @section('title', 'Show Idea')
    @section('content')
        <div class = "container py-4">
            <div class = "row">
                {{-- @include('shared.success-msg') --}}
                <div class="col-md-3 d-none d-md-block">
                    @include('shared.left-sidebar')
                </div>
                <div class="col-12 col-md-6">
                    {{-- @include('shared.success-msg') --}}
                    <div class="mt-3">
                        @include('ideas.shared.idea-card')
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
            </div>
        </div>
    @endsection
 