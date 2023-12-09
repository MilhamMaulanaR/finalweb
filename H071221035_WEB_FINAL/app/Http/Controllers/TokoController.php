<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Toko;
use App\Models\Products;
use App\Models\ProductLines;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $productlines = ProductLines::all();
        $product = Products::all();
        // mengambil data dari tabel dan mengurutkan secara desc
        $products = Products::orderBy('created_at', 'DESC')->get();
        return view('products', compact('products'));  // compact artinya kita teruskan data dari products
    }

    public function list()
    {
        $productlines = ProductLines::all();
        $product = Products::all();
        // mengambil data dari tabel dan mengurutkan secara desc
        $products = Products::orderBy('created_at')->get();
        return view('items/listproduct', compact('products'));  // compact artinya kita teruskan data dari products
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productlines = ProductLines::all();
        $products = Products::all();
        return view('items/createproduct', compact('products', 'productlines'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $productlines = ProductLines::all();
        $products = Products::all();
        // Periksa apakah ada nilai kosong di dalam $requestData
        if (in_array(null, $requestData, true)) {
            return redirect()->back()->with('failled', 'Please fill in all fields!');
        }

        // Jika tidak ada nilai kosong, lanjutkan untuk menyimpan data
        Toko::create($requestData);
        return redirect()->route('product.index')->with('success', 'Yeay! item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $products = Products::findOrFail($id);   //mengambil data berdasarkan id
        return view('items/product-details', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $products = Products::findOrFail($id);
        return view('items/editproduct', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
{
    $products = Products::findOrFail($id);
    
    $requestData = $request->all();

    // Pemeriksaan setiap atribut (kolom) pada model Toko
    if (in_array(null, $requestData, true)) {
        return redirect()->back()->with('failed', 'Please fill in all fields!');
    }

    // Lakukan pembaruan jika tidak ada nilai yang null
    $products->update($requestData);
    return redirect()->route('product.index')->with('success', 'Yeay! item updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect()->route('product.index')->with('success', 'Yeay! item deleted successfully!');
    }

}
