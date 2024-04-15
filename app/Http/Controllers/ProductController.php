<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::paginate(5);
        return view('product.home',  ['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            // Image_url, discount, quantity
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
            'discount' => 'nullable|numeric|min:0|max:100',
            'quantity' => 'required|numeric|min:0',
        ]);

        // Create a new product instance
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image_url = $request->input('image_url');
        $product->discount = $request->input('discount');
        $product->quantity = $request->input('quantity');

        // Save the product to the database
        $product->save();

        // Redirect back to the product listing page with a success message
        return redirect()->route('home')->with('success', 'Product created successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('home')->with('success', 'Product deleted successfully!');
    }

    public function showUpdate($id)
    {
        $product = Product::findOrFail($id);
        return view('product.updateProduct', ['product' => $product]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Image_url, discount, quantity
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
            'discount' => 'nullable|numeric|min:0|max:100',
            'quantity' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image_url = $request->input('image_url');
        $product->discount = $request->input('discount');
        $product->quantity = $request->input('quantity');

        $product->save();
        
        return redirect()->route('home')->with('success', 'Product updated successfully!');
    }
}
