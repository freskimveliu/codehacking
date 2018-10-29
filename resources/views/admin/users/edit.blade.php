@extends('layouts.admin')
@section('content')

    <h1>Edit User</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{ $user->photo->file ?? 'http://placehold.it/400' }}" class="img-responsive">
        </div>
        <div class="col-sm-9">
            <form method="post" action="{{ url("/admin/users/$user->id") }}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" value="{{ $user->name ?? '' }}" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" value="{{ $user->email ?? '' }}" name="email" class="form-control" id="email">
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
                            <option {{ $user->role_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_active">Status:</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option {{ $user->is_active ? '' : 'selected' }} value="0">Not Active</option>
                        <option {{ $user->is_active ? 'selected' : '' }} value="1">Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file">File:</label>
                    <input type="file" name="photo_id" id="file" class="" accept="image/*">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary col-sm-2">Submit</button>
                </div>
            </form>

            <form class="pull-right" style="" action="{{ url("/admin/users/$user->id") }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>

        <div class="col-md-12">
            @include('includes.errors')
        </div>
    </div>
@endsection