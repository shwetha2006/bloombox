<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AddOnsResource;

class AddOnController extends Controller
{
    public function createForm()
{
    return view('admin.addons.create');
}

public function index(Request $request)
{
    $addons = AddOn::all();

    if ($request->is('api/*')) {
        return AddOnsResource::collection($addons);
    }

    return view('admin.addons.index', compact('addons'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'stock_quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('addons', 'public');
    }

    $addon = AddOn::create($validated);

    if ($request->is('api/*')) {
        return response()->json([
            'message' => 'Add-On created successfully',
            'addon'   => new AddOnsResource($addon),
        ], 201);
    }

    return redirect()->route('admin.addons.index')
        ->with('success', 'Add-On created successfully!');
}

public function destroy(AddOn $addon, Request $request)
{
    $addon->delete();

    if ($request->is('api/*')) {
        return response()->json(['message' => 'Add-On deleted successfully']);
    }

    return redirect()->route('admin.addons.index')->with('success', 'Add-On deleted successfully');
}

public function show(AddOn $addon, Request $request)
{
    if ($request->is('api/*')) {
        return response()->json($addon);
    }

    return view('admin.addons.show', compact('addon'));
}


// Show the edit form
public function edit(AddOn $addon)
{
    return view('admin.addons.edit', compact('addon'));
}

// Handle update (API + web)
public function update(Request $request, AddOn $addon)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'stock_quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('addons', 'public');
    }

    $addon->update($validated);

    if ($request->is('api/*')) {
        return response()->json([
            'message' => 'Add-On updated successfully',
            'addon' => new AddOnsResource($addon),
        ]);
    }

    return redirect()->route('admin.addons.index')
                     ->with('success', 'Add-On updated successfully!');
}


}
