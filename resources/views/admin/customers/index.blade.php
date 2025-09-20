{{-- resources/views/admin/customers/index.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0; font-family: 'Arial', sans-serif; background-color: black; color: white;">
    <div style="display: flex; min-height: 100vh; flex-direction: column;">
        <!-- Header -->
        <div style="background: linear-gradient(to right, #000000, #111111, #000000); padding: 20px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #222;">
            <div style="color: #D4AF37; font-size: 24px; font-weight: bold;">BLOOMBOX ADMIN</div>
            <div style="display: flex; align-items: center;">
                <div style="margin-right: 15px;">Welcome, Admin</div>
                <a href="#">
                    <button style="background-color: transparent; border: 1px solid #444; color: white; padding: 8px 15px; border-radius: 4px; cursor: pointer;">Logout</button>
                </a>
            </div> 
        </div>

        <div style="display: flex; flex: 1;">
            @include('layouts.admin_nav')
            
            <div style="flex: 1; padding: 2rem; background-color: #000000;">
                <h1 style="font-size: 2rem; margin-bottom: 2rem; color: #D4AF37; font-weight: 600; text-align: left;">Customer List</h1>

                <!-- Responsive wrapper for table -->
                <div style="overflow-x: auto; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);">
                    <table style="width: 100%; border-collapse: collapse; min-width: 800px;">
                        <thead>
                            <tr style="background-color: #2d2d2d; border-bottom: 2px solid #D4AF37;">
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">ID</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Name</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Email</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Phone</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Registered At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr style="background-color: #1a1a1a; transition: background-color 0.2s ease;" 
                                    onmouseover="this.style.backgroundColor='#2d2d2d'" 
                                    onmouseout="this.style.backgroundColor='#1a1a1a'">
                                    
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff; font-size: 0.9rem;">#{{ $customer->id }}</td>
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff; font-size: 0.9rem;">{{ $customer->name }}</td>
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #cccccc; font-size: 0.85rem;">{{ $customer->email }}</td>
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #cccccc; font-size: 0.85rem;">{{ $customer->mobile_num }}</td>
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #D4AF37; font-size: 0.85rem;">{{ $customer->created_at->format('d M Y') }}</td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 1rem; color: #888888; font-size: 0.8rem; text-align: center; display: none;" id="mobileMessage">
                    Scroll horizontally to view all columns
                </div>
            </div>
        </div>
    </div>
</body>
</html>
