@extends('layouts.admin')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1>Categories</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id ?? '' }}</td>
                <td>
                    <a href="{{ url("admin/categories/$category->id/edit") }}">
                        {{ $category->name ?? '' }}
                    </a>
                </td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection