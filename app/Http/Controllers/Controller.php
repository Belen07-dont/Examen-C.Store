<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

abstract class Controller
{
    
}

class CartController extends Controller
{
    public function getCartWithProducts()
    {
        $cartItems = Cart::with('product:id,name,description,image,price')
            ->get(['id', 'product_id', 'quantity', 'subtotal', 'user_id', 'created_at']);
            
        return response()->json($cartItems);
    }
    
    // Or if you want to format the data
    public function getFormattedCart()
    {
        $cartItems = Cart::with('product:id,name,description,image,price')
            ->get()
            ->map(function ($item) {
                return [
                    'cart_id' => $item->id,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->subtotal,
                    'user_id' => $item->user_id,
                    'product_name' => $item->product->name,
                    'product_description' => $item->product->description,
                    'product_image' => $item->product->image,
                    'product_price' => $item->product->price,
                    'created_at' => $item->created_at
                ];
            });
            
        return response()->json($cartItems);
    }
}

