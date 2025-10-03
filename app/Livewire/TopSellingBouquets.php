<?php

// app/Livewire/TopSellingBouquets.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bouquet;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class TopSellingBouquets extends Component
{
    public $topBouquets;

    public function mount()
    {
        $this->loadTopBouquets();
    }

    public function loadTopBouquets()
    {
        // Get bouquet_id with highest total quantity
        $topBouquetIds = OrderItem::select('bouquet_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('bouquet_id')
            ->orderByDesc('total_sold')
            ->limit(3)
            ->pluck('bouquet_id');

        // Load full bouquet details for those IDs
        $this->topBouquets = Bouquet::whereIn('id', $topBouquetIds)->get();
    }

    public function render()
    {
        return view('livewire.top-selling-bouquets');
    }
}
