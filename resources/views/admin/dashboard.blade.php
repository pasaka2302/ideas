    @extends('layout.layout')
    @section('title', 'Dashboard')
    @section('content')
        <div class = "container py-4">
            <div class = "row">
                <div class = "col-4 col-lg-3">
                    @include('admin.shared.left-sidebar')
                </div>
                <div class="col-8 col-lg-9">
                    {{-- <h1>Admin Dashboard</h1> --}}
                    <div class = "row">
                        <div class="col-sm-6 col-md-4 mb-3">
                            @include('admin.shared.card', [
                                'icon' => 'fas fa-users',
                                'title' => 'Total Users',
                                'data' => $totalUsers,
                            ])
                        </div>
                        <div class="col-sm-6 col-md-4 mb-3">
                            @include('admin.shared.card', [
                                'icon' => 'fas fa-lightbulb',
                                'title' => 'Total Ideas',
                                'data' => $totalIdeas,
                            ])
                        </div>
                        <div class="col-sm-6 col-md-4 mb-3">
                            @include('admin.shared.card', [
                                'icon' => 'fas fa-comment',
                                'title' => 'Total Comments',
                                'data' => $totalComments,
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
