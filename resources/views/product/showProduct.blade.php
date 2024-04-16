@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                    <p class="card-text"><strong>Discount:</strong> {{ $product->discount }}</p>
                    <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    <!-- Add more product details as needed -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
