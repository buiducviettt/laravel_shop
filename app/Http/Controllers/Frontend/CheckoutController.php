<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        $shipping = 0; // miễn phí
        $total = $subtotal + $shipping;
        return view('frontend.checkout.index', compact('cart', 'subtotal', 'shipping', 'total'));
    }
}
