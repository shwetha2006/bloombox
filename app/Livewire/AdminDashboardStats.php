<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use App\Models\Bouquet;
use App\Models\Customer;

class AdminDashboardStats extends Component
{
    public $totalCustomers;
    public $totalOrders;
    public $pendingOrders;
    public $totalBouquets;
    public $lowStockBouquets; // new

    public function mount()
    {
        $this->totalCustomers = Customer::count();
        
        // Only pending orders
        $this->pendingOrders = Order::where('order_status', 'pending')->count();
        $this->totalOrders = Order::count();

        $this->totalBouquets = Bouquet::count();

        // Bouquets with stock less than 10
        $this->lowStockBouquets = Bouquet::where('stock_quantity', '<', 10)->get();
    }

    public function render()
    {
        return view('livewire.admin-dashboard-stats');
    }
}
