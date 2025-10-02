<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrearUsuario;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('index');
});

Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');

Route::post(uri: '/guardar', action: [CrearUsuario::class, 'guardar']);
Route::post(uri: '/logout', action: [CrearUsuario::class, 'logout']);
Route::post(uri: '/login', action: [CrearUsuario::class, 'login']);


//lista para productos
Route::post('/create-product', [PostController::class, 'createprod']);

// Index
Route::get('/', function () {
    return view('index');
});

// Login 
Route::get('/login', function () {
    return view('login');
});
Route::get('/pedidos', function () {
    return view('pedidos');
});
Route::get('/perfil', function () {
    return view('perfil');
});
Route::get('/signin', function () {
    return view('sign');
});

//Direcciones de Carrito, que añaden, muestran, actualizan, eliminan items singulares, y vacian todo el carrito
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.remove');
Route::delete('/cart', [CartController::class, 'clearCart'])->name('cart.clear');


Route::get('/carrito', function () {
    return view('carrito');
});


Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.pay');

