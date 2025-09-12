<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment; 
use App\Http\Resources\ShipmentsResource;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Optional: load related order if needed
    $shipments = Shipment::with('order')->paginate(10);

    return ShipmentsResource::collection($shipments);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
