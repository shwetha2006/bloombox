<div>
    <button wire:click="toggleWishlist"
        class="text-2xl transition-colors duration-300"
        title="{{ $isInWishlist ? 'Remove from wishlist' : 'Add to wishlist' }}">
        @if($isInWishlist)
            <i class="fas fa-heart text-pink-500"></i>
        @else
            <i class="far fa-heart text-gray-400 hover:text-pink-500"></i>
        @endif
</button>
</div>
