<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
{
    $cart = session()->get('cart', []);
    return view('customer.cart', compact('cart'));
}

    public function remove($id)
{
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }
    return redirect()->route('cart')->with('success', 'Item removed from cart');
}
}

?>