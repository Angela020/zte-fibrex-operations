@extends('layouts.app')

@section('content')

<h2>New Activation</h2>

<form action="/activations" method="POST">

    @csrf

    <label>Customer</label><br>

    <select name="customer_id" required>

        <option value="">Select Customer</option>

        @foreach($customers as $customer)
            <option value="{{ $customer->id }}">
                {{ $customer->customer_name }}
            </option>
        @endforeach

    </select>

    <br><br>

    <label>Technician</label><br>

    <select name="technician_id" required>

        <option value="">Select Technician</option>

        @foreach($technicians as $technician)
            <option value="{{ $technician->id }}">
                {{ $technician->full_name }}
            </option>
        @endforeach

    </select>

    <br><br>

    <label>Installation Date</label><br>

    <input type="date" name="installation_date" required>

    <br><br>

    <button class="btn">
        Create Activation
    </button>

</form>

@endsection