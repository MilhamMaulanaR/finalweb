@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/items/listproduct" type="button" class="btn search col-md-1 mt-5" style="background-color: gray">Back</a>
    <div class="title d-flex align-items-center justify-content-center">
        <h1>Update Product</h1>
    </div>
    <hr>
    <form action="{{ route('product.update', $products->id) }}" method="POST">
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6 mt-4">
                <label class="form-label">Product Name</label>
                <input type="text" name="productName" class="form-control" value="{{ $products->productName }}">
            </div>
            <div class="col-md-6 mt-4">
                <label class="form-label">Jenis Barang</label>
                <input type="text" name="productLines" class="form-control" value="{{ $products->productLine }}">
            </div>
            <div class="col-md-6 mt-4">
                <label class="form-label">Price</label>
                <input type="text" name="buyPrice" class="form-control" value="{{ $products->buyPrice }}">
            </div>
            <div class="col-md-6 mt-4">
                <label class="form-label">Stock</label>
                <input type="text" name="quantityInStock" class="form-control" value="{{ $products->quantityInStock }}">
            </div>
            <div class="col-12 mt-4">
                <label for="inputAddress2" class="form-label">Deskripsi</label>
                <textarea name="productDescription" class="form-control">{{ $products->productDescription }}</textarea>
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