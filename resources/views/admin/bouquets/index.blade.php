@include('admin.header')

        <div style="display: flex; flex: 1;">
            @include('layouts.admin_nav')
            
            <div style="flex: 1; padding: 2rem; background-color: #000000;">
                <h1 style="font-size: 2rem; margin-bottom: 2rem; color: #D4AF37; font-weight: 600; text-align: left;">Bouquet List</h1>

                <!-- Add Bouquet Button -->
                <div style="margin-bottom: 2rem;">
                    <a href="{{ route('admin.bouquets.create') }}" 
                       style="background: linear-gradient(135deg, #D4AF37, #B8941F); color: #000000; text-decoration: none; font-weight: 600; padding: 12px 24px; border-radius: 6px; display: inline-block; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(212, 175, 55, 0.3);"
                       onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(212, 175, 55, 0.4)'"
                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 4px rgba(212, 175, 55, 0.3)'">
                        Add New Bouquet
                    </a>
                </div>

                <!-- Responsive wrapper for table -->
                <div style="overflow-x: auto; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);">
                    <table style="width: 100%; border-collapse: collapse; min-width: 800px;">
                        <thead>
                            <tr style="background-color: #2d2d2d; border-bottom: 2px solid #D4AF37;">
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem; letter-spacing: 0.5px;">Bouquet ID</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem; letter-spacing: 0.5px;">Image</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem; letter-spacing: 0.5px;">Bouquet Name</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem; letter-spacing: 0.5px;">Description</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem; letter-spacing: 0.5px;">Stock quantity</th>

                                <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37; font-weight: 600; font-size: 0.95rem; letter-spacing: 0.5px;">Price</th>
                                <th style="border: 1px solid #404040; padding: 1rem; text-align: center; color: #D4AF37; font-weight: 600; font-size: 0.95rem; letter-spacing: 0.5px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bouquets as $b)
                                <tr style="background-color: #1a1a1a; transition: background-color 0.2s ease;" 
                                    onmouseover="this.style.backgroundColor='#2d2d2d'" 
                                    onmouseout="this.style.backgroundColor='#1a1a1a'">
                                    
                                    <!-- Bouquet ID -->
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff; font-size: 0.9rem; font-weight: 500;">
                                        #{{ $b->id }}
                                    </td>
                                    
                                    <!-- Image -->
                                    <td style="border: 1px solid #404040; padding: 0.875rem; text-align: center;">
                                        @if (!empty($b->image))
                                            <img src="{{ asset('storage/' . $b->image) }}" 
                                                 alt="{{ $b->name }}"
                                                 style="height: 64px; width: 64px; object-fit: cover; border-radius: 8px; border: 2px solid #D4AF37; box-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                                        @else
                                            <div style="height: 64px; width: 64px; background-color: #333333; display: flex; align-items: center; justify-content: center; border-radius: 8px; border: 2px solid #555555; color: #888888; font-size: 0.75rem; text-align: center; margin: 0 auto;">
                                                No Image
                                            </div>
                                        @endif
                                    </td>
                                    
                                    <!-- Bouquet Name -->
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff; font-size: 0.9rem; font-weight: 600;">
                                        {{ $b->name }}
                                    </td>
                                    
                                    <!-- Description -->
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #cccccc; font-size: 0.85rem; max-width: 250px;">
                                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $b->description }}">
                                            {{ $b->description }}
                                        </div>
                                    </td>

                                    <!-- stock quantity -->
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #cccccc; font-size: 0.85rem; max-width: 250px;">
                                        <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $b->stock_quantity }}">
                                            {{ $b->stock_quantity }}
                                        </div>
                                    </td>
                                    
                                    <!-- Price -->
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #D4AF37; font-size: 0.95rem; font-weight: 600;">
                                        Rs. {{ number_format($b->price, 2) }}
                                    </td>
                                    
                                    <!-- Actions -->
                                    <td style="border: 1px solid #404040; padding: 0.875rem; text-align: center;">
                                        <div style="display: flex; justify-content: center; align-items: center; gap: 12px;">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.bouquets.edit', $b->id) }}" 
                                               title="Edit Bouquet"
                                               style="background-color: #2d5a2d; color: #ffffff; padding: 8px 12px; border-radius: 4px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 4px;"
                                               onmouseover="this.style.backgroundColor='#3d7a3d'; this.style.transform='translateY(-1px)'"
                                               onmouseout="this.style.backgroundColor='#2d5a2d'; this.style.transform='translateY(0)'">
                                                ✏️ Edit
                                            </a>
                                            
                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.bouquets.destroy', $b->id) }}" method="POST" style="display: inline;" 
                                                  onsubmit="return confirm('Are you sure you want to delete this bouquet? This action cannot be undone.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        title="Delete Bouquet"
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