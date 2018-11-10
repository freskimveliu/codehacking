@extends('layouts.admin')
@section('content')
    <h1>Media</h1>

    @include('includes.responses')

    <form method="post" class="form-inline" action="{{ url('admin/media/delete') }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="form-group">
            <select class="form-control" name="checkBoxArray" id="">
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary">
        </div>
        <table class="table">
            <thead>
            <tr>
                <th><input type="checkbox" id="options" name="medias[]"></th>
                <th>Id</th>
                <th>Photo</th>
                <th>Created At</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}"></td>
                    <td> {{ $photo->id }}</td>
                    <td style="width: 50px;height:50px;">
                        <img class="hover-img" src="{{ $photo->file ?? 'http://placehold.it/200' }}"
                             style="width: 100%;height:100%;object-fit: cover">
                    </td>
                    <td> {{ $photo->created_at->diffForHumans() }}</td>
                    <td>
                        <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                        <div class="form-group">
                            <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            $("#options").click(function () {
                if ($(this).is(':checked')) {
                    $('.checkBoxes').each(function () {
                        this.checked = true;
                    })
                } else {
                    $('.checkBoxes').each(function () {
                        this.checked = false;
                    })
                }
            })
        })
    </script>
@endsection