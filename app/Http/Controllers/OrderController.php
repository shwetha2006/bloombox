<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\Shipment;

class OrderController extends Controller
{
    // Place order from cart
public function store(Request $request)
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        if ($request->ajax()) {
            return response()->json(['error' => 'Your cart is empty.'], 400);
        }
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    $customer = Auth::user()->customer ?? Customer::create([
        'user_id' => Auth::id(),
        'name' => Auth::user()->name,
    ]);

    $order = Order::create([
        'customer_id' => $customer->id,
        'order_status' => 'pending',
        'order_date' => now(),
        'total_cost' => array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart)),
    ]);

    foreach ($cart as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'bouquet_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    // **Return JSON with order ID for AJAX requests**
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'order_id' => $order->id, // THIS is the key JS needs
        ]);
    }

    // Fallback for normal form submission
    return redirect()->route('orders.show', $order->id);
}


public function show(Order $order)
{
    $orderItems = $order->orderItems()->with('bouquet')->get();
    $shipment = $order->shipment;

    return view('customer.order-show', compact('order', 'orderItems', 'shipment'));
}

public function index()
    {
        // Get the logged-in user's customer record
        $customer = auth()->user()->customer;

        // If the user doesn't have a customer record, return empty
        if (!$customer) {
            $orders = collect();
        } else {
            $orders = Order::where('customer_id', $customer->id)
                           ->with('orderItems.bouquet') // eager load bouquets
                           ->orderBy('created_at', 'desc')
                           ->get();
        }

        return view('customer.orders', compact('orders'));
    }



}