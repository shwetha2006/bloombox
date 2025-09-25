<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bouquet</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black text-white font-sans">

@vite('resources/js/bouquet.js')

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-900 border-2 border-yellow-400 rounded-lg shadow-xl w-full max-w-lg overflow-y-auto p-6">

        <h2 class="text-yellow-400 text-2xl font-semibold mb-4">Add New Bouquet</h2>

        <form id="bouquet-form" enctype="multipart/form-data" novalidate>
            @csrf

            <label class="text-yellow-400 font-semibold">Bouquet Name *</label>
            <input type="text" name="name" class="bg-gray-800 p-3 rounded-md w-full mb-3" required>

            <label class="text-yellow-400 font-semibold">Description</label>
            <textarea name="description" class="bg-gray-800 p-3 rounded-md w-full mb-3"></textarea>

            <label class="text-yellow-400 font-semibold">Price *</label>
            <input type="number" name="price" class="bg-gray-800 p-3 rounded-md w-full mb-3" required>

            <label class="text-yellow-400 font-semibold">Stock Quantity *</label>
            <input type="number" name="stock_quantity" min="0" class="bg-gray-800 p-3 rounded-md w-full mb-3" required>

            <label class="text-yellow-400 font-semibold">Image</label>
            <input type="file" name="image" class="bg-gray-800 p-2 rounded-md w-full mb-3">

            <label class="text-yellow-400 font-semibold">Category *</label>
            <select name="category_id" class="bg-gray-800 p-3 rounded-md w-full mb-3" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label class="text-yellow-400 font-semibold">Select Add-ons</label>
            <select name="addons[]" multiple class="bg-gray-800 p-3 rounded-md w-full mb-3">
                @foreach($addons as $addon)
                    <option value="{{ $addon->id }}">{{ $addon->name }}</option>
                @endforeach
            </select>

            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('admin.bouquets.index') }}" class="px-6 py-2 bg-gray-700 rounded-md hover:bg-gray-600">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black rounded-md">Save</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
