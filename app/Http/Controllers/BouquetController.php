<?php


namespace App\Http\Controllers;

use App\Models\Bouquet;
use App\Models\AddOn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BouquetController extends Controller
{
    // List all bouquets
   public function index()
{
    $bouquets = Bouquet::all(); // fetch all bouquets
    return view('admin.bouquets.index', compact('bouquets'));
}


    // Show form to create a new bouquet
    public function create()
    {
        $addons = AddOn::all(); // to allow attaching add-ons on creation
        return view('admin.bouquets.create', compact('addons'));
    }

    // Store new bouquet
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'stock_quantity' => 'required|integer|min:0',
            'addon_ids' => 'nullable|array',
            'addon_ids.*' => 'exists:add_ons,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bouquets', 'public');
        }

        $bouquet = Bouquet::create($data);

        if (!empty($data['addon_ids'])) {
            $bouquet->addOns()->sync($data['addon_ids']);
        }

        return redirect()->route('admin.bouquets.index')->with('success', 'Bouquet created successfully');
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
            'image' => 'nullable|image|max:2048',
            'stock_quantity' => 'required|integer|min:0',
            'addon_ids' => 'nullable|array',
            'addon_ids.*' => 'exists:add_ons,id',
        ]);

        if ($request->hasFile('image')) {
            // delete old image
            if ($bouquet->image) {
                Storage::disk('public')->delete($bouquet->image);
            }
            $data['image'] = $request->file('image')->store('bouquets', 'public');
        }

        $bouquet->update($data);

        // Sync add-ons
        $bouquet->addOns()->sync($data['addon_ids'] ?? []);

        return redirect()->route('admin.bouquets.index')->with('success', 'Bouquet updated successfully');
    }

    // Delete bouquet
    public function destroy(Bouquet $bouquet)
    {
        if ($bouquet->image) {
            Storage::disk('public')->delete($bouquet->image);
        }
        $bouquet->delete();
        return redirect()->route('admin.bouquets.index')->with('success', 'Bouquet deleted successfully');
    }
}
