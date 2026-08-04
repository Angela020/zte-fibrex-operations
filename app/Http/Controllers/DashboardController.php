<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Technician;
use App\Models\Activation;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();

        $totalTechnicians = Technician::count();

        $pendingActivations = Activation::where('status', 'Pending')->count();

        $activeCustomers = Customer::where('status', 'Active')->count();
        $completedActivations = Activation::where('status', 'Completed')->count();

        return view('dashboard', compact(
    'totalCustomers',
    'totalTechnicians',
    'pendingActivations',
    'activeCustomers',
    'completedActivations'
));
    }
}