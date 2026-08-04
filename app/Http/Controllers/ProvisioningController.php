<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProvisioningController extends Controller
{
    public function index()
    {
$activations = Activation::with('customer', 'technician')
    ->whereIn('status', ['Completed', 'Provisioned'])
    ->get();
    
        return view('provisioning', compact('activations'));
    }

    public function provision($id)
    {
        $activation = Activation::findOrFail($id);

        $activation->update([
            'status' => 'Provisioned'
        ]);

        Customer::where('id', $activation->customer_id)
            ->update([
                'status' => 'Active'
            ]);

        return redirect('/provisioning')
            ->with('success', 'Customer provisioned successfully!');
    }
}