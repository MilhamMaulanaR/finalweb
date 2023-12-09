@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/products" type="button" class="btn search col-md-1 mt-5" style="background-color:slategrey">Products</a>
    <div class="title d-flex align-items-center justify-content-center">
        <h1>Product Details</h1>
    </div>
    <hr>
    <div class="row g-3">
        <div class="col-md-6 mt-4">
            <label class="form-label">Product Name</label>
            <input type="text" name="nama" class="form-control" value="{{ $products->productName }}" readonly>
        </div>
        <div class="col-md-6 mt-4">
            <label class="form-label">Product Lines</label>
            <input type="text" name="jenis" class="form-control" value="{{ $products->productLine }}" readonly>
        </div>
        <div class="col-md-6 mt-4">
            <label class="form-label">Price</label>
            <input type="text" name="harga" class="form-control" value="{{ $products->buyPrice }}" readonly>
        </div>
        <div class="col-md-6 mt-4">
            <label class="form-label">Stock</label>
            <input type="text" name="harga" class="form-control" value="{{ $products->quantityInStock }}" readonly>
        </div>
        <div class="col-md-12 mt-4">
            <label for="inputAddress2" class="form-label">Description</label>
            <textarea type="text" name="deskripsi" class="form-control" readonly>{{ $products->productDescription }}</textarea>
        </div>
        <a href="/items/listproduct" type="button" class="btn search col-md-1 mt-5" style="background-color: darkgray">Back</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@endsection