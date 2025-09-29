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

    public function mount()
    {
        $this->totalCustomers = Customer::count();        
        $this->totalOrders = Order::count();
        //$this->pendingOrders = Order::where('status', 'pending')->count();
        $this->totalBouquets = Bouquet::count();
    }

    public function render()
    {
        return view('livewire.admin-dashboard-stats');
    }
}
