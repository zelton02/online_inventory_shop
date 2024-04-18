<!-- resources/views/orders/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Total Amount</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->status }}</td>
                <td>${{ $order->cart->totalAmount()}}</td>
                <td>
                    <a href="{{ route('admin.orders.edit', ['id' => $order->id]) }}" class="btn btn-sm btn-primary">Edit Status</a>
                </td>
            </tr>
            @endforeach
        </tbody>
</div>
@endsection
