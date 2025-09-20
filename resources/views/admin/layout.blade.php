<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
</head>
<body class="bg-black text-white font-sans">
    <header class="bg-gray-900 p-4 flex justify-between items-center">
        <h1 class="text-gold font-bold">BLOOMBOX ADMIN</h1>
        <div>
            Welcome, Admin
            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn btn-outline">Logout</button>
            </form>
        </div>
    </header>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
