<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Show checkout page
    public function checkout(Order $order)
    {
        return view('customer.payment', compact('order'));
    }

    // Save payment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'card_holdername' => 'required|string|max:255',
            'card_number' => 'required|string|min:12|max:19',
            'cvv' => 'required|string|min:3|max:4',
            'payment_method' => 'required|string',
        ]);

        $validated['payment_date'] = now();
        $validated['total_amount'] = $request->total_amount;
        $validated['payment_status'] = 'succeeded'; // simulate success

        $payment = Payment::create($validated);

        session()->forget('cart');


        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Payment successful!',
                'payment_id' => $payment->id,
            ]);
        }

        return redirect()->route('orders.show', $request->order_id)
                         ->with('success', 'Payment successful!');
    }
}
