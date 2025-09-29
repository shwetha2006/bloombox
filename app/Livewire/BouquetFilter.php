<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bouquet;

class BouquetList extends Component
{
    public $minPrice = 0;
    public $maxPrice = 20000;
    public $showPriceDropdown = false;

    public function togglePriceDropdown()
    {
        $this->showPriceDropdown = !$this->showPriceDropdown;
    }

    public function render()
    {
        $bouquets = Bouquet::whereBetween('price', [$this->minPrice, $this->maxPrice])->get();

        return view('livewire.bouquet-list', compact('bouquets'));
    }
}
