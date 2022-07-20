<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store($id)
    {
        if (Auth::id()) {
            $user = auth()->user();
            $product = Product::find($id);

            Cart::create([
                'name' => $user->name,
                'email' => $user->email,
                'product_title' => $product->title,
                'price' => $product->price,
                'quantity' => request('quantity')
            ]);


            return redirect('/')->with('message', 'Product added');
        } else {
            return view('auth.login');
        }
    }
}
