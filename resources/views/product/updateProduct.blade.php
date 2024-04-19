@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center mb-4">Update Product</h1>

            <form method="POST" action="{{ route('product.update', $product) }}">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="{{ $product->price }}" required>
                </div>
                {{-- image_url, quantity, discount --}}
                <div class="form-group>
                    <label for="image_url">Product Image URL</label>
                    <input type="text" class="form-control" id="image_url" name="image_url" value="{{ $product->image_url }}" required>
                </div>
                <div class="form-group>
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="0" value="{{ $product->quantity }}" required>
                </div>
                <div class="form-group>
                    <label for="discount">Discount (%)</label>
                    <input type="number" class="form-control" id="discount" name="discount" min="0" value="{{ $product->discount }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
