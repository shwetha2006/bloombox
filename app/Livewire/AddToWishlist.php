<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bouquet;
use Illuminate\Support\Facades\Session;

class AddToWishlist extends Component
{
    public $bouquet;
    public $isInWishlist = false;

    public $wishlist = [];


    public function mount(Bouquet $bouquet)
    {
        $this->bouquet = $bouquet;

        // Check if bouquet is already in wishlist
        $wishlist = Session::get('wishlist', []);
        $this->isInWishlist = isset($wishlist[$this->bouquet->id]);
    }

    public function toggleWishlist()
    {
        $wishlist = Session::get('wishlist', []);

        if (isset($wishlist[$this->bouquet->id])) {
            unset($wishlist[$this->bouquet->id]);
            $this->isInWishlist = false;
            session()->flash('success', $this->bouquet->name . ' removed from wishlist.');
        } else {
            $wishlist[$this->bouquet->id] = [
                'id' => $this->bouquet->id,
                'name' => $this->bouquet->name,
                'price' => $this->bouquet->price,
                'image' => $this->bouquet->image,
            ];
            $this->isInWishlist = true;
            session()->flash('success', $this->bouquet->name . ' added to wishlist!');
        }

        Session::put('wishlist', $wishlist);
    }

    public function render()
    {
        return view('livewire.add-to-wishlist');
    }
}
