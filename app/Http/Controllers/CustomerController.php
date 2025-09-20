<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; 
use App\Models\User; 
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $customers = Customer::with(['user', 'orders'])->paginate(10);
    //     return CustomerResource::collection($customers);
    // }

    public function index()
    {
        $customers = User::all(); // fetch all customers
        return view('admin.customers.index', compact('customers'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'mobile_num' => 'required|string|max:20',
            'user_id' => 'required|exists:users,id',
        ]);

        $customer = Customer::create($validated);

        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $customer)
    {
        return view('admin.customers.show', compact('customer'));
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
