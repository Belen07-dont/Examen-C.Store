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
}