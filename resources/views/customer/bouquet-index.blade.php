{{-- resources/views/customer/bouquet-index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BloomBox - Bouquets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-black text-white">

    {{-- Include custom black navbar --}}
    @include('layouts.customer-nav')

    <main class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-yellow-400">Our Bouquets</h1>

        {{-- Filter dropdown --}}
        <div class="flex items-center gap-4 mb-6">
    <span class="text-yellow-400 font-semibold">Filter by:</span>

    <div class="relative">
        <button id="price-toggle" 
                class="px-4 py-2 bg-gray-800 text-yellow-400 rounded hover:bg-gray-700 transition">
            Price
        </button>

        <div id="price-dropdown" class="hidden absolute mt-2 p-4 bg-gray-900 rounded shadow w-64 z-50">
            <form method="GET" action="{{ route('customer.bouquets-index') }}">
                <label class="block text-yellow-400 font-semibold mb-2">
                    Min Price
                </label>
                <input type="number" name="minPrice" value="{{ request('minPrice', 0) }}" 
                       min="0" max="20000" step="500"
                       class="w-full px-3 py-2 rounded text-black mb-4">

                <label class="block text-yellow-400 font-semibold mb-2">
                    Max Price
                </label>
                <input type="number" name="maxPrice" value="{{ request('maxPrice', 20000) }}" 
                       min="0" max="20000" step="500"
                       class="w-full px-3 py-2 rounded text-black mb-4">

                <button type="submit" 
                        class="w-full bg-yellow-500 text-black py-2 rounded hover:bg-yellow-600 transition">
                    Apply
                </button>
            </form>
        </div>
    </div>

    <div>
        <button class="px-4 py-2 bg-gray-800 text-yellow-400 rounded hover:bg-gray-700 transition">
            Availability
        </button>
    </div>
</div>

        {{-- Bouquets grid --}}
        @if($bouquets->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-8 gap-x-6 justify-items-center">
    @foreach($bouquets as $bouquet)
    <div class="bg-gray-900 shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl w-72">
    <img src="{{ asset('storage/' . $bouquet->image) }}" 
         alt="{{ $bouquet->name }}" 
         class="h-56 w-full object-cover">

    <div class="p-4">
        <h2 class="text-xl font-semibold mb-2 text-center">{{ $bouquet->name }}</h2>
        
<div class="flex items-center justify-center gap-2 text-yellow-500 font-bold mb-4">
    <span>LKR {{ number_format($bouquet->price, 2) }}</span>
    <livewire:add-to-wishlist :bouquet="$bouquet" />
</div>

        <a href="{{ route('customer.bouquet-show', $bouquet->id) }}" 
   class="w-full bg-yellow-500 text-black py-2 px-4 rounded hover:bg-yellow-600 transition flex items-center justify-center">
    <i class="fas fa-cart-plus mr-2"></i> View Bouquet
</a>

    </div>
</div>

    @endforeach
</div>

        @else
            <p class="text-center text-gray-400">No bouquets available at the moment.</p>
        @endif
    </main>

    <script>
        // Toggle price dropdown
        const priceToggle = document.getElementById('price-toggle');
        const priceDropdown = document.getElementById('price-dropdown');

        priceToggle.addEventListener('click', () => {
            priceDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
            if (!priceToggle.contains(e.target) && !priceDropdown.contains(e.target)) {
                priceDropdown.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
