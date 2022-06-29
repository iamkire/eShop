<?php

namespace App\Http\Controllers;

use App\Models\Cart;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function search()
    {
        $products = Product::where('title', 'like', '%' . request('search') . '%')->get();
        $count = Cart::countproducts(Auth::user());
        if ($products->count() == 0)
            return view('welcome', compact('count', 'products'))
                ->withErrors(['notFound' => 'We couldn\'t find any results']);
        else {
            return view('welcome', compact('count', 'products'));
        }
    }

}

