{{-- resources/views/admin/addons/create.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Add-On</title>
    @vite('resources/css/app.css') {{-- Include Tailwind --}}
</head>
<body class="bg-black text-white font-sans">

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-900 border-2 border-yellow-400 rounded-lg shadow-xl w-full max-w-lg overflow-y-auto">

        {{-- Header --}}
        <div class="flex justify-between items-center px-6 py-4 border-b-2 border-yellow-400 rounded-t-lg bg-gradient-to-r from-gray-800 to-gray-900">
            <h2 class="text-yellow-400 text-2xl font-semibold">Add New Add-On</h2>
        </div>

        {{-- Body --}}
        <div class="p-6">
            <form action="{{ route('admin.addons.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">

                @csrf

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-800 text-red-200 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Add-On Name --}}
                <div class="flex flex-col">
                    <label for="addonName" class="text-yellow-400 font-semibold mb-1">Add-On Name *</label>
                    <input type="text" id="addonName" name="name" required placeholder="Enter add-on name"
                           class="bg-gray-800 border border-gray-600 rounded-md p-3 focus:border-yellow-400 focus:ring focus:ring-yellow-400 focus:ring-opacity-20 outline-none text-white">
                </div>

                
                {{-- Description --}}
                <div class="flex flex-col">
                    <label for="description" class="text-yellow-400 font-semibold mb-1">Description *</label>
                    <textarea id="description" name="description" required placeholder="Enter bouquet description" rows="4"
                              class="bg-gray-800 border border-gray-600 rounded-md p-3 focus:border-yellow-400 focus:ring focus:ring-yellow-400 focus:ring-opacity-20 outline-none text-white"></textarea>
                </div>


                {{-- Price --}}
                <div class="flex flex-col">
                    <label for="price" class="text-yellow-400 font-semibold mb-1">Price (Rs.) *</label>
                    <input type="number" id="price" name="price" required min="0" step="0.01" placeholder="0.00"
                           class="bg-gray-800 border border-gray-600 rounded-md p-3 focus:border-yellow-400 focus:ring focus:ring-yellow-400 focus:ring-opacity-20 outline-none text-white">
                </div>

                {{-- Stock quantity --}}
                <div class="flex flex-col">
                    <label for="stock_quantity" class="text-yellow-400 font-semibold mb-1">Stock quantity *</label>
                    <input type="number" id="stock_quantity" name="stock_quantity" required min="0" step="1" placeholder="0.00"
                           class="bg-gray-800 border border-gray-600 rounded-md p-3 focus:border-yellow-400 focus:ring focus:ring-yellow-400 focus:ring-opacity-20 outline-none text-white">
                </div>

                {{-- Image Upload --}}
                <div class="flex flex-col">
                    <label for="image" class="text-yellow-400 font-semibold mb-1">Add-On Image</label>
                    <input type="file" id="image" name="image" accept="image/*" class="text-white">
                </div>


                {{-- Buttons --}}
                <div class="flex justify-end gap-4 pt-4 border-t border-gray-600">
                    <a href="{{ route('admin.addons.index') }}" class="px-6 py-2 bg-gray-700 rounded-md hover:bg-gray-600 transition">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black rounded-md hover:scale-105 transition">Add Add-On</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
