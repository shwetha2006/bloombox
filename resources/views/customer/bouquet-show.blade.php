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
    @livewire('add-to-cart', ['bouquet' => $bouquet])


</section>

    {{-- Add-ons Section --}}
    <section class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-yellow-400 text-center">Bouquet Add-ons</h2>

        @if($bouquet->addOns->count() > 0)
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @foreach($bouquet->addOns as $addOn)
        @livewire('add-on-cart', ['addOn' => $addOn], key($addOn->id))
    @endforeach
</div>
@else
    <p class="text-gray-400 text-center">No add-ons available for this bouquet.</p>
@endif

    </section>
</main>
