<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductLines;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productlines = ProductLines::all();
        $products = Products::all();
        return view('home', compact('products', 'productlines'));
    }
}
