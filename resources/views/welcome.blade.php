{{-- resources/views/welcome.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page</title>
    
    {{-- Tailwind --}}
    @vite('resources/css/app.css')

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-black text-white">

    <section class="flex flex-col md:flex-row items-center justify-center min-h-screen p-6 md:p-12">

   
        {{-- Flower Image --}}
        <div class="hidden md:block md:w-1/2 md:pr-10">
            <img src="{{ asset('images/flower4ff.jpg') }}" alt="Flowers"
                 class="w-full h-auto w-[2000px] rounded-lg scale-210 md:scale-100 transform origin-left">
        </div>
        
        {{-- Text Content (Right) --}}
        <div class="w-full md:w-1/2 text-center space-y-6">
            <h1 class="text-6xl md:text-6xl font-bold tracking-tight">WELCOME TO</h1>
            
            <div class="flex justify-center">
                <img src="{{ asset('images/coverbloombox.png') }}" 
                     class="w-[700px] md:w-[1000px]">
            </div>
            
            <p class="italic text-amber-200 text-lg md:text-2xl">"Where Every Petal Tells a Story"</p>

            {{-- Auth Buttons --}}
            @if (Route::has('login'))
                <div class="mt-6 flex justify-center space-x-4">
                    @auth
                        {{-- If logged in → Dashboard --}}
                        <a href="{{ url('/dashboard') }}" 
                           class="inline-block bg-gray-600 text-white hover:bg-amber-300 px-8 py-3 rounded-full text-lg font-medium transition-colors duration-200">
                            Dashboard
                        </a>
                    @else
                        {{-- Login --}}
                        <a href="{{ route('login') }}" 
                           class="inline-block bg-gray-600 text-white hover:bg-amber-300 px-8 py-3 rounded-full text-lg font-medium transition-colors duration-200">
                            Sign in
                        </a>

                        {{-- Register (if enabled) --}}
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="inline-block bg-amber-300 text-black hover:bg-amber-400 px-8 py-3 rounded-full text-lg font-medium transition-colors duration-200">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </section>
    
</body>
</html>
