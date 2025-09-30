<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bouquet;
use Illuminate\Support\Facades\Session;

class AddToCart extends Component
{
    public $bouquet;
    public $quantity = 1;

    public function mount(Bouquet $bouquet)
    {
        $this->bouquet = $bouquet;
    }

    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        // Get existing cart or create new one
        $cart = Session::get('cart', []);

        // If bouquet already in cart, increase qty
        if (isset($cart[$this->bouquet->id])) {
            $cart[$this->bouquet->id]['quantity'] += $this->quantity;
        } else {
            $cart[$this->bouquet->id] = [
                'id'       => $this->bouquet->id,
                'name'     => $this->bouquet->name,
                'price'    => $this->bouquet->price,
                'quantity' => $this->quantity,
                'image'    => $this->bouquet->image,
            ];
        }

        // Save back into session
        Session::put('cart', $cart);

         session()->flash('success', $this->bouquet->name . ' added to cart!');

    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
