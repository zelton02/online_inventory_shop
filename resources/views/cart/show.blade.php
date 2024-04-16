<!-- resources/views/cart/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Shopping Cart</h1>

    @if ($cart && $cart->cartProducts->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->cartProducts as $cartProduct)
                    <tr>
                        <td>{{ $cartProduct->product->name }}</td>
                        <td>${{ number_format($cartProduct->product->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $cartProduct->id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $cartProduct->quantity }}" min="1" max="{{ $cartProduct->product->quantity }}">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>${{ number_format($cartProduct->product->price * $cartProduct->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $cartProduct->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right">
            <p><strong>Total:</strong> ${{ number_format($cart->totalAmount(), 2) }}</p>
            {{-- <a href="{{ route('cart.checkout') }}" class="btn btn-success">Proceed to Checkout</a> --}}
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
