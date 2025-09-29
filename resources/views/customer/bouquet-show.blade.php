{{-- Include custom black navbar --}}
@include('layouts.customer-nav')

<main class="bg-black min-h-screen text-white py-10">

    {{-- Bouquet Details Section --}}
<section class="max-w-4xl mx-auto bg-gray-980 rounded-lg shadow-lg p-8 mb-10 border-2 border-yellow-500">
    <div class="flex flex-col md:flex-row items-center gap-8">
        <img src="{{ asset('storage/' . $bouquet->image) }}" 
             alt="{{ $bouquet->name }}" 
             class="w-full md:w-1/3 h-80 object-cover rounded shadow-lg">

        <div class="md:w-2/3 text-center md:text-left">
            <h1 class="text-3xl font-bold mb-4 text-yellow-400">{{ $bouquet->name }}</h1>
            <p class="text-xl text-yellow-500 font-semibold mb-4">LKR {{ number_format($bouquet->price, 2) }}</p>
            <p class="text-gray-300">{{ $bouquet->description }}</p>
        </div>
    </div>
    {{-- Quantity + Add to Cart --}}
<div class="mt-6 flex items-center gap-4 justify-center md:justify-start">
    {{-- Quantity Selector --}}
    <div class="flex items-center border border-gray-990 rounded overflow-hidden">
        <button type="button" 
                onclick="let qty = this.nextElementSibling; if(qty.value > 1) qty.value--; "
                class="px-3 py-2 bg-gray-990 text-yellow-400 hover:bg-gray-600 transition">-</button>

        <input type="number" name="quantity" value="1" min="1" 
       class="w-16 text-center bg-black text-white border-l border-r border-gray-700 focus:outline-none">

        <button type="button" 
                onclick="let qty = this.previousElementSibling; qty.value = parseInt(qty.value)+1;"
                class="px-3 py-2 bg-gray-990 text-yellow-400 hover:bg-gray-600 transition">+</button>
    </div>

    {{-- Add to Cart Button --}}
    <button class="bg-yellow-500 text-black px-6 py-2 rounded hover:bg-yellow-600 transition">
        <i class="fas fa-cart-plus mr-2"></i> Add to Cart
    </button>
</div>

</section>

    {{-- Add-ons Section --}}
    <section class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-yellow-400 text-center">Bouquet Add-ons</h2>

        @if($bouquet->addOns->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($bouquet->addOns as $addOn)
            <div class="bg-gray-900 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <img src="{{ asset('storage/' . $addOn->image) }}" 
                     alt="{{ $addOn->name }}" 
                     class="h-48 w-full object-cover">

                <div class="p-4 text-center">
                    <h3 class="text-xl font-semibold mb-2">{{ $addOn->name }}</h3>
                    <p class="text-yellow-500 font-bold mb-4">LKR {{ number_format($addOn->price, 2) }}</p>
                    <button class="w-full bg-yellow-500 text-black py-2 px-4 rounded hover:bg-yellow-600 transition">
                        <i class="fas fa-cart-plus mr-2"></i> Add 
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <p class="text-gray-400 text-center">No add-ons available for this bouquet.</p>
        @endif
    </section>
</main>
