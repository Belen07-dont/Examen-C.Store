<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class CheckoutController extends Controller
{
    public function pay(){
        return alert('Hello!');
    }
}
