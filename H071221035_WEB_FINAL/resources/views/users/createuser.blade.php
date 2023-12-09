@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/users" type="button" class="btn search col-md-1 mt-5" style="background-color: gray">Back</a>
    <div class="title d-flex align-items-center justify-content-center">
        <h1>Add Product</h1>
    </div>
    <hr>
    @if (Session::has('failled'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('failled') }}
        </div>
    @endif
    <form class="row g-3" action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="col-12">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="User Name">
        </div>
        <div class="col-12">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" placeholder="User Address">
        </div>
        <div class="col-12">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email Address">
        </div>
        <div class="col-12">
            <label class="form-label">Password</label>
            <input type="text" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="col-12">
            <button type="submit" class="btn search" style="background-color:darkgrey">Add</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@endsection