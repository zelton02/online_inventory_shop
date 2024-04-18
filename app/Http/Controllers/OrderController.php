<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //

    public function index()
    {
        $orders = auth()->user()->orders;
        return view('order.index', ['orders' => $orders]);
    }

    public function showUpdate($id)
    {
        $order = Order::findOrFail($id);
        return view('order.showUpdate', ['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:processing,shipped,delivered', // Define valid status options
        ]);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('home')->with('success', 'Order updated successfully!');
    }
}
