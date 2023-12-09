<?php

namespace App\Http\Controllers;


use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        // mengambil data dari tabel dan mengurutkan secara desc
        $carts = Carts::orderBy('created_at', 'DESC')->get();
        return view('cart/carts', compact('carts', 'products'));  // compact artinya kita teruskan data dari products
    }

    public function addToCart(Request $request)
    {
        $products = Products::all();
        $productId = $products->first()->id;

        $alreadyCart = Carts::where('user_id', auth()->user()->id)
            ->where('order_id', null)
            ->where('product_id', $productId)
            ->first();

        if ($alreadyCart) {
            $alreadyCart->quantity = $alreadyCart->quantity + 1;
            $alreadyCart->amount = $products->first()->buyPrice + $alreadyCart->amount;

            if ($products->first()->quantityInStock < $alreadyCart->quantity || $products->first()->quantityInStock <= 0) {
                return redirect()->back()->with('error', 'Stock not sufficient!');
            }

            $alreadyCart->save();
        } else {
            $cart = new Carts;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $productId;
            $cart->price = $products->first()->buyPrice;
            $cart->quantity = 1;
            $cart->amount = $cart->price * $cart->quantity;

            if ($products->first()->quantityInStock < $cart->quantity || $products->first()->quantityInStock <= 0) {
                return redirect()->back()->with('error', 'Stock not sufficient!');
            }

            $cart->save();
        }

        return redirect()->route('carts.index')->with('success', 'Product successfully added to cart');
    }

    public function cartDelete($productId)
    {
        $cart = Carts::find($productId);
        if ($cart) {
            $cart->delete();
            return redirect()->route('carts.index')->with('success', 'Cart successfully removed');
        } else {
            return redirect()->route('carts.index')->with('error', 'Cart not found');
        }
    }
    


}
