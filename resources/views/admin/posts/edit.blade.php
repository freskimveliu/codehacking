@extends('layouts.admin')
@section('content')
    <h1>Edit Post</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{ $post->photo->file ?? 'http://placehold.it/400' }}" class="img-responsive">
        </div>
        <div class="col-md-9">
            <form method="post" enctype="multipart/form-data"
                  action="{{ url("admin/posts/$post->id") }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" value="{{ $post->title ?? '' }}" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option {{ $category->id == $post->category_id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo_id">Photo:</label>
                    <input type="file" class="form-control" accept="image/*" name="photo_id" id="photo_id">
                </div>
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea name="body" id="body" rows="5" class="form-control">{{ $post->body ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary col-sm-3">Submit</button>
                </div>
            </form>
            <form class="pull-right" style="" action="{{ url("/admin/posts/$post->id") }}" method="post">
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