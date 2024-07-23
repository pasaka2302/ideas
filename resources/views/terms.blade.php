    @extends('layout.layout')
    @section('title', "Terms")
    @section('content')   
    <div class = "container py-4">
         <div class = "row">
         <div class = "col-3">
              @include('shared.left-sidebar')
            </div>
            <div class="col-6">
                @include('shared.success-msg')
                <div class="mt-3">
                      <h4>Terms</h4>
                      <p class="fs-6 fw-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel odio atque sint dolore ullam et libero velit, a laboriosam consequatur
                            deserunt laborum, saepe cumque itaque eius iure voluptatum praesentium doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit. A, atque quibusdam!
                            Provident labore repellendus asperiores distinctio, laudantium numquam commodi magni?
                      </p>      
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
