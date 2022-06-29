<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        return view('users.index', [
            'categories' => Category::all(),
            'count' => Cart::countproducts(Auth::user()),
        ]);
    }

    public function edit()
    {
        return view('users.edit', [
            'categories' => Category::all(),
            'count' => Cart::countproducts(Auth::user())
        ]);
    }

    public function update()
    {
        request()->validate([
            'phone' => 'numeric'
        ]);
        Auth::user()->update([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'address' => request('address'),
            'image' => ImageController::getImage()
        ]);
        return back()->with(['userEdited' => 'Profile has been updated']);
    }
}
