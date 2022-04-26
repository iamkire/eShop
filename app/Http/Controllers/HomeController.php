<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class HomeController extends Controller
{
    public function addToCart(Request $request,$id)
    {
        if (Auth::id()) {
            $user = auth()->user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect('/')->with('message', 'Product added');
        } else {
            return view('auth.login');
        }
    }
    public function search(){

        $products = Product::latest();
        if(request('search')){
            $products->where('title','like','%' . request('search') . '%');
            $products->where('excerpt','like','%' . request('search') . '%');
        }
        $user = auth()->user();


        $count = Cart::where('email', $user->email)->count();
        return view('welcome',compact(
            'count',
            'products'
        ));
    }



    public function showItems()
    {
        $user = auth()->user();
        $count = Cart::where('email',$user->email)->count();
        $carts = Cart::where('email',$user->email)->get();
        $categories = Category::all();
        return view('user.showItems',compact('count','carts','categories'));
    }

    public function deleteItems($product)
    {
        $cart = Cart::find($product);
        $cart->delete();
        return redirect()->back()->with('message', 'Product removed');
    }

    public function order(Request $request)
    {
        $user = auth()->user();
        $count = Cart::where('email',$user->email)->count();
        if($count > 0){
        $user = auth()->user();

        $name = $user->name;

        $email = $user->email;

        foreach($request->productTitle as $key => $value){
            $order = new Order;
            $order->product_name = $request->productTitle[$key];
            $order->quantity = $request->quantity[$key];
            $order->price = $request->price[$key];

            $order->name = $name;
            $order->email = $email;
            $order->status = 'Order is processed';

            $order->save();
        }
        DB::table('cart')
            ->where('email',$email)
            ->delete();
        return redirect()->back()
            ->with('success','Your order has been submitted');
    }else{
            return redirect()->back();
        }
    }
}
