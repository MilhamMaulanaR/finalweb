@extends('layouts.app')

@section('content')
<style>
    .card {
        height: 100%;
    }

    .card img {
        object-fit: cover;
    }

    .card-title {
        letter-spacing: 0.5px;
        line-height: 1.5;
    }
    
    .card-body {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .card-text {
        flex-grow: 1;
        overflow: hidden;
    }

    .grid-container {
        display: flex;
        grid-template-columns: repeat(3, 1fr);
        width: 100%;
        max-height: 100vh; /* Tentukan ketinggian maksimum grid yang dapat di-scroll */
        overflow-y: auto; /* Tambahkan overflow-y untuk membuat grid dapat di-scroll */
    }
</style>

<div class="grid-container col-12">
    <div class="row ">
        @foreach ($carts as $item)
            <div class="col-md-6 mb-6 mb-4 border">
                <div class="card">
                    <img src="{{ asset('/image/'.$products->first()->imagePath) }}"
                    alt="Product Image" style="border-radius: 6px" class="border">
                    <div class="card-body">
                        <h5 class="card-title">{{ $products->first()->productName }}
                            <span class="badge" style="background-color: #1B4242; color: #ffffff;">{{ $products->first()->productLine }}</span>

                        </h5>
                        <br>
                        <br>
                        <h6 class="text-end mb-3">{{ $item->quantity }} Items</h6>
                        <h6 class="text-end mb-3">IDR {{ $item->amount }}</h6>
                        <div class="col-md-4">
                            <form class="" action="{{ route('carts.delete', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger" style="margin-bottom: 10px;">
                                    <i class="bi bi-x me-2"></i>Delete
                                </button>                                
                            </form>
                        </div>
                        <a href="" class="btn mt-auto" style="background-color: #1B4242; color: #ffffff; border-color: #1B4242;">CheckOut</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection