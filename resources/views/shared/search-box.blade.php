                    <div class="card-header pb-0 border-0">
                        <h5 class="">Search</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard') }}" method="GET">
                            <input name="search" value="{{ request('search', '') }}" placeholder="search an idea..."
                                class="form-control w-100 fs-6 fw-light" type="text" id="search">
                            <button type="submit" class="btn btn-dark mt-2"> Search</button>
                        </form>
                    </div>
