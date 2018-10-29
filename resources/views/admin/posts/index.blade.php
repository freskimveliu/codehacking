@extends('layouts.admin')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1>Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id ?? '' }}</td>
                <td style="width: 50px;height:50px;">
                    <img class="hover-img" src="{{ $post->photo->file ?? 'http://placehold.it/200' }}"
                         style="width: 100%;height:100%;object-fit: cover">
                </td>
                <td>
                    <a href="{{ url("admin/users/$post->id") }}">
                        {{ $post->user->name ?? '' }}
                    </a>
                </td>
                <td>
                    <a href="{{ url("admin/categories/$post->id") }}">
                        {{ $post->category->name ?? '' }}
                    </a>
                </td>
                <td>
                    <a href="{{ url("admin/posts/$post->id/edit") }}">
                        {{ $post->title ?? '' }}
                    </a>
                </td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection