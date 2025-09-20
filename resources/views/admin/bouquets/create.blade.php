{{-- resources/views/admin/bouquets/create.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bouquet</title>
    @vite('resources/css/app.css') {{-- Include Tailwind --}}
</head>
<body class="bg-black text-white font-sans">

{{-- Modal --}}
<div id="addBouquetModal" class="fixed inset-0 bg-black bg-opacity-80 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-gray-900 border-2 border-yellow-400 rounded-lg shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        
        {{-- Header --}}
        <div class="flex justify-between items-center px-6 py-4 border-b-2 border-yellow-400 rounded-t-lg bg-gradient-to-r from-gray-800 to-gray-900">
            <h2 class="text-yellow-400 text-2xl font-semibold">Add New Bouquet</h2>
            <button onclick="closeModal()" class="text-yellow-400 text-3xl font-bold hover:bg-gray-700 w-10 h-10 flex items-center justify-center rounded-full">&times;</button>
        </div>

        {{-- Body --}}
        <div class="p-6">
            <form id="addBouquetForm" action="" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                {{-- Bouquet Name --}}
                <div class="flex flex-col">
                    <label for="bouquetName" class="text-yellow-400 font-semibold mb-1">Bouquet Name *</label>
                    <input type="text" id="bouquetName" name="name" required placeholder="Enter bouquet name" class="bg-gray-800 border border-gray-600 rounded-md p-3 focus:border-yellow-400 focus:ring focus:ring-yellow-400 focus:ring-opacity-20 outline-none text-white">
                </div>

                {{-- Description --}}
                <div class="flex flex-col">
                    <label for="description" class="text-yellow-400 font-semibold mb-1">Description *</label>
                    <textarea id="description" name="description" required placeholder="Enter bouquet description" rows="4" class="bg-gray-800 border border-gray-600 rounded-md p-3 focus:border-yellow-400 focus:ring focus:ring-yellow-400 focus:ring-opacity-20 outline-none text-white"></textarea>
                </div>

                {{-- Price --}}
                <div class="flex flex-col">
                    <label for="price" class="text-yellow-400 font-semibold mb-1">Price (Rs.) *</label>
                    <input type="number" id="price" name="price" required min="0" step="0.01" placeholder="0.00" class="bg-gray-800 border border-gray-600 rounded-md p-3 focus:border-yellow-400 focus:ring focus:ring-yellow-400 focus:ring-opacity-20 outline-none text-white">
                </div>

                {{-- Image Upload --}}
                <div class="flex flex-col">
                    <label for="image" class="text-yellow-400 font-semibold mb-1">Bouquet Image</label>
                    <input type="file" id="image" name="image" accept="image/*" class="text-white">
                </div>

                {{-- Addons --}}
                <div class="flex flex-col">
                    <label for="addons" class="text-yellow-400 font-semibold mb-1">Select Addons</label>
                    <select id="addons" name="addons[]" multiple class="bg-gray-800 border border-gray-600 rounded-md p-3 text-white h-32 focus:border-yellow-400 focus:ring focus:ring-yellow-400 focus:ring-opacity-20 outline-none">
                        <option value="chocolate">Premium Chocolate Box</option>
                        <option value="card">Greeting Card</option>
                        <option value="teddy">Teddy Bear</option>
                        <option value="vase">Crystal Vase</option>
                        <option value="candles">Scented Candles</option>
                        <option value="wine">Wine Bottle</option>
                        <option value="balloons">Helium Balloons</option>
                    </select>
                    <span class="text-gray-400 text-sm mt-1">Hold Ctrl/Cmd to select multiple addons</span>
                </div>

                {{-- Buttons --}}
                <div class="flex justify-end gap-4 pt-4 border-t border-gray-600">
                    <button type="button" onclick="closeModal()" class="px-6 py-2 bg-gray-700 rounded-md hover:bg-gray-600 transition">Cancel</button>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black rounded-md hover:scale-105 transition">Add Bouquet</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Auto-open modal
    window.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('addBouquetModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    });

    function closeModal() {
        const modal = document.getElementById('addBouquetModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>

</body>
</html>
