<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartProduct;
use Auth;

class CartController extends Controller
{
    // Display the user's cart
    public function index()
    {
        $cart = $this->getActiveCart();

        return view('cart.show', ['cart' => $cart]);
    }

    public function update(Request $request, $id){
        $cartProduct = CartProduct::findOrFail($id);
        $quantity = $request->input('quantity');
        if ($quantity <= 0 || $quantity > $cartProduct->product->quantity) {
            return redirect()->back()->with('error', 'Invalid quantity selected.');
        }
        $cartProduct->update([
            'quantity' => $quantity,
        ]);
        return redirect()->route('cart.show')->with('success', 'Cart updated successfully.');
    }

    public function remove($id){
        $cartProduct = CartProduct::findOrFail($id);
        $cartProduct->delete();
        return redirect()->route('cart.show')->with('success', 'Product removed from cart successfully.');
    }

    // Retrieve the active cart for the authenticated user
    private function getActiveCart()
    {
        $user = Auth::user();

        // Find the user's active cart that has no associated orders
        $cart = Cart::where('user_id', $user->id)
                    ->whereDoesntHave('order')
                    ->first();

        // If no active cart is found, create a new cart for the user
        if (!$cart) {
            $cart = new Cart(['user_id' => $user->id]);
            $cart->save();
        }

        return $cart;
    }

    // Add a product to the user's cart
    public function addToCart(Request $request, $id)
    {
        // Retrieve the active cart for the user
        $activeCart = $this->getActiveCart();

        // Retrieve the product by ID
        $product = Product::findOrFail($id);

        // Validate the requested quantity
        $quantity = $request->input('quantity');
        if ($quantity <= 0 || $quantity > $product->quantity) {
            return redirect()->back()->with('error', 'Invalid quantity selected.');
        }

        // Check if the product already exists in the cart
        $existingCartItem = CartProduct::where('cart_id', $activeCart->id)
                                        ->where('product_id', $product->id)
                                        ->first();

        if ($existingCartItem) {
            // Update the quantity of the existing cart item
            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + $quantity,
            ]);
        } else {
            // Create a new cart item for the product
            CartProduct::create([
                'cart_id' => $activeCart->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('products.show', $product->id)->with('success', 'Product added to cart successfully.');
    }
}
