<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1'
    ]);

    $product = Product::find($request->product_id);
    $userId = Auth::id();

    // Check if product already exists in user's cart
    $existingCartItem = Cart::where('user_id', $userId)
                           ->where('product_id', $request->product_id)
                           ->first();

    if ($existingCartItem) {
        // Update existing cart item
        $existingCartItem->update([
            'quantity' => $existingCartItem->quantity + $request->quantity,
            'subtotal' => $product->price * ($existingCartItem->quantity + $request->quantity)
        ]);

        $cartItem = $existingCartItem;
        $message = 'Product quantity updated in cart!';
    } else {
        // Create new cart item
        $cartItem = Cart::create([
            'product_id' => $request->product_id,
            'name' => $product->name,
            'description' => $product->description,
            'image' => $product->image,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'subtotal' => $product->price * $request->quantity,
            'user_id' => $userId
        ]);
        $message = 'Product added to cart!';
    }

    return redirect('/productos');
}
   public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        
        return view('/carrito', compact('cartItems'));
    }
}
