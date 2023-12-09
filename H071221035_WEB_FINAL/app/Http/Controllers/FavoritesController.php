<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Favorites;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function index()
    {
        $products = Products::all();
        // mengambil data dari tabel dan mengurutkan secara desc
        $favorites = Favorites::orderBy('created_at', 'DESC')->get();
        return view('favorite/favorites', compact('favorites', 'products'));  // compact artinya kita teruskan data dari products
    }
    public function addToFavorite(Request $request)
    {
        $products = Products::all();
        $productId = $products->first()->id;

        $alreadyFavorite = Favorites::where('user_id', auth()->user()->id)
            ->where('product_id', $productId)
            ->first();

        if ($alreadyFavorite) {
            return redirect()->route('favorite.index')->with('success', 'Items have been added');
        } else {
            $favorite = new Favorites;
            $favorite->user_id = auth()->user()->id;
            $favorite->product_id = $productId;

            $favorite->save();
        }

        return redirect()->route('favorite.index')->with('success', 'Product successfully added to cart');
    }

    public function favoriteDelete(Request $request)
    {
        $favorite = Favorites::find($request->id);

        if ($favorite) {
            $favorite->delete();
            return redirect()->route('favorite.index')->with('success', 'Cart successfully removed');
        }
    }

}
