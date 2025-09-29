<div class="mb-6 flex items-center gap-6">
    <!-- Price Filter -->
    <div class="relative">
        <button wire:click="togglePriceDropdown"
                class="px-4 py-2 bg-gray-800 text-yellow-400 rounded hover:bg-gray-700 transition">
            Price
        </button>

        @if($showPriceDropdown)
        <div class="absolute mt-2 p-4 bg-gray-900 rounded shadow w-64 z-50">
            <label class="block text-yellow-400 font-semibold mb-2">
                Min Price: LKR {{ $minPrice }}
            </label>
            <input type="range" min="0" max="20000" step="500" wire:model="minPrice" class="w-full accent-yellow-500">

            <label class="block text-yellow-400 font-semibold mt-4 mb-2">
                Max Price: LKR {{ $maxPrice }}
            </label>
            <input type="range" min="0" max="20000" step="500" wire:model="maxPrice" class="w-full accent-yellow-500">
        </div>
        @endif
    </div>

    <!-- Availability Filter (placeholder) -->
    <div>
        <button class="px-4 py-2 bg-gray-800 text-yellow-400 rounded hover:bg-gray-700 transition">
            Availability
        </button>
    </div>
</div>

{{-- Bouquets grid --}}
@if($bouquets->count() > 0)
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-items-center">
    @foreach($bouquets as $bouquet)
    <div class="bg-gray-900 shadow-lg rounded-lg overflow-hidden hover:shadow-3xl transition w-full">
        <img src="{{ asset('storage/' . $bouquet->image) }}" 
             alt="{{ $bouquet->name }}" 
             class="h-56 w-full object-cover">

        <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">{{ $bouquet->name }}</h2>
            <p class="text-yellow-500 font-bold mb-4">LKR {{ number_format($bouquet->price, 2) }}</p>

            <button class="w-full bg-yellow-500 text-black py-2 px-4 rounded hover:bg-yellow-600 transition">
                <i class="fas fa-cart-plus mr-2"></i> Add to Cart
            </button>
        </div>
    </div>
    @endforeach
</div>
@else
    <p class="text-center text-gray-400">No bouquets available at the moment.</p>
@endif
