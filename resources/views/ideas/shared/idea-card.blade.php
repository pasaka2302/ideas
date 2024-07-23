                    <div class="card">
                        <div class="px-3 pt-4 pb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img style="width:50px; height:50px;" class="me-2 avatar-sm rounded-circle"
                                        src="{{ $idea->user->getImageUrl() }}" alt="{{ $idea->user->name; }} Avatar">
                                    <div>
                                        <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">{{ $idea->user->name;}}</a></h5>
                                    </div>
                                </div>
                                <div  class  = "d-flex">
                                            <a class = "mx-2 mt-2" href = "{{ route('ideas.show', $idea->id) }}"><i class = "fas fa-eye" title = "View"></i></a>
                                            @auth
                                                 @can('update', $idea)
                                                    <a class = "mx-2 mt-2" href = "{{ route('ideas.edit', $idea->id) }}"><i class = "fas fa-pen" title = "Edit"></i></a>
                                                    <form method = "post" action = "{{ route('ideas.destroy', $idea->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type  = "submit" title = "Delete" class = "btn btn-danger btn-small">X</button>
                                                    </form> 
                                                @endcan
                                            @endauth
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($editing ?? false)
                             <form method="post" action="{{ route('ideas.update', $idea->id) }}">
                                        @csrf
                                        @method('put')
                                <div class="mb-3">
                                    <textarea name="content" class="form-control" autofocus id="content" rows="3">{{ $idea->content }}</textarea>
                                </div>
                                @error('content')
                                    <span class="d-block fs-6 text-danger mb-3">{{ $message }}</span>
                                @enderror
                                 <div class="mb-2">
                                    <button type="submit" class="btn btn-sm btn-dark"> Update </button>
                                </div>
                             </form>
                            @else
                            <p class="fs-6 fw-light text-muted">
                                {{ $idea->content }}
                            </p>
                            @endif
                            <div class="d-flex justify-content-between">
                                @include('ideas.shared.like-button')
                                <div>
                                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                        {{ $idea->created_at->diffForHumans() }} </span>
                                </div>
                            </div>
                           @include('ideas.shared.comment-box')
                        </div>
                    </div>