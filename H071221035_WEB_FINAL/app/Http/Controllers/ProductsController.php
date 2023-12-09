<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use App\Models\ProductLines;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function get_random_products()
    {
        $productlines = ProductLines::all();
        $products = Products::inRandomOrder()->get();
        return view('welcome', compact('products', 'productlines'));
    }

    public function get_all_products()
    {
        $productlines = ProductLines::all();
        $products = Products::all();
        return view('products', compact('products', 'productlines'));
    }

    public function get_details($value)
    {
        $productlines = ProductLines::all();
        foreach ($productlines as $item) {
            if ($value === $item->productLine) {
                $products = Products::all()->where('productLine', $value);
                return view('products', compact('products', 'productlines'));
            }
        }
        $productdetails = Products::all()->where('productCode', $value);
        return view('product-details', compact('productdetails', 'productlines'));
    }

}
