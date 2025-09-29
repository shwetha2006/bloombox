<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloombox Admin Dashboard</title>
    @livewireStyles
</head>
<body style="margin: 0; padding: 0; font-family: 'Arial', sans-serif; background-color: black; color: white;">
    <div style="display: flex; min-height: 100vh; flex-direction: column;">
        @include('admin.header')

        <!-- Main Content -->
        <div style="display: flex; flex: 1;">
            <!-- Sidebar -->
            @include('layouts.admin_nav')

            <!-- Dashboard Content -->
            <div style="flex: 1; padding: 30px; background-color: black;">
                <h1 style="color: #D4AF37; margin-bottom: 30px; font-size: 28px;">Dashboard Overview</h1>
                
                {{-- Livewire component --}}
                <livewire:admin-dashboard-stats />
            </div>
        </div>
    </div>

    @if(session('api_token'))
<script>
    localStorage.setItem('api_token', '{{ session('api_token') }}');
    console.log('Admin API token saved to localStorage:', localStorage.getItem('api_token'));
</script>
@endif


<script>
document.getElementById('admin-logout-btn').addEventListener('click', async () => {
    const token = localStorage.getItem('api_token'); // get token from localStorage
    if (!token) {
        window.location.href = '/admin/login'; // fallback
        return;
    }

    try {
        // Send POST request to API logout
        await axios.post('/api/admin/logout', {}, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });

        // Remove token from localStorage
        localStorage.removeItem('api_token');

        // Redirect to admin login
        window.location.href = '/admin/login';
    } catch (error) {
        console.error('Logout failed', error);
        alert('Logout failed. Try again.');
    }
});
</script>



</body>
</html>