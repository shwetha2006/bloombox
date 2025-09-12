<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddOn; 
use App\Http\Resources\AddOnsResource;

class AddOnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addOns = AddOn::with('bouquets')->paginate(10);
        return AddOnsResource::collection($addOns);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'stock_quantity' => 'required|integer',
        ]);

        $addOn = AddOn::create($validated);

        return new AddOnsResource($addOn);
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
