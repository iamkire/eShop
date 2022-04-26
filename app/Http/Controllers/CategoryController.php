<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        if (Auth::check()) {
            $products = $category->products;
            $user = auth()->user();
            $count = Cart::where('email', $user->email)->count();
            return view('welcome', compact(
                'products',
                'count'));
        }
    }

    public function categoryProducts(Category $category)
    {
        $categories = Category::all();
        if (Auth::check()) {
            $products = $category->products;
            $user = auth()->user();
            $count = Cart::where('email', $user->email)->count();
            return view('category.category', compact(
                'products',
                'count',
                        'categories'));
        }
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Category $category, Request $request)
    {
        $request->validate([
            'addCategory' => 'required'
        ]);

        $category->name = $request->addCategory;
        $category->save();
        return redirect('dashboard');
    }
}
