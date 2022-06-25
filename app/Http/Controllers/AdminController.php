<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showOrder()
    {
        return view('admin.order', ['orders' => Order::all()]);
    }

    public function updateStatus($id)
    {
        $order = Order::find($id);
        $order->status = 'Delivered';
        $order->save();
        return redirect()->back()->with('delivered' ,'Order has been delivered');
    }

    public function products()
    {
        return view('admin.products',['products' => Product::all()]);
    }

    public function delete($order)
    {
        Order::destroy($order);
        return back()->with('orderRemoved' , 'Order has been deleted');
    }
}
