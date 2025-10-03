<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\Shipment;
use App\Models\Bouquet;   
use App\Models\AddOn;
use App\Http\Resources\OrderResource;


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
    // create order item
    OrderItem::create([
        'order_id' => $order->id,
        'bouquet_id' => $item['id'],
        'quantity' => $item['quantity'],
        'price' => $item['price'],
    ]);

    // decrement bouquet stock
    $bouquet = Bouquet::find($item['id']);
    if ($bouquet) {
        if ($bouquet->stock_quantity >= $item['quantity']) {
            $bouquet->decrement('stock_quantity', $item['quantity']);
        } else {
            return redirect()->back()->with('error', "Not enough stock for {$bouquet->name}");
        }
    }

    // decrement addon stock
    if (!empty($item['addons'])) {
        foreach ($item['addons'] as $addonId) {
            $addon = AddOn::find($addonId);
            if ($addon && $addon->stock_quantity >= $item['quantity']) {
                $addon->decrement('stock_quantity', $item['quantity']);
            } else {
                return redirect()->back()->with('error', "Not enough stock for {$addon->name}");
            }
        }
    }
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


public function show(Order $order, Request $request)
{
    $orderItems = $order->orderItems()->with('bouquet')->get();
    $shipment = $order->shipment;

    // If API request
    if ($request->is('api/*')) {
        return response()->json([
            'order' => $order,
            'items' => $orderItems,
            'shipment' => $shipment
        ]);
    }

    // Otherwise, return web view
    return view('customer.order-show', compact('order', 'orderItems', 'shipment'));
}


public function index(Request $request)
{
    // Get the logged-in user's customer record
    $customer = auth()->user()->customer;

    if (!$customer) {
        $orders = collect();
    } else {
        $orders = Order::where('customer_id', $customer->id)
                       ->with(['orderItems.bouquet', 'shipment']) // eager load shipment
                       ->orderBy('created_at', 'desc')
                       ->get();
    }

      if ($request->is('api/*')) {
        return response()->json([
            'success' => true,
            'orders' => $orders
        ]);
    }

    return view('customer.orders', compact('orders'));
}


// public function index()
//     {
//         // Get the logged-in user's customer record
//         $customer = auth()->user()->customer;

//         // If the user doesn't have a customer record, return empty
//         if (!$customer) {
//             $orders = collect();
//         } else {
//             $orders = Order::where('customer_id', $customer->id)
//                            ->with('orderItems.bouquet') // eager load bouquets
//                            ->orderBy('created_at', 'desc')
//                            ->get();
//         }

//         return view('customer.orders', compact('orders'));
//     }

    public function adminIndex()
{
    // Load all orders with customer + shipment
    $orders = Order::with(['customer.user', 'shipment'])->orderBy('created_at', 'desc')->get();

    return view('admin.orders.index', compact('orders'));
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'order_status' => 'required|string',
        'shipment_status' => 'required|string',
    ]);

    // find the order
    $order = Order::with('shipment')->findOrFail($id);

    // update order status
    $order->update([
        'order_status' => $request->order_status,
    ]);

    // update only if shipment exists
    if ($order->shipment) {
        $order->shipment->update([
            'shipment_status' => $request->shipment_status,
        ]);
    }

    return redirect()->back()->with('success', 'Order and shipment status updated successfully.');
}

}