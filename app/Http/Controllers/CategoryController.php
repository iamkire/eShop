<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        if (Auth::check()) {
            $products = $category->products;
            $user = auth()->user();
            $count = Cart::countproducts($user);
            return view('welcome', compact('products', 'count'));}
    }

    public function sortBy(Category $category)
    {
        if (Auth::check()) {
            $products = $category->products;
            $user = auth()->user();
            $categories = Category::all();
            $count = Cart::countproducts($user);
            return view('category.category', compact('products', 'count', 'categories'));
        }
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Category $category)
    {
        $attributes = request()->validate([
            'name' => 'required'
        ]);
        $category->create($attributes);

        return redirect('dashboard');
    }
}
