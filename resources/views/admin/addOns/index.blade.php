{{-- resources/views/admin/addons/index.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Ons</title>
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
                <h1 style="font-size: 2rem; margin-bottom: 2rem; color: #D4AF37; font-weight: 600; text-align: left;">Add-On List</h1>

                <!-- Add Add-On Button -->
                <div style="margin-bottom: 2rem;">
                    <a href="{{ route('admin.addons.create') }}" 
                       style="background: linear-gradient(135deg, #D4AF37, #B8941F); color: #000000; text-decoration: none; font-weight: 600; padding: 12px 24px; border-radius: 6px; display: inline-block; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(212, 175, 55, 0.3);"
                       onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(212, 175, 55, 0.4)'"
                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 4px rgba(212, 175, 55, 0.3)'">
                        Add New Add-On
                    </a>
                </div>

                <!-- Responsive wrapper for table -->
                <div style="overflow-x: auto; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);">
                    <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                        <thead>
                            <tr style="background-color: #2d2d2d; border-bottom: 2px solid #D4AF37;">
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Add-On ID</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Add-On Name</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: center; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Image</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Description</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Price</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: center; color: #D4AF37; font-weight: 600; font-size: 0.95rem;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($addons as $addon)
                                <tr style="background-color: #1a1a1a; transition: background-color 0.2s ease;" 
                                    onmouseover="this.style.backgroundColor='#2d2d2d'" 
                                    onmouseout="this.style.backgroundColor='#1a1a1a'">
                                    
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff; font-size: 0.9rem;">#{{ $addon->id }}</td>
                                    
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff; font-size: 0.9rem;">{{ $addon->name }}</td>

                                    <!-- Image Column -->
                                    <td style="border: 1px solid #404040; padding: 0.875rem; text-align: center;">
                                        @if (!empty($addon->image))
                                            <img src="{{ asset('uploads/' . $addon->image) }}" 
                                                 alt="{{ $addon->name }}"
                                                 style="height: 64px; width: 64px; object-fit: cover; border-radius: 8px; border: 2px solid #D4AF37; box-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                                        @else
                                            <div style="height: 64px; width: 64px; background-color: #333333; display: flex; align-items: center; justify-content: center; border-radius: 8px; border: 2px solid #555555; color: #888888; font-size: 0.75rem; text-align: center; margin: 0 auto;">
                                                No Image
                                            </div>
                                        @endif
                                    </td>

                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff; font-size: 0.9rem;">{{ $addon->description }}</td>

                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #D4AF37; font-size: 0.9rem;">Rs. {{ number_format($addon->price, 2) }}</td>
                                    
                                    <td style="border: 1px solid #404040; padding: 0.875rem; text-align: center;">
                                        <div style="display: flex; justify-content: center; align-items: center; gap: 12px;">
                                            <a href="{{ route('admin.addons.edit', $addon->id) }}" 
                                               title="Edit Add-On"
                                               style="background-color: #2d5a2d; color: #ffffff; padding: 8px 12px; border-radius: 4px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 4px;"
                                               onmouseover="this.style.backgroundColor='#3d7a3d'; this.style.transform='translateY(-1px)'"
                                               onmouseout="this.style.backgroundColor='#2d5a2d'; this.style.transform='translateY(0)'">
                                                ✏️ Edit
                                            </a>

                                            <form action="{{ route('admin.addons.destroy', $addon->id) }}" method="POST" style="display: inline;"
                                                  onsubmit="return confirm('Are you sure you want to delete this add-on?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        title="Delete Add-On"
                                                        style="background-color: #7a2d2d; color: #ffffff; padding: 8px 12px; border-radius: 4px; border: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 4px; cursor: pointer;"
                                                        onmouseover="this.style.backgroundColor='#9a3d3d'; this.style.transform='translateY(-1px)'"
                                                        onmouseout="this.style.backgroundColor='#7a2d2d'; this.style.transform='translateY(0)'">
                                                    🗑️ Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile responsive message -->
                <div style="margin-top: 1rem; color: #888888; font-size: 0.8rem; text-align: center; display: none;" id="mobileMessage">
                    Scroll horizontally to view all columns
                </div>
            </div>
        </div>
    </div>
</body>
</html>
