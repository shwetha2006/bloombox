<div>
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-2 mb-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-6 flex items-center gap-4 justify-center md:justify-start">
        {{-- Quantity Selector --}}
        <div class="flex items-center border border-gray-990 rounded overflow-hidden">
            <button type="button" wire:click="decrement"
                class="px-3 py-2 bg-gray-990 text-yellow-400 hover:bg-gray-600 transition">-</button>

            <input type="number" wire:model="quantity" min="1"
                class="w-16 text-center bg-black text-white border-l border-r border-gray-700 focus:outline-none">

            <button type="button" wire:click="increment"
                class="px-3 py-2 bg-gray-990 text-yellow-400 hover:bg-gray-600 transition">+</button>
        </div>

        {{-- Add to Cart Button --}}
        <button wire:click="addToCart"
            class="bg-yellow-500 text-black px-6 py-2 rounded hover:bg-yellow-600 transition">
            <i class="fas fa-cart-plus mr-2"></i> Add to Cart
        </button>
    </div>
</div>
