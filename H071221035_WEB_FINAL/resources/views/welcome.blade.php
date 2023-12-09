<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
        
        .element-border {
            border: 2px dashed gray;
            border-radius: 10px;
            padding: 10px;
            height: 98vh; /* 2px lebar, solid style, warna hitam (#000) */
        }

        li {
            margin-left: 10%;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #5C8374">  
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                <i class="bi bi-shop-window me-2" width="16" height="16"></i>
                Shoope KW
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <form action="/search-product-line" method="POST" class="d-flex">
                            @csrf
                            <input class="form-control me-3" id="productSelect" name="product" placeholder="Search for..." style="width: 300px">
                            <button type="button" id="btnSearchProductLine" class="btn btn-dark btn-outline-white">Search</button>
                        </form>
                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="row" style="display: flex"> 
            <div class="col-md py-2 ">
                <main class="element-border" style="display: flex">
                    <div class="grid-container col-12">
                        <div class="row ">
                            @foreach ($products as $item)
                            <div class="col-md-6 mb-6 mb-4" style="height: 330px; width:390px">
                                    <div class="card">
                                        <img src="{{ asset('/image/'.$item->imagePath) }}"
                                        alt="Product Image" width="384px" height="150px" style="border-radius: 6px">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->productName }}
                                                <span class="badge" style="background-color: #092635; color: #ffffff;">{{ $item->productLine }}</span>
                                            </h5>
                                            <p class="card-text">{{ substr($item->productDescription, 0, 100) }}...</p>
                                            <h6 class="text-end mb-3">Stock: {{ $item->quantityInStock }}</h6>
                                            <a href="/product/{{ $item->id }}" class="btn" style="background-color: #1B4242; color: #ffffff; border-color: #1B4242; margin-top: auto;">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </main>
                </div>
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px; height:100vh; background-color: #1B4242;">
                    <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-4">Menu</span>
                    </p>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/home" class="nav-link text-white me" onclick="toggleActive(this)">
                        <i class="bi bi-house-door me-2" width="16" height="16"></i>
                        Home
                    </a>
                </li>
                    <li>
                        <a href="/home" class="nav-link text-white">
                        <i class="bi bi-speedometer2 me-2" width="16" height="16"></i>
                        Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/home" class="nav-link text-white" onclick="toggleActive(this)">
                        <i class="bi bi-grid me-2" width="16" height="16"></i>
                        Products
                        </a>
                    </li>
                    <li>
                        <a href="/home" class="nav-link text-white">
                        <i class="bi bi-cart me-2" width="16" height="16"></i>
                        Cart
                        </a>
                    </li>
                    <li>
                        <a href="/home" class="nav-link text-white">
                            <i class="bi bi-person-circle me-2" width="16" height="16"></i>
                            Customers
                        </a>
                    </li>
                    <br>
                    <br>
                    <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                        <span class="fs-4">Product</span>
                    </p>
                    <hr>
                    <li>
                        <a href="/home" class="nav-link text-white">
                        <i class="bi bi-plus-circle me-2" width="16" height="16"></i>
                        Add Products
                        </a>
                    </li>
                    <li>
                        <a href="/home" class="nav-link text-white">
                        <i class="bi bi-dash-circle me-2" width="16" height="16"></i>
                        Edit Products
                        </a>
                    </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                    </div>
                </div>
            </div> 
    </div>

    <script>
        document.getElementById('btnSearchProductLine').addEventListener('click', () => {
            var selectedOption = document.getElementById('productSelect').value;
            if (selectedOption) {
                var url = '/home';
                window.location.href = url;
            }
        });
    </script>
</body>
</html>
    