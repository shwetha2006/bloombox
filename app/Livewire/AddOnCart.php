<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AddOn;
use Illuminate\Support\Facades\Session;

class AddOnCart extends Component
{
    public $addOn;

    public function mount(AddOn $addOn)
    {
        $this->addOn = $addOn;
    }

    public function addToCart()
{
    $cart = Session::get('cart', []);

    $cart['addon_' . $this->addOn->id] = [
    'id' => $this->addOn->id,
    'name' => $this->addOn->name,
    'price' => $this->addOn->price,
    'quantity' => 1,
    'image' => $this->addOn->image,
    'type' => 'addon',
];

    Session::put('cart', $cart);

    session()->flash('message', $this->addOn->name . ' added to cart!');
}


    public function render()
    {
        return view('livewire.add-on-cart');
    }
} 
