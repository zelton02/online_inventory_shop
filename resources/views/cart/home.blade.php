@extends('layouts.app')

<style>
    .w-5{
        display: none
    }
</style>

@section('content')
@include('components.header')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center mb-4">Carts List</h1>

            @if ($cartItems->count() > 0)
                <table class="list-group" border="1">
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <!-- Add more headers as needed -->
                    </tr>
                    @foreach ($cartItems as $cartItem)
                    <tr class="list-group-item">
                        <td>{{ $cartItem->id }}</td>
                        <td>{{ $cartItem->product_id }}</td>
                        <td>{{ $cartItem->description }}</td>
                        <td>{{ number_format($cartItem->price, 2) }}</td>
                        <td>{{ $cartItem->price }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>{{ $cartItem->customer_id }}</td>
                        <td>
                            <a href="{{ route('product.showUpdate', $cartItem->id) }}" class="btn btn-primary">Update</a>
                        </td>
                        <td>
                            <form action="{{ route('product.destroy', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <!-- Add more details as needed -->
                    </tr>
                    @endforeach
                </table>

                <span>
                    {{ $cartItems->links() }} <!-- Render pagination links -->
                </span>
            @else
                <p>No products found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
