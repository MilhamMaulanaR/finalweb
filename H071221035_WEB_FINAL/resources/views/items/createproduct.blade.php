@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title d-flex align-items-center justify-content-center">
        <h1>Add Product</h1>
    </div>
    <hr>
    @if (Session::has('failled'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('failled') }}
        </div>
    @endif
    <form class="row g-3" action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="col-12">
            <label class="form-label">Product Name</label>
            <input type="text" name="productName" class="form-control" placeholder="Item Name">
        </div>
        <div class="col-md-6">
            <label class="form-label">Buy Price</label>
            <input type="text" name="buyPrice" class="form-control" placeholder="Item Stock">
        </div>
        <div class="col-md-6">
            <label class="form-label">Stock</label>
            <input type="text" name="quantityInStock" class="form-control" placeholder="Item Price">
        </div>
        <div class="col-12">
            <label class="form-label">Product Lines</label>
            <input type="text" name="productLine" class="form-control" placeholder="Types of Item">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Description</label>
            <textarea type="text" name="productDescription" class="form-control" placeholder="Item Description"></textarea>
        </div>
        <div class-"col 12">
            <label class = "form-label">Image Path</Label>
        <input type="text" name="imagePath" class="form-control" placeholder="Image Path"></
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