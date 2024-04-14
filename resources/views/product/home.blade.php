@extends('layouts.app')

<style>
    .w-5{
        display: none
    }
</style>

@section('content')
<div class="container">
    <a href="{{ route('product.create') }}" class="btn btn-primary">New Product</a>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center mb-4">Products List</h1>

            @if ($products->count() > 0)
                <table class="list-group" border="1">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <!-- Add more headers as needed -->
                    </tr>
                    @foreach ($products as $product)
                    <tr class="list-group-item">
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                        <td>
                            <a href="{{ route('product.showUpdate', $product->id) }}" class="btn btn-primary">Update</a>
                        </td>
                        <td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
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
                    {{ $products->links() }} <!-- Render pagination links -->
                </span>
            @else
                <p>No products found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
