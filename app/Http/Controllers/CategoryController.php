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
            return view('welcome', compact('products', 'count'));
        }
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

    public function welcome()
    {
        return view('category.welcome', [
            'categories' => Category::all()
        ]);
    }

    public function edit($category)
    {
        return view('category.edit', [
            'category' => Category::find($category),
        ]);
    }

    public function delete($category)
    {
        Category::destroy($category);
        return redirect()->back()->with('message','Category has been removed');
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

        return redirect()->back()->with('message' , 'Category has been added');
    }

    public function update(Category $category)
    {
        $category->update([
            'name' => request('name')
        ]);

        return redirect()->back()->with('message' , 'Category has been updated');
    }
}
