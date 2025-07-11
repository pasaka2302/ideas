            @auth()
                <h4> Share yours ideas </h4>
                <div class="row">
                    <form action="{{ route('ideas.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <textarea name="content" class="form-control" placeholder="Write your idea here..." autofocus id="content" rows="3"></textarea>
                        </div>
                        @error('content')
                            <span class="d-block fs-6 text-danger mb-3">{{ $message }}</span>
                        @enderror
                        <div class="">
                            <button type="submit" class="btn btn-dark"> Share </button>
                        </div>
                    </form>
                </div>
            @endauth
            @guest()
                <h4>Please Login first, to Share ideas! </h4>
            @endguest
