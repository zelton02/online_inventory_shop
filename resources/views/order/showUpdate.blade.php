@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order Status - Order ID: {{ $order->id }}</h1>
    {{-- Add more details of the order --}}
    <p><strong>Order Date:</strong> {{ $order->created_at }}</p>
    <p><strong>Total Amount:</strong> ${{ $order->cart->totalAmount() }}</p>
    <p><strong>Ordered By:</strong> {{ $order->user->name }}</p>

    <form method="POST" action="{{ route('admin.order.update', ['id' => $order->id]) }}">
        @csrf

        <div class="form-group">
            <label for="status">Order Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>
@endsection
