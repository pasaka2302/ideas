   <div class="card">
                        <div class="px-3 pt-4 pb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                                    <div>
                                        <h5 class="card-title mb-0"><a href="#"> Mario
                                            </a></h5>
                                    </div>
                                </div>
                                <div>
                                    <form method="post" action="{{ route('ideas.destroy', $idea->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a class="mx-1" href="{{ route('ideas.edit', $idea->id) }}"><i class="fas fa-pen" title="Edit"></i></a>
                                        <a class="mx-1" href="{{ route('ideas.show', $idea->id) }}"><i class="fas fa-eye" title="View"></i></a>
                                       <button type="submit" title="Delete" class="btn btn-danger btn-small">X</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('ideas.update', $idea->id) }}">
                                        @csrf
                                        @method('put')
                                <div class="mb-3">
                                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                                </div>
                                @error('content')
                                    <span class="d-block fs-6 text-danger mb-3">{{ $message }}</span>
                                @enderror
                                 <div class="">
                                    <button type="submit" class="btn btn-sm btn-dark"> Update </button>
                                </div>
                             </form>
                                <hr>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1 text-danger">
                                        </span> {{ $idea->likes }} </a>
                                </div>
                                <div>
                                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                        {{ $idea->created_at }} </span>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <textarea class="fs-6 form-control" rows="1"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm"> Post Comment </button>
                                </div>

                                <hr>
                                <div class="d-flex align-items-start">
                                    <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi"
                                        alt="Luigi Avatar">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="">Luigi
                                            </h6>
                                            <small class="fs-6 fw-light text-muted"> 3 Hours ago</small>
                                        </div>
                                        <p class="fs-6 mt-3 fw-light">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                             Doloremque facere dolores unde magnam officia esse?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>