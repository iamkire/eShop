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

        if($products){
            return view('welcome', compact('count', 'products'));
        }
        else{
            return redirect()->back()->with('notFound' , 'Sorry we dont have the specified product');
        }

    }
}

