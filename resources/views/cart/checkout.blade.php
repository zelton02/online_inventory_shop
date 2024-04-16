<!-- resources/views/cart/checkout.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order Summary</h5>

            <ul class="list-group">
                @foreach ($cart->cartProducts as $cartProduct)
                    <li class="list-group-item">
                        {{ $cartProduct->product->name }} - Quantity: {{ $cartProduct->quantity }} - Total: ${{ $cartProduct->product->price * $cartProduct->quantity }}
                    </li>
                @endforeach
            </ul>

            <div class="mt-3">
                <p><strong>Total Amount:</strong> ${{ $cart->totalAmount() }}</p>
            </div>
        </div>
    </div>

    <h1>Payment</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('payment.process') }}" method="POST">
                @csrf
                <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                <input type="hidden" name="total_amount" value="{{ $cart->totalAmount() }}">
                <div class="form-group">
                    <label for="name">Card Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="card_number">Card Number</label>
                    <input type="text" id="card_number" name="card_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="expiry_date">Expiry Date</label>
                    <input type="text" id="expiry_date" name="expiry_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="billing_address">Billing Address</label>
                    <input type="text" id="billing_address" name="billing_address" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
            </form>
        </div>
    </div>
</div>
@endsection
