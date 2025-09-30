{{-- Include custom black navbar --}}
@include('layouts.customer-nav')
@vite('resources/js/shipment.js')

<main class="bg-black min-h-screen text-white py-10">
    <div class="max-w-3xl mx-auto bg-gray-900 rounded-2xl p-8 shadow-xl">
        <h1 class="text-3xl font-bold mb-6 text-yellow-400 text-center">Your Order</h1>

        <p class="mb-4 text-lg">Order ID: <strong>{{ $order->id }}</strong></p>
        <p class="mb-6 text-lg">Total: <strong>LKR {{ number_format($order->total_cost, 2) }}</strong></p>

        @if($orderItems->count() > 0)
        <table class="w-full text-white border-collapse mb-6">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left p-2">Product</th>
                    <th class="text-left p-2">Quantity</th>
                    <th class="text-left p-2">Price</th>
                    <th class="text-left p-2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $item)
                <tr class="border-b border-gray-700">
                    <td class="p-2">{{ $item->bouquet->name }}</td>
                    <td class="p-2">{{ $item->quantity }}</td>
                    <td class="p-2">LKR {{ number_format($item->price, 2) }}</td>
                    <td class="p-2">LKR {{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        {{-- Shipment Form --}}
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4 text-yellow-400">Shipment Details</h2>

            <form id="shipment-form" class="space-y-4 text-black bg-gray-200 p-6 rounded-2xl shadow-lg">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">

                <div>
                    <label class="block mb-1 font-bold">Shipment Date</label>
                    <input type="date" name="shipment_date" class="w-full p-3 rounded-xl border border-gray-300" required>
                </div>

                <div>
                    <label class="block mb-1 font-bold">Address Line 1</label>
                    <input type="text" name="address_line1" class="w-full p-3 rounded-xl border border-gray-300" required>
                </div>

                <div>
                    <label class="block mb-1 font-bold">Address Line 2</label>
                    <input type="text" name="address_line2" class="w-full p-3 rounded-xl border border-gray-300">
                </div>

                <div>
                    <label class="block mb-1 font-bold">City</label>
                    <input type="text" name="city" class="w-full p-3 rounded-xl border border-gray-300" required>
                </div>

                <div>
                    <label class="block mb-1 font-bold">Postal Code</label>
                    <input type="text" name="postal_code" class="w-full p-3 rounded-xl border border-gray-300" required>
                </div>

                <button type="submit" class="w-full bg-yellow-400 text-black py-3 rounded-xl font-bold hover:bg-yellow-500">
                    Save Shipment
                </button>
            </form>

            {{-- Show total with shipment and checkout button after saving --}}
            <div id="shipment-summary" class="mt-6 hidden text-center">
                <p class="text-xl font-bold text-yellow-400">Total with Shipment: LKR <span id="total-with-shipment">{{ number_format($order->total_cost + 800, 2) }}</span></p>
                <a href="{{ route('payment.checkout', $order->id) }}" 
                   class="mt-4 inline-block bg-green-500 text-white px-6 py-3 rounded-xl font-bold hover:bg-green-600">
                   Proceed to Checkout
                </a>
            </div>
        </div>
    </div>
</main>
