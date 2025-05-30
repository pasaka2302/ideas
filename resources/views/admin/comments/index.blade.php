@extends('layout.layout')
@section('title', 'Comments | Admin Dashboard')
@section('content')
    <div class = "container py-4">
        <div class = "row">
            @include('shared.success-msg')
            <div class="col-4 col-lg-3">
                @include('admin.shared.left-sidebar')
            </div>
            <div class="col-8 col-lg-9">
                {{-- <h1>Comments</h1> --}}
                {{-- @include('shared.success-msg') --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Comment</th>
                                <th>Idea</th>
                                <th>User</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td><a href="{{ route('ideas.show', $comment->idea) }}">{{ $comment->idea->id }}</a></td>
                                    <td><a href="{{ route('users.show', $comment->user) }}">{{ $comment->user->name }}</a>
                                    </td>
                                    <td>{{ $comment->created_at->toDateString() }}</td>
                                    <td>
                                        <form action = "{{ route('admin.comments.destroy', $comment) }}" method = "post">
                                            @csrf
                                            @method('delete')
                                            {{-- Using a link the button will not work untill u put some js code alternatively u can use the button as in previous delete buttons eg. ideas delete --}}
                                            {{-- <button type  = "submit" title = "Delete" class = "btn btn-danger btn-small">X</button>  Like this one --}}
                                            <a href = "#"
                                                onclick="this.closest('form').submit(); return false;">Delete</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class = "">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
