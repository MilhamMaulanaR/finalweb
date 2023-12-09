@extends('layout.app')

@section('container')
<p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    <span class="fs-4">Product</span>
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
@endsection