<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class WishlistPage extends Component
{
    public $wishlist = [];

    public function mount()
    {
        $this->wishlist = Session::get('wishlist', []);
    }

    public function removeFromWishlist($id)
    {
        $wishlist = Session::get('wishlist', []);
        unset($wishlist[$id]);
        Session::put('wishlist', $wishlist);
        $this->wishlist = $wishlist;
    }

    public function render()
    {
        return view('livewire.wishlist-page');
    }
}
