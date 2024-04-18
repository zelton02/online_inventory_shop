<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $users = User::paginate(5);
            $products = Product::paginate(5);
            $orders = Order::paginate(5);
            return view('adminDashboard', ['users' => $users, 'products' => $products, 'orders' => $orders]);
        }
        return redirect('/');
    }
}
