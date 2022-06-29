<?php

namespace App\Http\Controllers;

use App\Mail\ThankYouEmail;
use App\Mail\WelcomeEmail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


    public function show()
    {
        $user = auth()->user();
        $count = Cart::countproducts($user);
        $carts = Cart::where('email', $user->email)->get();
        return view('cart.show', compact('count', 'carts'));
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        $count = Cart::where('email', $user->email)->count();
        if ($count > 0) {
            $user = auth()->user();
            $name = $user->name;
            $email = $user->email;

            foreach ($request->productTitle as $key => $value) {
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
                ->where('email', $email)
                ->delete();
            Mail::to(Auth::user())->send(new ThankYouEmail());
            return new ThankYouEmail();
        } else {
            return redirect()->back();
        }
    }


    public function delete($order)
    {
        Cart::destroy($order);
        return redirect()->back()->with('message', 'Order has been removed');
    }
}
