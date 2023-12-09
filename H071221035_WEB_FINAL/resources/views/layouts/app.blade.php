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
        .btn-custom {
        background-color: #1B4242;
        color: #ffffff; /* Warna teks tombol */
        border-color: #1B4242; /* Warna border tombol (jika diperlukan) */
        }
        li{
            margin-left: 10%
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #5C8374"> 
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                <i class="bi bi-shop-window me-2" width="16" height="16"></i>
                Shoope kw

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul> 

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto " >
                        <form action="/search-product-line" method="POST" class="d-flex">
                            @csrf
                            <input class="form-control me-3" id="productSelect" name="product" placeholder="Search for..." style="width: 1000px">
                            <button type="button" id="btnSearchProductLine" class="btn btn-dark btn-custom">Search</button>

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
                    @yield('content')
                </main>
                <style>
                    .element-border {
                        border: 2px dashed gray;
                        border-radius: 10px;
                        padding: 10px;
                        height: 98vh; /* 2px lebar, solid style, warna hitam (#000) */
                    }
                    </style>
            </div>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px; height:100vh; background-color: #1B4242">
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
                    <a href="/products" class="nav-link text-white" onclick="toggleActive(this)">
                    <i class="bi bi-grid me-2" width="16" height="16"></i>
                    Products
                    </a>
                </li>
                <li>
                    <a href="/carts" class="nav-link text-white">
                    <i class="bi bi-cart me-2" width="16" height="16"></i>
                    Cart
                    </a>
                </li>
                <li>
                    <a href="/favorites" class="nav-link text-white">
                    <i class="bi bi-heart me-2" width="16" height="16"></i>
                    Favorite
                    </a>
                </li>
                <br>
                <br>
                
                <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-4">Dashboard</span>
                </p>
                <hr>
                <li>
                    <a href="/product/create" class="nav-link text-white">
                    <i class="bi bi-plus-circle me-2" width="16" height="16"></i>
                    Add Products
                    </a>
                </li>
                <li>
                    <a href="/items/listproduct" class="nav-link text-white">
                    <i class="bi bi-dash-circle me-2" width="16" height="16"></i>
                    Edit Products
                    </a>
                </li>
                @yield('container')
                <br>
                <br>

                <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-4">Account</span>
                </p>
                <hr>
                <li>
                    <a href="/users" class="nav-link text-white">
                        <i class="bi bi-person-circle me-2" width="16" height="16"></i>
                        User
                    </a>
                </li>
                
                </ul>
                <hr>
            
            </div>
        </div> 
    </div>

    <script>
        document.getElementById('btnSearchProductLine').addEventListener('click', () => {
            var selectedOption = document.getElementById('productSelect').value;
            if (selectedOption) {
                var url = '/products/' + selectedOption;
                window.location.href = url;
            }
        });
    </script>
</body>
</html>
