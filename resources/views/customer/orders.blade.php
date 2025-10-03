{{-- resources/views/customer/orders.blade.php --}}
@include('layouts.customer-nav')

<main class="bg-black min-h-screen text-white container mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-8 text-center text-yellow-400">My Orders</h1>

    @if($orders->count() > 0)
        <div class="space-y-8">
            @foreach($orders as $order)
                <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
                    {{-- Order Header --}}
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4 border-b border-gray-700 pb-4">
                        <div>
                            <h2 class="text-xl font-semibold text-yellow-400">Order #{{ $order->id }}</h2>
                            <p class="text-gray-400">Placed on: {{ $order->created_at->format('d M, Y') }}</p>
                        </div>
                        <div class="mt-2 md:mt-0 text-right">
                            <p>Order Status: 
                                <span class="font-semibold 
                                    {{ $order->order_status == 'Pending' ? 'text-yellow-400' : '' }}
                                    {{ $order->order_status == 'Processing' ? 'text-blue-400' : '' }}
                                    {{ $order->order_status == 'Completed' ? 'text-green-400' : '' }}
                                    {{ $order->order_status == 'Cancelled' ? 'text-red-400' : '' }}
                                ">
                                    {{ $order->order_status }}
                                </span>
                            </p>
                            <p>Shipment Status: 
                                <span class="font-semibold 
                                    {{ optional($order->shipment)->shipment_status == 'Not Shipped' ? 'text-yellow-400' : '' }}
                                    {{ optional($order->shipment)->shipment_status == 'Shipped' ? 'text-blue-400' : '' }}
                                    {{ optional($order->shipment)->shipment_status == 'Delivered' ? 'text-green-400' : '' }}
                                ">
                                    {{ optional($order->shipment)->shipment_status ?? 'Not Shipped' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    {{-- Order Items --}}
<div class="overflow-x-auto">
    <table class="w-full text-left">
        <thead>
            <tr class="text-gray-400 border-b border-gray-700">
                <th class="px-4 py-2">Bouquet</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2 text-right">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr class="bg-gray-800 border-b border-gray-700">
                    <td class="px-4 py-2">{{ optional($item->bouquet)->name ?? 'Bouquet not found' }}</td>
                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                    <td class="px-4 py-2 text-right">LKR {{ number_format($item->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

                    {{-- Total --}}
                    <div class="mt-4 flex justify-end">
                        <p class="text-yellow-500 font-bold text-lg">Total: LKR {{ number_format($order->total_cost, 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-400 mt-10">You haven't placed any orders yet.</p>
    @endif

    <div>
          @include('layouts.footer')  
</div>
</main>
