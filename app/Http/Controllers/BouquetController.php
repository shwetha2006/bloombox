<?php

namespace App\Http\Controllers;

use App\Models\Bouquet;
use App\Models\AddOn;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BouquetController extends Controller
{
    // List all bouquets
    public function index()
    {
        $bouquets = Bouquet::all();
        return view('admin.bouquets.index', compact('bouquets'));
    }

    // Show create form
    public function create()
{
    $addons = AddOn::all();       // fetch all add-ons
    $categories = Category::all(); // fetch all categories
    return view('admin.bouquets.create', compact('addons', 'categories'));
}

    // Store new bouquet
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'addons' => 'nullable|array',
            'addons.*' => 'exists:add_ons,id'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bouquets', 'public');
        }

        $bouquet = Bouquet::create($data);

        if (!empty($data['addons'])) {
            $bouquet->addOns()->sync($data['addons']);
        }

        return redirect()->route('admin.bouquets.index')->with('success', 'Bouquet created successfully!');
    }

    // Show edit form
    public function edit(Bouquet $bouquet)
    {
        $addons = AddOn::all();
        $selectedAddons = $bouquet->addOns()->pluck('id')->toArray();
        return view('admin.bouquets.edit', compact('bouquet', 'addons', 'selectedAddons'));
    }

    // Update bouquet
    public function update(Request $request, Bouquet $bouquet)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'addons' => 'nullable|array',
            'addons.*' => 'exists:add_ons,id'
        ]);

        if ($request->hasFile('image')) {
            if ($bouquet->image) {
                Storage::disk('public')->delete($bouquet->image);
            }
            $data['image'] = $request->file('image')->store('bouquets', 'public');
        }

        $bouquet->update($data);
        $bouquet->addOns()->sync($data['addons'] ?? []);

        return redirect()->route('admin.bouquets.index')->with('success', 'Bouquet updated successfully!');
    }

    // Delete bouquet
    public function destroy(Bouquet $bouquet)
    {
        if ($bouquet->image) {
            Storage::disk('public')->delete($bouquet->image);
        }

        $bouquet->delete();
        return redirect()->route('admin.bouquets.index')->with('success', 'Bouquet deleted successfully!');
    }
}
