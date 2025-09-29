<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BloomBox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') {{-- Tailwind --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

</head>
<body class="bg-white">

<header class="flex justify-between items-center px-6 py-4 bg-black text-white relative">
    
    <!-- Logo -->
    <a href="{{ url('/') }}" class="flex items-center space-x-3">
        <img src="{{ asset('images/bloombox.edited.png') }}" 
             alt="Bloombox Logo" 
             class="h-20 w-auto object-contain" />
    </a>

    <!-- Mobile menu button -->
    <button id="menu-toggle" class="md:hidden text-2xl focus:outline-none">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Nav links -->
    <nav id="nav-links" class="hidden md:flex space-x-8 text-lg font-light">
        <a href="{{ route('customer.bouquets-index') }}" class="hover:text-yellow-400 transition">Bouquets</a>
        <a href="{{ url('/occasions') }}" class="hover:text-yellow-400 transition">Occasions</a>
        <a href="{{ url('/flower-lab') }}" class="hover:text-yellow-400 transition">Flower Lab</a>
        <a href="{{ url('/orders') }}" class="hover:text-yellow-400 transition">Orders</a>
    </nav>

    <!-- Icons -->
<div class="hidden md:flex items-center space-x-5 text-xl">
    <i class="fas fa-shopping-cart hover:text-yellow-400 cursor-pointer transition"></i>

    <!-- Logout Icon -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" title="Logout" class="text-white hover:text-red-500 text-xl">
            <i class="fas fa-sign-out-alt cursor-pointer"></i>
        </button>
    </form>
</div>

</header>

<!-- Mobile Nav -->
<div id="mobile-menu" class="hidden bg-black text-white flex-col space-y-4 px-6 py-4 md:hidden">
    <a href="{{ route('customer.bouquets-index') }}" class="block hover:text-yellow-400 transition">Bouquets</a>
    <a href="{{ url('/occasions') }}" class="block hover:text-yellow-400 transition">Occasions</a>
    <a href="{{ url('/flower-lab') }}" class="block hover:text-yellow-400 transition">Flower Lab</a>
    <a href="{{ url('/orders') }}" class="block hover:text-yellow-400 transition">Orders</a>
    <div class="flex space-x-5 pt-2 text-xl">
        <i class="fas fa-shopping-cart hover:text-yellow-400 cursor-pointer transition"></i>
        <a href="{{ route('admin.login') }}">
            <i class="fas fa-user-circle hover:text-yellow-400 cursor-pointer transition"></i>
        </a>
    </div>
</div>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
    
</script>

</body>
</html>
