<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $productsByCategory = Product::all()->groupBy('category');
        
        return view('/productos', compact('productsByCategory'));
    }
    
    // Or if you want a specific method name:
    public function showByCategory()
    {
        $productsByCategory = Product::orderBy('category')
            ->orderBy('name')
            ->get()
            ->groupBy('category');
            
        return view('products', compact('productsByCategory'));
    }
}