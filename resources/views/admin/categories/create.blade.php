@extends('layouts.admin')
@section('content')
    <h1>Create Category</h1>
    <form method="post" enctype="multipart/form-data"
          action="{{ url("admin/categories") }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @include('includes.errors')
@endsection