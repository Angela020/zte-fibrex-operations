<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $customers = Customer::where('customer_name', 'like', "%$search%")
        ->orWhere('phone_number', 'like', "%$search%")
        ->orWhere('email', 'like', "%$search%")
    ->paginate(10);
    return view('customers', compact('customers'));
}

    public function create()
    {
        return view('addcustomer');
    }

    public function store(Request $request)
    {
        Customer::create([
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'service_plan' => $request->service_plan,
            'status' => 'Pending',
        ]);

        return redirect('/customers')
            ->with('success', 'Customer registered successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('editcustomer', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'service_plan' => $request->service_plan,
            'status' => $request->status,
        ]);

       return redirect('/customers')
    ->with('success', 'Customer updated successfully!');
}

public function destroy($id)
{
    $customer = Customer::findOrFail($id);

    $customer->delete();

    return redirect('/customers')
        ->with('success', 'Customer deleted successfully!');
}
}