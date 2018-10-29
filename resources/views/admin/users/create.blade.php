@extends('layouts.admin')
@section('content')

    <h1>Create Users</h1>
    <form method="post" action="{{ url('/admin/users') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="role_id">Role:</label>
            <select class="form-control text-capitalize" name="role_id" id="role_id">
                <option></option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_active">Status:</label>
            <select class="form-control" name="is_active" id="is_active">
                <option value="0">Not Active</option>
                <option value="1">Active</option>
            </select>
        </div>
        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" name="photo_id" id="file" class="" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @include('includes.errors')

@endsection