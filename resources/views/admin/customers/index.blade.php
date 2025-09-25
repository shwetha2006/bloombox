@include('admin.header')

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
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff; font-size: 0.9rem;">{{ $customer->user->name }}</td>
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #cccccc; font-size: 0.85rem;">{{ $customer->user->email }}</td>
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #cccccc; font-size: 0.85rem;">{{ $customer->mobile_num }}</td>
                                    <td style="border: 1px solid #404040; padding: 0.875rem; color: #D4AF37; font-size: 0.85rem;">{{ $customer->user->created_at->format('Y-m-d') }}</td>
                                
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
