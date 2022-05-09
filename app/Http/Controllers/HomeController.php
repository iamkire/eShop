<?php

namespace App\Http\Controllers;

use App\Models\Cart;

use App\Models\Product;


class HomeController extends Controller
{

    public function search()
    {
        $products = Product::latest();
        if (request('search')) {
            $products->where('title', 'like', '%' . request('search') . '%');
            $products->where('excerpt', 'like', '%' . request('search') . '%');
        }
        $user = auth()->user();


        $count = Cart::cartemail($user);
        return view('welcome', compact(
            'count',
            'products'
        ));
    }
}

