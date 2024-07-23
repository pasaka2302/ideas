    @extends('layout.layout')
    @section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
              @include('shared.left-sidebar')
            </div>
            <div class="col-6">
                @include('shared.success-msg')
                <div class="mt-3">
                 @include('users.shared.user-edit-card')
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