
    {{-- Customer Nav --}}
    @include('layouts.customer-nav')

    {{-- Hero Section --}}
    <section class="flex flex-col md:flex-row items-center justify-center bg-black text-white min-h-screen p-6 md:p-12">
        <!-- Flower Image -->
        <div class="hidden md:block md:w-1/2 md:pr-10">
            <img src="{{ asset('images/flower4ff.jpg') }}" 
                 alt="Flowers" 
                 class="w-full h-auto rounded-lg">
        </div>

        <!-- Text Content (Right) -->
        <div class="w-full md:w-1/2 text-center space-y-6">
            <h1 class="text-6xl md:text-6xl font-bold tracking-tight">WELCOME TO</h1>
            <div class="flex justify-center">
                <img src="{{ asset('images/coverbloombox.png') }}" 
                     class="w-[700px] md:w-[1000px]">
            </div>
            <p class="italic text-amber-200 text-lg md:text-2xl">
                "Where Every Petal Tells a Story"
            </p>
        </div>
    </section>

    {{-- Occasions Section --}}
    <section class="bg-black py-12">
        <div class="text-center max-w-4xl mx-auto mb-12 px-4">
    <!-- Main Heading -->
    <h2 class="text-4xl md:text-5xl font-semibold text-white tracking-wide leading-tight" style="font-family: 'Playfair Display', serif;">
        Timeless Blooms for Every Moment
    </h2>

    <!-- Subheading -->
    <p class="mt-4 text-lg md:text-xl text-amber-200 italic font-light">
        Convey what words cannot with stunning, fresh flowers that express heartfelt 
        emotions for every occasion and create moments to remember.
    </p>
</div>

        <div class="max-w-6xl mx-auto flex flex-wrap justify-center gap-6 px-4">
    <!-- Wedding Flowers -->
    <a href="{{ route('customer.category-bouquets', 102) }}" class="relative w-80 h-[520px] overflow-hidden rounded-lg">
        <img src="{{ asset('images/wedding.jpg') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
        <h3 class="absolute bottom-8 w-full text-center text-white text-2xl font-medium">Wedding</h3>
    </a>

    <!-- Middle stacked -->
    <div class="flex flex-col gap-6">
        <a href="{{ route('customer.category-bouquets', 104) }}" class="relative w-80 h-60 overflow-hidden rounded-lg">
            <img src="{{ asset('images/anniversary.jpg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
            <h3 class="absolute bottom-6 w-full text-center text-white text-2xl font-medium">Anniversary</h3>
        </a>

        <a href="{{ route('customer.category-bouquets', 103) }}" class="relative w-80 h-60 overflow-hidden rounded-lg">
            <img src="{{ asset('images/birthday.jpg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
            <h3 class="absolute bottom-6 w-full text-center text-white text-2xl font-medium">Birthday</h3>
        </a>
    </div>

    <!-- Graduation Flowers -->
    <a href="{{ route('customer.category-bouquets', 105) }}" class="relative w-80 h-[520px] overflow-hidden rounded-lg">
        <img src="{{ asset('images/graduation.jpg') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
        <h3 class="absolute bottom-8 w-full text-center text-white text-2xl font-medium">Graduation</h3>
    </a>
</div>

    </section>


    {{-- Top Picks of the Week --}}
    <section class="py-16 bg-black text-white">
        <div class="flex items-center justify-center max-w-5xl mx-auto mb-12 px-4">
    <h2 class="text-3xl md:text-4xl font-semibold tracking-wide" 
        style="font-family: 'Playfair Display', serif;">
        Top picks of the Week
    </h2>
</div>
<div class="max-w-6xl mx-auto flex justify-center px-4">
    <livewire:top-selling-bouquets />
</div>



        <div class="flex justify-center mt-6">
    <a href="{{ route('customer.bouquets-index') }}" 
       class="px-8 py-3 bg-amber-400 text-black font-semibold rounded-lg shadow-md hover:bg-amber-500 transition-all duration-300 text-lg uppercase tracking-wider">
        Shop All
    </a>
</div>

<div>
          @include('layouts.footer')  
</div>
    </section>
    
    @if(session('api_token'))
<script>
    localStorage.setItem('api_token', '{{ session('api_token') }}');
    console.log('Customer API token saved:', localStorage.getItem('api_token'));
</script>
@endif
