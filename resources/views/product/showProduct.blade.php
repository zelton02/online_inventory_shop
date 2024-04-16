@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                    <p class="card-text"><strong>Available Quantity:</strong> {{ $product->quantity }}</p>

                    <form method="POST" action="{{ route('cart.addToCart', $product->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="quantity">Select Quantity:</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" max="{{ $product->quantity }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>

                    @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
