<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; 
use App\Models\Customer; 
use App\Models\Bouquet; 
use App\Http\Resources\AdminResource;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::with(['user', 'bouquets'])->paginate(10);
        return AdminResource::collection($admins);
    }

    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $admin = Admin::create($validated);

        return new AdminResource($admin);
    }

     public function dashboard()
    {
        $total_customers = Customer::count();
        $total_bouquets = Bouquet::count();
        $total_orders = 102; // replace with actual logic
        $pending_orders = 24; // replace with actual logic

        // Pass variables to the view
        return view('admin-dashboard', compact(
            'total_customers', 
            'total_bouquets', 
            'total_orders', 
            'pending_orders'
        ));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
