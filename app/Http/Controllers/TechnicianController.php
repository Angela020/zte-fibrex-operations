<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;

class TechnicianController extends Controller
{
   public function index(Request $request)
{
    $search = $request->search;

    $technicians = Technician::where('full_name', 'like', "%$search%")
        ->orWhere('phone_number', 'like', "%$search%")
        ->orWhere('email', 'like', "%$search%")
        ->orWhere('department', 'like', "%$search%")
        ->get();

    return view('technicians', compact('technicians'));
}

    public function create()
    {
        return view('addtechnician');
    }

    public function store(Request $request)
    {
        Technician::create([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'department' => $request->department,
            'status' => 'Available',
        ]);

        return redirect('/technicians')
            ->with('success', 'Technician added successfully!');
    }

    public function edit($id)
    {
        $technician = Technician::findOrFail($id);

        return view('edittechnician', compact('technician'));
    }

    public function update(Request $request, $id)
    {
        $technician = Technician::findOrFail($id);

        $technician->update([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'department' => $request->department,
            'status' => $request->status,
        ]);

        return redirect('/technicians')
            ->with('success', 'Technician updated successfully!');
    }

    public function destroy($id)
    {
        $technician = Technician::findOrFail($id);

        $technician->delete();

        return redirect('/technicians')
            ->with('success', 'Technician deleted successfully!');
    }
}