    @extends('layout.layout')
    @section('title', "Feed")
    @section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
              @include('shared.left-sidebar')
            </div>
            <div class="col-6">
                @include('shared.success-msg')
                @include('ideas.shared.form')
                <hr>
        {{-- @if (count($ideas) > 0)
         @foreach ($ideas as $idea)
                <div class="mt-3">
                 @include('ideas.shared.idea-card')
                </div>
          @endforeach
        @else
            No results found!
        @endif --}}
         @forelse ($ideas as $idea)
            <div class="mt-3">
               @include('ideas.shared.idea-card')
            </div>
         @empty
           <p class="text-center mt-4">No results Found!</p>
         @endforelse
          <div class="mt-3">
            {{ $ideas->withQueryString()->links() }}
          </div>
            </div>
            <div class="col-3">
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