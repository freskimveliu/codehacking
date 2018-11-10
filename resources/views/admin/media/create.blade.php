@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css"/>
@endsection
@section('content')
    <h1>Upload Media</h1>
    <form class="dropzone" action="{{ url("/admin/media") }}" method="post">
        {{ csrf_field() }}
    </form>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection