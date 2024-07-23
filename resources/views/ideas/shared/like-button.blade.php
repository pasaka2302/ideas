 @auth  
 @if(Auth::user()->likesIdea($idea))
     <form action = "{{ route('ideas.unlike', $idea->id) }}" method = "post">
    @csrf
    <div>
        {{-- <button type = "submit" class = "fw-light nav-link fs-6"> <span class = "fas fa-heart me-1" title = "Unlike"></span> {{ $idea->likes()->count() }} </button> --}}
        <button type = "submit" class = "fw-light nav-link fs-6"> <span class = "fas fa-heart me-1" title = "Unlike"></span> {{ $idea->likes_count }} </button>
    </div>
    </form>
 @else
    <form action = "{{ route('ideas.like', $idea->id) }}" method = "post">
        @csrf
        <div>
            <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1 text-danger" title="Like"></span> {{ $idea->likes_count }} </button>
        </div>
    </form>
@endif
@endauth
@guest
     <div>
            <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1 text-danger" title="Like"></span> {{ $idea->likes_count }} </a>
     </div>
@endguest
