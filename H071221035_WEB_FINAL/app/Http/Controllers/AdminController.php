<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // mengambil data dari tabel dan mengurutkan secara desc
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('users/listuser', compact('users'));  // compact artinya kita teruskan data dari products
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('users/createuser', compact('users'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        // Periksa apakah ada nilai kosong di dalam $requestData
        if (in_array(null, $requestData, true)) {
            return redirect()->back()->with('failled', 'Please fill in all fields!');
        }

        // Jika tidak ada nilai kosong, lanjutkan untuk menyimpan data
        User::create($requestData);
        return redirect()->route('product.index')->with('success', 'Yeay! item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $users = User::findOrFail($id);   //mengambil data berdasarkan id
        return view('items/product-details', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $users = User::findOrFail($id);
        return view('users/edituser', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
{
    $users = User::findOrFail($id);
    
    $requestData = $request->all();

    // Pemeriksaan setiap atribut (kolom) pada model Toko
    if (in_array(null, $requestData, true)) {
        return redirect()->back()->with('failed', 'Please fill in all fields!');
    }

    // Lakukan pembaruan jika tidak ada nilai yang null
    $users->update($requestData);
    return redirect()->route('product.index')->with('success', 'Yeay! item updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('product.index')->with('success', 'Yeay! item deleted successfully!');
    }

    
}
