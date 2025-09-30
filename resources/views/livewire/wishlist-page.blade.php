<div class="max-w-6xl mx-auto bg-gray-980 rounded-lg p-8 shadow-lg text-white">
    <h1 class="text-3xl font-bold mb-6 text-yellow-400">Your Wishlist</h1>

    @if(count($wishlist) > 0)
        <table class="w-full border-collapse text-white">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left p-2">Product</th>
                    <th class="text-left p-2">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wishlist as $item)
                    <tr class="border-b border-gray-700">
                        <td class="p-2 flex items-center gap-4">
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-32 h-32 object-cover rounded">
                            {{ $item['name'] }}
                        </td>
                        <td class="p-2">LKR {{ number_format($item['price'], 2) }}</td>
                        <td class="p-2 flex gap-2">
                            <button wire:click="removeFromWishlist({{ $item['id'] }})"
                                class="bg-red-500 px-3 py-1 rounded hover:bg-red-600">
                                Remove
                            </button>
                            <a href="{{ route('customer.bouquet-show', $item['id']) }}" 
                                class="bg-yellow-500 text-black px-4 py-1 rounded hover:bg-yellow-600">
                                View Bouquet
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-400 text-center">Your wishlist is empty.</p>
    @endif
</div>
