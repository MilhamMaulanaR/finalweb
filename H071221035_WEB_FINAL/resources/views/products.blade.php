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
            @foreach ($products as $item)
                <div class="col-md-6 mb-6 mb-4 " style="width:390px">
                    <div class="card">
                        <img src="{{ asset('/image/'.$item->imagePath) }}"
                        alt="Product Image" style="border-radius: 6px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->productName }}
                                <span class="badge" style="background-color: #092635; color: #ffffff;">{{ $item->productLine }}</span>
                            </h5>
                            <p class="card-text">{{ $item->productDescription }}...</p>
                            <h6 class="text-end mb-3">Stock: {{ $item->quantityInStock }}</h6>
                            <h6 class="text-end mb-3">IDR {{ $item->buyPrice }}</h6>
                            <div class="row" style="justify-content:space-around">
                                <div class="col-md-4">
                                    <form class="" action="{{ route('carts.addToCart', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn" style="background-color: #1B4242; color: #ffffff; border-color: #1B4242; margin-bottom: 10px;">
                                            <i class="bi bi-cart-plus me-2" width="16" height="16"></i>Add
                                        </button>
                                        
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="" action="{{ route('favorite.addToFavorite', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn" style="background-color: #1B4242; color: #ffffff; border-color: #1B4242; margin-bottom: 10px;">
                                            <i class="bi bi-heart-fill me-2" width="16" height="16"></i>Like
                                        </button>
                                        
                                    </form>
                                </div>
                            </div>
                            <a href="/product/{{ $item->id }}" class="btn" style="background-color: #1B4242; color: #ffffff; border-color: #1B4242; margin-top: auto;">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection