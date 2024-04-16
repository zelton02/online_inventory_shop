<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartProduct;
use App\Models\CartItem;



class CartController extends Controller
{
      //
    //   public function index()
    //   {
    //       $cartItems = CartItem::all(); // Fetch all products (you may want to paginate for large datasets)
    //     //   dd($cartItems);
    //       return view('cart.home', compact('cartItems'));

    //   }
    public function index()
    {
        $cartItems = CartItem::paginate(10); // Adjust the number per page as needed
        
        return view('cart.home', compact('cartItems'));
    }
    //   public function show($id)
    //   {
    //       $product = CartItem::findOrFail($id);
    //       return view('cart.showProduct', ['product' => $product]);
    //   }

    //   public function addToCart($id)
    //   {
    //       // Find the product by its ID
    //       $product = Product::findOrFail($id);
      
    //       // Here you can implement your logic to add the product to the cart
    //       // For example, you can store the product ID in the session or database
    //       // For simplicity, let's assume you have a session-based cart
    //       $cart = session()->get('cart', []);
      
    //       // Check if the product is already in the cart, and update its quantity if it is
    //       if(isset($cart[$id])) {
    //           $cart[$id]['quantity'] += 1;
    //       } else {
    //           // If the product is not in the cart, add it with a quantity of 1
    //           $cart[$id] = [
    //               'description' => $product->description,
    //               'price' => $product->price,
    //               'quantity' => 1
    //           ];
    //       }
      
    //       // Store the updated cart in the session
    //       session()->put('cart', $cart);
      
    //       return redirect()->route('home')->with('success', 'Product added to cart successfully!');
    //   }
      
    public function addToCart($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);
    
        // Create a new CartItem instance
        $cartItem = new CartItem();
        $cartItem->product_id = $id;
        $cartItem->description = $product->description;
        $cartItem->quantity = 1; // Set initial quantity to 1
        $cartItem->price = $product->price; 
        $cartItem->customer_id = 1; //Not yet get the customer_id
    
        // Save the cart item to the database
        $cartItem->save();
    
        return redirect()->route('home')->with('success', 'Product added to cart successfully!');
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
          $product = new Cart();
          $product->name = $request->input('name');
          $product->description = $request->input('description');
          $product->price = $request->input('price');
          $product->image_url = $request->input('image_url');
          $product->discount = $request->input('discount');
          $product->quantity = $request->input('quantity');
  
          // Save the product to the database
          $product->save();
  
          // Redirect back to the product listing page with a success message
          return redirect()->route('home')->with('success', 'Cart product added successfully!');
      }
  
      public function destroy($id)
      {
          $product = Cart::findOrFail($id);
          $product->delete();
          return redirect()->route('home')->with('success', 'Cart product deleted successfully!');
      }
  
      public function showUpdate($id)
      {
          $product = Cart::findOrFail($id);
          return view('cart.updateProduct', ['product' => $product]);
  
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
  
          $product = Cart::findOrFail($id);
          $product->name = $request->input('name');
          $product->description = $request->input('description');
          $product->price = $request->input('price');
          $product->image_url = $request->input('image_url');
          $product->discount = $request->input('discount');
          $product->quantity = $request->input('quantity');
  
          $product->save();
  
          return redirect()->route('home')->with('success', 'Cart product updated successfully!');
      }

    //   public function storeSessionItemsToCart()
    //   {
    //       // Retrieve cart items from the session
    //       $cart = session()->get('cart', []);
  
    //       // Loop through each item in the session cart
    //       foreach ($cart as $productId => $item) {
    //           // Create a new Cart instance
    //           $product = new Cart();
    //           $product->name = $item['name'];
    //           $product->price = $item['price'];
    //           $product->quantity = $item['quantity'];
  
    //           // Save the product to the database
    //           $product->save();
    //       }
  
    //       // Clear the session cart after items are added to the cart table
    //       session()->forget('cart');
  
    //       return redirect()->route('cart.index')->with('success', 'Cart items added successfully!');
    //   } 
      public function storeSessionItemsToCart()
      {
          // Retrieve cart items from the session
          $cart = session()->get('cart', []);
  
          // Loop through each item in the session cart
          foreach ($cart as $productId => $item) {
              // Create a new CartProduct instance
              $cartProduct = new CartItem();
            //   $cartProduct->cart_id = auth()->id(); // Assuming you have authentication and each user has a cart
              $cartProduct->product_id = $productId;
              $cartProduct->quantity = $item['quantity'];
              $cartProduct->price = $item['price'];

  
              // Save the cart product to the database
              $cartProduct->save();

          }
  
          // Clear the session cart after items are added to the cart table
          session()->forget('cart');
  
          return view('cart.home', compact('products'));
      }
  
}
