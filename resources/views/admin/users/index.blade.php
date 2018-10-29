@extends('layouts.admin')
@section('content')
    @if(Session::has('deleted_user'))
        <div class="alert alert-danger">
            {{ session('deleted_user') }}
        </div>
    @endif

    <h1>Users</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id ?? '' }}</td>
                <td style="width: 50px;height:50px;display: inline-block;">
                    <img src="{{ $user->photo->file ?? 'http://placehold.it/200' }}" style="width: 100%;height:100%;object-fit: cover">
                </td>
                <td>
                    <a href="{{ url("admin/users/$user->id/edit") }}">
                        {{ $user->name ?? '' }}
                    </a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name ?? 'Not Set' }}</td>
                <td>{{ $user->is_active ? 'Active' : 'Not Active' }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection