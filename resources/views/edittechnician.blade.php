@extends('layouts.app')

@section('content')

<h2>Edit Technician</h2>

<form action="/technicians/{{ $technician->id }}" method="POST">

    @csrf
    @method('PUT')

    <label>Full Name</label>
    <input type="text" name="full_name" value="{{ $technician->full_name }}" required>

    <br><br>

    <label>Phone Number</label>
    <input type="text" name="phone_number" value="{{ $technician->phone_number }}" required>

    <br><br>

    <label>Email</label>
    <input type="email" name="email" value="{{ $technician->email }}">

    <br><br>

    <label>Department</label>

    <select name="department">

        <option value="Installation" {{ $technician->department == 'Installation' ? 'selected' : '' }}>Installation</option>

        <option value="Maintenance" {{ $technician->department == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>

        <option value="Support" {{ $technician->department == 'Support' ? 'selected' : '' }}>Support</option>

    </select>

    <br><br>

    <label>Status</label>

    <select name="status">

        <option value="Available" {{ $technician->status == 'Available' ? 'selected' : '' }}>Available</option>

        <option value="Busy" {{ $technician->status == 'Busy' ? 'selected' : '' }}>Busy</option>

    </select>

    <br><br>

    <button class="btn">
        Update Technician
    </button>

</form>

@endsection