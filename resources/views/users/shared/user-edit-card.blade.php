        <div  class  = "card">
        <div  class  = "px-3 pt-4 pb-2">
            <form enctype="multipart/form-data" action = "{{ route('users.update', $user->id) }}" method = "POST">
                @csrf
                @method('put')
                <div class = "d-flex align-items-center justify-content-between">
                        <div class = "d-flex align-items-center">
                            <img style = "width:150px; height:150px;" class = "me-3 avatar-sm rounded-circle" src = "{{ $user->getImageUrl() }}" alt = "{{ $user->name }}">
                                    <input type="text" name="name" class="form-control" autofocus value="{{ $user->name }}">
                                    @error('name')
                                    <span class="d-block fs-6 text-danger mb-3">{{ $message }}</span>
                                    @enderror
                        </div>
                                        @auth()
                                            @if (Auth::id() === $user->id)
                                                <a class = "mx-1" href = "{{ route('users.show', $user->id) }}"><i class = "fas fa-eye" title = "View Profile"></i></a>
                                            @endif
                                        @endauth
                </div>
                <div   class = "mt-4">
                                    <div   class = "mb-3">
                                    <h5    class = "fs-5 mb-3"> Profile Picture: </h5>
                                    <input type  = "file" name = "image" class = "form-control">
                                    </div>
                                    @error('image')
                                        <span class="d-block fs-6 text-danger mb-3">{{ $message }}</span>
                                    @enderror
                                    <h5  class = "fs-5"> Bio: </h5>
                                    <div class="mb-3">
                                        <textarea name="bio" class="form-control" autofocus id ="bio" rows="3">{{ $user->bio }}</textarea>
                                    </div>
                                    @error('bio')
                                        <span class="d-block fs-6 text-danger mb-3">{{ $message }}</span>
                                    @enderror
                                    <div class="mb-2">
                                        <button type="submit" class="btn btn-sm btn-dark">Save</button>
                                    </div>
                </div>
            </form>
                <div class = "px-2 mt-4">
                   @include('users.shared.user-statistics')
                </div>
         </div>
        </div>
         <hr>
        