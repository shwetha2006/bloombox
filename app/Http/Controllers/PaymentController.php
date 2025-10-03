<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;
use App\Models\Order;
use App\Models\Payment;

class PaymentController extends Controller
{
// Show checkout page
    public function checkout(Order $order)
    {
        return view('customer.payment', compact('order'));
    }
  
public function store(Request $request)
{
    $validated = $request->validate([
        'order_id' => 'required|exists:orders,id',
        'card_holdername' => 'required|string|max:255',
        'card_number' => 'required|string|min:12|max:19',
        'cvv' => 'required|string|min:3|max:4',
        'payment_method' => 'required|string',
    ]);

    $order = Order::with('shipment', 'customer')->findOrFail($request->order_id);

    $validated['payment_date'] = now();
    $validated['total_amount'] = $order->total_cost;
    $validated['payment_status'] = 'succeeded'; // simulate success

    $payment = Payment::create($validated);

    // Send email to user
    try {
        Mail::send([], [], function ($message) use ($order) {
    $shipmentDate = optional($order->shipment)->shipment_date
        ? \Carbon\Carbon::parse($order->shipment->shipment_date)->format('d M, Y')
        : 'Not Available';

    $html = (string) "
        <h2>Thank you for your order!</h2>
        <p>Order ID: {$order->id}</p>
        <p>Total: LKR " . number_format($order->total_cost, 2) . "</p>
        <p>Shipment Date: {$shipmentDate}</p>
        <p>Shipment Address: " . optional($order->shipment)->address . "</p>
        <p>Order Status: {$order->order_status}</p>
    ";

    $message->to($order->customer->user->email)
        ->subject('Your Order #' . $order->id . ' is Confirmed')
        ->html($html);
});

    } catch (\Exception $e) {
        \Log::error('Payment email failed: ' . $e->getMessage());
    }

    session()->forget('cart');

    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Payment successful!',
            'payment_id' => $payment->id,
        ]);
    }

    return redirect()->route('orders.index')
             ->with('success', 'Payment successful!');
}

}









