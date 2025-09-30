<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShipmentController extends Controller
{
    // Customer creates shipment
    public function store(Request $request)
{
    $validated = $request->validate([
        'order_id' => 'required|exists:orders,id',
        'shipment_date' => 'required|date',
        'address_line1' => 'required|string',
        'address_line2' => 'nullable|string',
        'city' => 'required|string',
        'postal_code' => 'required|string',
    ]);

   // Add defaults
    $validated['shipment_cost'] = 800;      // default shipping cost
    $validated['shipment_status'] = 'pending'; // default status

    $shipment = Shipment::create($validated);

    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'shipment_id' => $shipment->id,
            'total_cost' => $shipment->order->total_cost + $shipment->shipment_cost
        ]);
    }


    return redirect()->back()->with('success', 'Shipment saved!');
}


    // Admin updates shipment status
    public function updateStatus(Request $request, Shipment $shipment)
    {
        $request->validate([
            'shipment_status' => 'required|string|max:50',
        ]);

        $shipment->update([
            'shipment_status' => $request->shipment_status,
        ]);

        return response()->json([
            'message' => 'Shipment status updated successfully',
            'shipment' => $shipment,
        ]);
    }
}
