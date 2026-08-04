@extends('layouts.app')

@section('content')

<h2>Add Technician</h2>

<form action="/technicians" method="POST">

@csrf

<label>Full Name</label>
<input type="text" name="full_name" required>

<label>Phone Number</label>
<input type="text" name="phone_number" required>

<label>Email</label>
<input type="email" name="email">

<label>Department</label>

<select name="department">

<option>Installation</option>
<option>Maintenance</option>
<option>Support</option>

</select>

<br><br>

<button class="btn">
Save Technician
</button>

</form>

@endsection