<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.orders', ['orders' => Order::all()]);
    }

    public function update($id)
    {
        $order = Order::find($id);
        $order->status = 'Delivered';
        $order->save();

        return redirect()->back()->with('delivered', 'Order has been delivered');
    }

    public function products()
    {
        return view('admin.products', ['products' => Product::all()]);
    }

    public function delete($order)
    {
        Order::destroy($order);
        return back()->with('orderRemoved', 'Order has been deleted');
    }
}
