<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;





class PostController extends Controller
{
    public function createprod(Request $request){
        $productos = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);

        $productos['name'] = strip_tags($productos['name']);
        $productos['description'] = strip_tags($productos['description']);
        $productos['admin_id'] = Auth::id();

        Product::create($productos);
        return redirect('/');
    }
}