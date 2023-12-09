@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/users" type="button" class="btn search col-md-1 mt-5" style="background-color: gray">Back</a>
    <div class="title d-flex align-items-center justify-content-center">
        <h1>Edit User</h1>
    </div>
    <hr>
    <form action="{{ route('users.update', $users->id) }}" method="POST">
        @method('PUT')
        <div class="row g-3">
            <div class="col-12 mt-4">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $users->name }}">
            </div>
            <div class="col-12 mt-4">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $users->address }}">
            </div>
            <div class="col-12 mt-4">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $users->email }}">
            </div>
            <div class="col-12mt-4">
                <label class="form-label">Password</label>
                <input type="text" name="password" class="form-control" value="{{ $users->password }}">
            </div>            
            <div class="col-12 mt-4">
                <button type="submit" class="btn search" style="background-color: darkgray">Update</button>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@endsection