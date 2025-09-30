<div class="bg-gray-900 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
    <img src="{{ asset('storage/' . $addOn->image) }}" 
         alt="{{ $addOn->name }}" 
         class="h-48 w-full object-cover">

    <div class="p-4 text-center">
        <h3 class="text-xl font-semibold mb-2">{{ $addOn->name }}</h3>
        <p class="text-yellow-500 font-bold mb-4">LKR {{ number_format($addOn->price, 2) }}</p>

        <button wire:click="addToCart"
                class="w-full bg-yellow-500 text-black py-2 px-4 rounded hover:bg-yellow-600 transition">
            <i class="fas fa-cart-plus mr-2"></i> Add
        </button>

        @if (session()->has('message'))
            <div class="mt-2 text-green-400 text-sm">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
