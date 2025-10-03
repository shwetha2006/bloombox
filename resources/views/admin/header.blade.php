<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bloombox Admin')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css') {{-- Tailwind --}}
    @livewireStyles

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Font Awesome (optional for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="margin:0; padding:0; font-family:'Arial', sans-serif; background-color:black; color:white;">

    <!-- Admin Header -->
    <div style="background: linear-gradient(to right, #000000, #111111, #000000); 
                padding: 20px 30px; display: flex; justify-content: space-between; 
                align-items: center; border-bottom: 1px solid #222;">
        
        <div style="color: #D4AF37; font-size: 24px; font-weight: bold;">BLOOMBOX ADMIN</div>
        
        <div style="display: flex; align-items: center;">
            <div style="margin-right: 15px;">Welcome, Admin</div>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" 
                        style="background-color: transparent; border: 1px solid #444; color: white; 
                               padding: 8px 15px; border-radius: 4px; cursor: pointer;">
                    Logout
                </button>
            </form>
        </div> 
    </div>

    @livewireScripts

</body>
