@include('layouts.customer-nav')

<section class="bg-black text-white py-16">
    {{-- Page Title --}}
    <div class="text-center max-w-4xl mx-auto mb-12 px-4">
        <h1 class="text-5xl md:text-6xl font-bold text-amber-200 tracking-tight" 
            style="font-family: 'Playfair Display', serif;">
            Event Gallery
        </h1>
        <p class="mt-4 text-lg md:text-xl text-amber-300 italic font-light">
            Moments we made magical with our floral creations
        </p>
    </div>

    {{-- Events Grid --}}
    <div class="max-w-6xl mx-auto grid gap-12 px-4 md:grid-cols-2">
        @foreach($events as $event)
        <div class="relative rounded-xl overflow-hidden shadow-lg group">
            {{-- Main Event Image --}}
            @if(isset($event->images[0]))
            <img src="{{ asset('storage/' . $event->images[0]) }}" 
                 alt="{{ $event->event_name }}" 
                 class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105">
            @endif

            {{-- Overlay Info Panel --}}
            <div class="absolute bottom-0 w-full bg-gradient-to-t from-black/80 via-black/30 to-transparent p-6">
                <h2 class="text-2xl md:text-3xl font-semibold text-amber-200">{{ $event->event_name }}</h2>
                <p class="text-white/80 italic mb-2">{{ $event->event_type }} | {{ $event->date }}</p>
                <p class="text-white/70 text-sm line-clamp-4">{{ $event->description }}</p>

                {{-- Optional extra images --}}
                @if(count($event->images) > 1)
                <div class="flex gap-2 mt-4">
                    @foreach(array_slice($event->images,1) as $img)
                        <img src="{{ asset('storage/' . $img) }}" 
                             class="w-16 h-16 object-cover rounded border border-amber-400">
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div>
          @include('layouts.footer')  
</div>
</section>

