<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activation;
use App\Models\Customer;
use App\Models\Technician;

class ActivationController extends Controller
{
    public function index()
    {
        $activations = Activation::with('customer', 'technician')->get();

        return view('activations', compact('activations'));
    }

    public function create()
    {
        $customers = Customer::where('status', 'Pending')->get();

        $technicians = Technician::where('status', 'Available')->get();

        return view('addactivation', compact('customers', 'technicians'));
    }

    public function store(Request $request)
    {
        Activation::create([
            'customer_id' => $request->customer_id,
            'technician_id' => $request->technician_id,
            'installation_date' => $request->installation_date,
            'status' => 'Pending',
        ]);

        Customer::where('id', $request->customer_id)
            ->update(['status' => 'Assigned']);

        return redirect('/activations')
            ->with('success', 'Activation created successfully!');
    }
    public function complete($id)
{
    $activation = Activation::findOrFail($id);

    $activation->update([
        'status' => 'Completed',
    ]);

    Customer::where('id', $activation->customer_id)
        ->update([
            'status' => 'Active',
        ]);

    Technician::where('id', $activation->technician_id)
        ->update([
            'status' => 'Available',
        ]);

    return redirect('/activations')
        ->with('success', 'Activation completed successfully!');
}
}