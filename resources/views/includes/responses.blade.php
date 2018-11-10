@if(session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session()->has('errors'))
    <div class="alert alert-danger">{{ session('errors') }}</div>
@endif