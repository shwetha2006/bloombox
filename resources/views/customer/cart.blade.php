{{-- Include custom black navbar --}}
@include('layouts.customer-nav')

<main class="bg-black min-h-screen text-white py-10">
    <div class="max-w-6xl mx-auto bg-gray-980 rounded-lg p-8 shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-yellow-400">Your Cart</h1>

        @if(count($cart) > 0)
        <table class="w-full text-white border-collapse">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left p-2">Product</th>
                    <th class="text-left p-2">Price</th>
                    <th class="text-left p-2">Quantity</th>
                    <th class="text-left p-2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $key => $item)
                    <tr class="border-b border-gray-700">
                        <td class="p-2 flex items-center gap-4">
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-32 h-32 object-cover rounded">
                            {{ $item['name'] }}
                        </td>
                                <td class="p-2">LKR {{ number_format($item['price'], 2) }}</td>
                                <td class="p-2">{{ $item['quantity'] }}</td>
                                <td class="p-2">LKR {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td class="p-2">
                                <form action="{{ route('cart.remove', $key) }}" method="POST">
                                    @csrf
                                    <button class="bg-red-500 px-3 py-1 rounded hover:bg-red-600">Remove</button>
                                </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="text-right mt-6 text-xl font-bold">
            Total: LKR {{ number_format(array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart)), 2) }}
        </div>
        @else
        <p class="text-gray-400 text-center">Your cart is empty.</p>
        @endif
    </div>

    @if(!empty($cart))
<form id="confirm-order-form" action="{{ route('cart.place') }}" method="POST">
    @csrf
    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
        Confirm Order
    </button>
</form>
@endif

<div>
          @include('layouts.footer')  
</div>

</main>

