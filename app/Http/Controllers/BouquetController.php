<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bouquet; 
use App\Http\Resources\BouquetResource;

class BouquetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $bouquets = Bouquet::with(['category', 'addOns', 'admin'])->paginate(10);
        return BouquetResource::collection($bouquets);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
            'admin_id' => 'required|exists:admins,id',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $bouquet = Bouquet::create($validated);

        return new BouquetResource($bouquet);
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
