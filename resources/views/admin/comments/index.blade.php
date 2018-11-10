@extends('layouts.admin')
@section('content')

   @include('includes.responses')

    <h1>Comments</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Post</th>
            <th>User</th>
            <th>Email</th>
            <th>Text</th>
            <th>Created At</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td><a href="{{ url("admin/posts/$comment->post_id") }}">{{ $comment->post->title ?? '' }}</a></td>
                <td>{{ $comment->author ?? '' }}</td>
                <td>{{ $comment->email ?? '' }}</td>
                <td>{{ str_limit($comment->body ?? '',30) }}</td>
                <td>{{ $comment->created_at->diffForHumans() }}</td>
                <td>
                    <form method="post" action="{{ url("admin/comments/$comment->id") }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="is_active"
                               value="{{ $comment->is_active ? 0 : 1 }}">
                        <div class="form-group">
                            <button type="submit" class="btn {{ $comment->is_active ? 'btn-info' : 'btn-success' }}">
                                {{ $comment->is_active ? 'Un-approve' : 'Approve' }}
                            </button>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="post" action="{{ url("admin/comments/$comment->id") }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection