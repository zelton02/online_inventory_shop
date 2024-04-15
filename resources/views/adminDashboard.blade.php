@extends('layouts.app')

<style>
    .alert {
        margin-bottom: 20px; /* Add margin below the alert */
        border-radius: 5px; /* Rounded corners */
        padding: 10px 15px; /* Padding inside the alert */
    }
    .alert-success {
        background-color: #d4edda; /* Background color for success alert */
        border-color: #c3e6cb; /* Border color for success alert */
        color: #155724; /* Text color for success alert */
    }
</style>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Admin Dashboard</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Products</h2>
                <a href="{{ route('product.create') }}" class="btn btn-primary">Add +</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Discount</th>
                        <th>Quantity</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Product --}}
                    {{-- If no product --}}
                    @if ($products->count() === 0)
                    <tr>
                        <td colspan="3">No product found.</td>
                    </tr>
                    @endif

                    {{-- If there are products --}}
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px"></td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('product.showUpdate', $product->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>

        <!-- Similar tables for products and orders -->
        <!-- Adapt the table structure and data accordingly -->
        <!-- Don't forget to add routes for product and order CRUD operations -->
    </div>
</div>
@endsection
