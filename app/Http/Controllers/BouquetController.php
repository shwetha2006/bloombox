<?php

namespace App\Http\Controllers;

use App\Models\Bouquet;
use App\Models\AddOn;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\BouquetResource;



class BouquetController extends Controller
{
    // Show create form (Web)
    public function createForm()
    {
        $addons = AddOn::all();
        $categories = Category::all();
        return view('admin.bouquets.create', compact('addons', 'categories'));
    }

    // List bouquets (Web + API)
    public function index(Request $request)
    {
        $bouquets = Bouquet::with(['addons', 'category'])->get();

        if ($request->is('api/*')) {
            return response()->json(['bouquets' => $bouquets]);
        }

        return view('admin.bouquets.index', compact('bouquets'));
    }

    // Customer view + API
public function customerIndex(Request $request)
{
    $minPrice = $request->input('minPrice', 0);
    $maxPrice = $request->input('maxPrice', 20000);

    $bouquets = Bouquet::with(['addOns', 'category'])
                        ->whereBetween('price', [$minPrice, $maxPrice])
                        ->get();

    return view('customer.bouquet-index', compact('bouquets'));
}

public function show(Bouquet $bouquet)
{
    // Load related add-ons
    $bouquet->load('addOns');

    return view('customer.bouquet-show', compact('bouquet'));
}

    // Store new bouquet (Web + API)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'price'          => 'required|numeric',
            'description'    => 'nullable|string',
            'stock_quantity' => 'required|integer|min:0',
            'image'          => 'nullable|image|max:2048',
            'category_id'    => 'required|exists:categories,id',
            'addons'         => 'nullable|array',
            'addons.*'       => 'exists:add_ons,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('bouquets', 'public');
        }

        $bouquet = Bouquet::create($validated);

        if (!empty($validated['addons'])) {
            $bouquet->addons()->sync($validated['addons']);
        }

        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Bouquet created successfully',
                'bouquet' => $bouquet->load('addons', 'category')
            ], 201);
        }

        return redirect()->route('admin.bouquets.index')->with('success', 'Bouquet created successfully!');
    }



    // Show edit form
public function edit(Bouquet $bouquet)
{
    $bouquet->load('addOns'); // ensure addOns relationship is loaded

    $categories = Category::all();
    $allAddOns = AddOn::all();
    $selectedAddOns = $bouquet->addOns->pluck('id')->toArray();

    return view('admin.bouquets.edit', compact('bouquet', 'categories', 'allAddOns', 'selectedAddOns'));
}


// Handle update (API + Web)
public function update(Request $request, Bouquet $bouquet)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'stock_quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    // Handle new image upload
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($bouquet->image) {
            Storage::disk('public')->delete($bouquet->image);
        }
        $validated['image'] = $request->file('image')->store('bouquets', 'public');
    }

    $bouquet->update($validated);

    if ($request->is('api/*')) {
        return response()->json([
            'message' => 'Bouquet updated successfully',
            'bouquet' => new BouquetResource($bouquet),
        ]);
    }

    return redirect()->route('admin.bouquets.index')
                     ->with('success', 'Bouquet updated successfully!');
}

    public function destroy(Bouquet $bouquet, Request $request)
{
    // Delete the bouquet image if it exists
    if ($bouquet->image) {
        Storage::disk('public')->delete($bouquet->image);
    }

    $bouquet->delete();

    // Return JSON if API request
    if ($request->is('api/*')) {
        return response()->json(['message' => 'Bouquet deleted successfully']);
    }

    // Otherwise, redirect for web requests
    return redirect()->route('admin.bouquets.index')
                     ->with('success', 'Bouquet deleted successfully!');
}



}
