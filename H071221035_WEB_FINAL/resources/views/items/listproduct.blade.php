@extends('layouts.app')

<style>
    table {
        justify-content: center;
        align-content: center;
        text-align: center;
    }
    
    .title {
        padding-top: 50px;
    }
    
    .grid-container {
            display: flex;
            grid-template-columns: repeat(3, 1fr);
            width: 100%;
            max-height: 100vh; /* Tentukan ketinggian maksimum grid yang dapat di-scroll */
            overflow-y: auto; /* Tambahkan overflow-y untuk membuat grid dapat di-scroll */
    }

</style>
@section('content')
<div class="grid-container row">
    <div class="title d-flex justify-content-center">
        <h1>List Product</h1>
    </div>
    <hr>
    {{-- memeriksa apakah ada sesi (session) dengan kunci 'success' --}}
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Product Lines</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        @if ($products->count() > 0)
        {{-- lakukan perulangan bila data lebih > 0 --}}
            @foreach ($products as $item)  
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->productName }}</td>
                    <td class="align-middle">{{ $item->buyPrice }}</td>
                    <td class="align-middle">{{ $item->productLine }}</td>
                    <td class="align-middle">{{ $item->quantityInStock }}</td>
                    <td class="align-middle">
                        <a href="{{ route('product.show', $item->id) }}" class="btn btn-secondary">Detail</a>
                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="btn btn-danger p-0 m-0" onsubmit="return confirm('Delete Product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>                        
                    </td>
                </tr>
            @endforeach
            {{-- else jika tidak ada data ditemukan --}}
        @else
        <tr>
            <td class="text-center" colspan="5">Items Not Found</td>
        </tr>
        @endif
    </table>
@endsection