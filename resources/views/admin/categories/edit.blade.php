@extends('layouts.admin')
@section('content')
    <h1>Edit Category</h1>
    <form method="post" enctype="multipart/form-data"
          action="{{ url("admin/categories/$category->id") }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" value="{{ $category->name ?? '' }}" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary col-md-3">Submit</button>
        </div>
    </form>
    <form method="post" action="{{ url("admin/categories/$category->id") }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="form-group">
            <button type="submit" class="btn btn-danger pull-right">Submit</button>
        </div>
    </form>
    @include('includes.errors')
@endsection