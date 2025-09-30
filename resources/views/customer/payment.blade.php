{{-- Black navbar --}}
@include('layouts.customer-nav')
@vite('resources/js/payment.js')

<main class="bg-black min-h-screen text-white py-10">
    <div class="max-w-lg mx-auto bg-gray-900 p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-yellow-400">Payment</h1>

        <p class="mb-4 text-lg">Order ID: <strong>{{ $order->id }}</strong></p>
        <p class="mb-6 text-lg">Total: <strong>LKR {{ number_format($order->total_cost, 2) }}</strong></p>

        <form id="payment-form" class="space-y-4 text-black bg-gray-200 p-4 rounded">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <input type="hidden" name="total_amount" value="{{ $order->total_cost }}">

            <div>
                <label class="block mb-1 font-bold">Card Holder Name</label>
                <input type="text" name="card_holdername" class="w-full p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1 font-bold">Card Number</label>
                <input type="text" name="card_number" class="w-full p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1 font-bold">CVV</label>
                <input type="text" name="cvv" class="w-full p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1 font-bold">Payment Method</label>
                <select name="payment_method" class="w-full p-2 rounded" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="debit_card">Debit Card</option>
                </select>
            </div>

            <button type="submit" class="bg-yellow-400 text-black px-4 py-2 rounded font-bold">
                Confirm Payment
            </button>
        </form>
    </div>
</main>
