<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddOnController extends Controller
{
    // List all add-ons
    public function index()
    {
        $addons = AddOn::all();
        return view('admin.addons.index', compact('addons'));
    }

    // Show form to create new add-on
    public function create()
    {
        return view('admin.addons.create');
    }

    // Store new add-on
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('addons', 'public');
        }

        AddOn::create($data);

        return redirect()->route('admin.addons.index')->with('success', 'Add-on created successfully');
    }

    // Show edit form
    public function edit(AddOn $addon)
    {
        return view('admin.addons.edit', compact('addon'));
    }

    // Update add-on
    public function update(Request $request, AddOn $addon)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'stock_quantity' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($addon->image) {
                Storage::disk('public')->delete($addon->image);
            }
            $data['image'] = $request->file('image')->store('addons', 'public');
        }

        $addon->update($data);

        return redirect()->route('admin.addons.index')->with('success', 'Add-on updated successfully');
    }

    // Delete add-on
    public function destroy(AddOn $addon)
    {
        if ($addon->image) {
            Storage::disk('public')->delete($addon->image);
        }
        $addon->delete();
        return redirect()->route('admin.addons.index')->with('success', 'Add-on deleted successfully');
    }
}
