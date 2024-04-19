@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center mb-4">Add Product</h1>

            <form method="POST" action="{{ route('product.create') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter product description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" placeholder="Enter product price" required>
                </div>
                <div class="form-group">
                    <label for="image_url">Product Image URL</label>
                    <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Enter product image URL" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="0" placeholder="Enter product quantity" required>
                </div>
                <div class="form-group">
                    <label for="discount">Discount (%)</label>
                    <input type="number" class="form-control" id="discount" name="discount" min="0" placeholder="Enter product discount percentage" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
