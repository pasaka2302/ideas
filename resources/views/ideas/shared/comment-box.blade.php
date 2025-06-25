                            <div>
                                <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <textarea name="comment_content_{{ $idea->id }}" placeholder="Comment on the idea..." class="fs-6 form-control"
                                            rows="1"></textarea>
                                    </div>
                                    @error('comment_content_' . $idea->id)
                                        <span class="d-block fs-6 text-danger mb-3">{{ $message }}</span>
                                    @enderror
                                    @auth
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
                                        </div>
                                    @endauth
                                </form>
                                <hr>
                                @forelse ($idea->comments as $comment)
                                    <div class = "d-flex align-items-start">
                                        <img style = "width:35px; height:35px; object-fit: cover;" class = "me-2 avatar-sm rounded-circle"
                                            src   = "{{ $comment->user->getImageUrl() }}"
                                            alt   = "{{ $comment->user->name }}">
                                        <div class = "w-100">
                                            <div class = "d-flex justify-content-between">
                                                <h6 class = "">{{ $comment->user->name }}</h6>
                                                <small
                                                    class="fs-6 fw-light text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                            </div>
                                            <p class="fs-6 fw-light">
                                                {{ $comment->content }}
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center mt-4 fw-light">No Comments Found!</p>
                                @endforelse
                            </div>
