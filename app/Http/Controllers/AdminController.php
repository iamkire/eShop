<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showOrder()
    {
        $orders = Order::all();
        return view('admin.showOrder',compact('orders'));
    }

    public function updateStatus($id)
    {
        $order = Order::find($id);

        $order->status='Delivered';
        $order->save();

        return redirect()->back();
    }

    public function products()
    {
        return view('admin.products',[
            'products' => Product::all()
        ]);
    }

    public function delete($order)
    {
        Order::destroy($order);
        return back();
    }
}
