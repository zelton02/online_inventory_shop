<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index()
    {
        $orders = auth()->user()->orders;
        return view('order.index', ['orders' => $orders]);
    }
}
