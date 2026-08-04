<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Technician;
use App\Models\Activation;

class ReportController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();

        $activeCustomers = Customer::where('status', 'Active')->count();

        $totalTechnicians = Technician::count();

        $pendingActivations = Activation::where('status', 'Pending')->count();

        $completedActivations = Activation::where('status', 'Completed')->count();

        $provisionedCustomers = Activation::where('status', 'Provisioned')->count();

        return view('reports', compact(
            'totalCustomers',
            'activeCustomers',
            'totalTechnicians',
            'pendingActivations',
            'completedActivations',
            'provisionedCustomers'
        ));
    }
}