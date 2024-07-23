    @extends('layout.layout')
    @section('title', "Home")
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
               <p class="text-center mt-4">No Ideas Found!</p>
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