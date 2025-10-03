@include('admin.header')

<div style="display: flex; flex: 1;">
    @include('layouts.admin_nav')
    
    <div style="flex: 1; padding: 2rem; background-color: #000000;">
        <h1 style="font-size: 2rem; margin-bottom: 2rem; color: #D4AF37; font-weight: 600; text-align: left;">
            Orders List
        </h1>

        <div style="overflow-x: auto; background-color: #1a1a1a; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);">
            <table style="width: 100%; border-collapse: collapse; min-width: 1000px;">
                <thead>
                    <tr style="background-color: #2d2d2d; border-bottom: 2px solid #D4AF37;">
                        <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37;">Order ID</th>
                        <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37;">Customer</th>
                        <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37;">Total</th>
                        <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37;">Order Status</th>
                        <th style="border: 1px solid #404040; padding: 1rem; text-align: left; color: #D4AF37;">Shipment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr style="background-color: #1a1a1a; transition: background-color 0.2s ease;" 
                            onmouseover="this.style.backgroundColor='#2d2d2d'" 
                            onmouseout="this.style.backgroundColor='#1a1a1a'">
                            
                            <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff;">#{{ $order->id }}</td>
                            <td style="border: 1px solid #404040; padding: 0.875rem; color: #ffffff;">
                                {{ $order->customer->user->name }}
                            </td>
                            <td style="border: 1px solid #404040; padding: 0.875rem; color: #D4AF37;">
                                ${{ number_format($order->total_cost, 2) }}
                            </td>

                            <!-- Update Form -->
                            <td colspan="3" style="border: 1px solid #404040; padding: 0.875rem;">
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" style="display:flex; gap: 10px; align-items: center;">
                                    @csrf
                                    
                                    <!-- Order Status -->
                                    <select name="order_status" class="bg-gray-800 text-white border border-gray-600 rounded px-2 py-1">
                                        <option value="Pending" {{ $order->order_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Processing" {{ $order->order_status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="Completed" {{ $order->order_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Cancelled" {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>

                                    <!-- Shipment Status -->
                                    <select name="shipment_status" class="bg-gray-800 text-white border border-gray-600 rounded px-2 py-1">
                                        <option value="Not Shipped" {{ $order->shipment && $order->shipment->shipment_status == 'Not Shipped' ? 'selected' : '' }}>Not Shipped</option>
                                        <option value="Shipped" {{ $order->shipment && $order->shipment->shipment_status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                        <option value="Delivered" {{ $order->shipment && $order->shipment->shipment_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                    </select>

                                    <button type="submit" class="bg-yellow-400 text-black px-4 py-1 rounded hover:bg-yellow-300">
                                        Update
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
