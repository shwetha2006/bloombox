{{-- Top Selling Bouquets Grid --}}
@if($topBouquets->count() > 0)
<div class="flex flex-wrap justify-center gap-8 max-w-6xl mx-auto px-4">
    @foreach($topBouquets as $bouquet)
    <div class="bg-gray-800 text-center overflow-hidden shadow-[0_10px_15px_-3px_rgba(0,0,0,0.1),0_4px_6px_-2px_rgba(0,0,0,0.05)] rounded-lg flex-1 min-w-[300px] max-w-[350px] transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
        <img src="{{ asset('storage/' . $bouquet->image) }}" 
             alt="{{ $bouquet->name }}" 
             class="w-full h-80 object-cover">

        <div class="p-9">
            <h2 class="text-xl font-bold mb-2 text-white">{{ $bouquet->name }}</h2>
            
            <div class="text-yellow-500 font-bold mb-4 text-lg">
                LKR {{ number_format($bouquet->price, 2) }}
            </div>

            <livewire:add-to-wishlist :bouquet="$bouquet" />

            <a href="{{ route('customer.bouquet-show', $bouquet->id) }}" 
               class="mt-4 inline-block w-full bg-yellow-500 text-black py-2 px-4 rounded hover:bg-yellow-600 transition-all duration-300">
                View Bouquet
            </a>

        </div>
    </div>
    @endforeach
</div>
@else
<p class="text-center text-white">No top-selling bouquets yet.</p>
@endif
