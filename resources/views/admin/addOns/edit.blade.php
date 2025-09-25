<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Add-On</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black text-white font-sans">

@vite('resources/js/addon.js') {{-- Axios JS included --}}

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-900 border-2 border-yellow-400 rounded-lg shadow-xl w-full max-w-lg overflow-y-auto p-6">
        <h2 class="text-yellow-400 text-2xl font-semibold mb-4">Edit Add-On</h2>

        <form id="addon-edit-form" data-id="{{ $addon->id }}" enctype="multipart/form-data" novalidate>
            @csrf {{-- CSRF token for Laravel --}}

            <div class="flex flex-col">
                <label for="name" class="text-yellow-400 font-semibold mb-1">Name *</label>
                <input type="text" id="name" name="name" required
                       value="{{ $addon->name }}"
                       class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">
            </div>

            <div class="flex flex-col">
                <label for="description" class="text-yellow-400 font-semibold mb-1">Description</label>
                <textarea id="description" name="description" rows="3"
                          class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">{{ $addon->description }}</textarea>
            </div>

            <div class="flex flex-col">
                <label for="price" class="text-yellow-400 font-semibold mb-1">Price *</label>
                <input type="number" id="price" name="price" step="0.01" required
                       value="{{ $addon->price }}"
                       class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">
            </div>

            <div class="flex flex-col">
                <label for="stock_quantity" class="text-yellow-400 font-semibold mb-1">Stock Quantity *</label>
                <input type="number" id="stock_quantity" name="stock_quantity" required min="0"
                       value="{{ $addon->stock_quantity }}"
                       class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">
            </div>

            <div class="flex flex-col">
                <label for="image" class="text-yellow-400 font-semibold mb-1">Image</label>
                <input type="file" id="image" name="image"
                       class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white">

                @if($addon->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $addon->image) }}" alt="{{ $addon->name }}" class="h-24 w-24 object-cover rounded-md border border-yellow-400">
                    </div>
                @endif
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-gray-600">
                <a href="{{ route('admin.addons.index') }}"
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
