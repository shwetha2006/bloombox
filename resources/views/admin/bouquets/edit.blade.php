<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bouquet</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black text-white font-sans">

@vite('resources/js/bouquet.js') {{-- Axios JS included --}}

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-900 border-2 border-yellow-400 rounded-lg shadow-xl w-full max-w-2xl overflow-y-auto p-6">
        <h2 class="text-yellow-400 text-2xl font-semibold mb-4">Edit Bouquet</h2>

        <form id="bouquet-edit-form" data-id="{{ $bouquet->id }}" enctype="multipart/form-data" novalidate>
            @csrf {{-- CSRF token --}}

            <!-- Bouquet Name -->
            <div class="flex flex-col mb-4">
                <label for="name" class="text-yellow-400 font-semibold mb-1">Bouquet Name *</label>
                <input type="text" id="name" name="name" required
                       value="{{ $bouquet->name }}"
                       class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">
            </div>

            <!-- Description -->
            <div class="flex flex-col mb-4">
                <label for="description" class="text-yellow-400 font-semibold mb-1">Description</label>
                <textarea id="description" name="description" rows="3"
                          class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">{{ $bouquet->description }}</textarea>
            </div>

            <!-- Price -->
            <div class="flex flex-col mb-4">
                <label for="price" class="text-yellow-400 font-semibold mb-1">Price (Rs.) *</label>
                <input type="number" id="price" name="price" step="0.01" required
                       value="{{ $bouquet->price }}"
                       class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">
            </div>

            <!-- Stock Quantity -->
            <div class="flex flex-col mb-4">
                <label for="stock_quantity" class="text-yellow-400 font-semibold mb-1">Stock Quantity *</label>
                <input type="number" id="stock_quantity" name="stock_quantity" required min="0"
                       value="{{ $bouquet->stock_quantity }}"
                       class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">
            </div>

            <!-- Image -->
            <div class="flex flex-col mb-4">
                <label for="image" class="text-yellow-400 font-semibold mb-1">Image</label>
                <input type="file" id="image" name="image"
                       class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">
                @if($bouquet->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $bouquet->image) }}" alt="{{ $bouquet->name }}" class="h-24 w-24 object-cover rounded-md border border-yellow-400">
                    </div>
                @endif
            </div>

            <!-- Category Dropdown -->
<div class="flex flex-col mb-4">
    <label for="category_id" class="text-yellow-400 font-semibold mb-1">Category</label>
    <select name="category_id" id="category_id" class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                {{ $bouquet->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

            <!-- Current Add-Ons -->
            <div class="flex flex-col mb-4">
                <label class="text-yellow-400 font-semibold mb-1">Current Add-Ons</label>
                <ul id="current-addons" class="space-y-2">
                    @foreach($bouquet->addOns as $addon)
                        <li class="flex justify-between items-center bg-gray-800 p-2 rounded">
                            <span>{{ $addon->name }} (Rs. {{ $addon->price }})</span>
                            <button type="button" class="remove-addon bg-red-500 text-white px-2 py-1 rounded" data-id="{{ $addon->id }}">Remove</button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Add New Add-Ons -->
            <div class="flex flex-col mb-4">
                <label for="addons" class="text-yellow-400 font-semibold mb-1">Add New Add-Ons</label>
                <select id="addons" class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">
                    <option value="">-- Select Add-On --</option>
                    @foreach($allAddOns as $addon)
                        <option value="{{ $addon->id }}">{{ $addon->name }} (Rs. {{ $addon->price }})</option>
                    @endforeach
                </select>
                <button type="button" id="add-addon" class="mt-2 bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600">Add</button>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4 pt-4 border-t border-gray-600">
                <a href="{{ route('admin.bouquets.index') }}"
                   class="px-6 py-2 bg-gray-700 rounded-md hover:bg-gray-600 transition">Cancel</a>
                <button type="submit"
                        class="px-6 py-2 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black rounded-md hover:scale-105 transition">
                    Update
                </button>
            </div>

            <div id="message" class="mt-4 text-center"></div>
        </form>
    </div>
</div>

</body>
</html>




 
