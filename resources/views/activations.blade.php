@extends('layouts.app')

@section('content')

<style>

.top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

th,td{
    padding:15px;
    border-bottom:1px solid #ddd;
    text-align:left;
}

th{
    background:#0056b3;
    color:white;
}

.success{
    background:#d4edda;
    color:#155724;
    padding:12px;
    border-radius:5px;
    margin-bottom:20px;
}

</style>

@if(session('success'))
<div class="success">
    {{ session('success') }}
</div>
@endif

<div class="top">

    <h2>Activation Queue</h2>

    <a href="/activations/create">
        <button class="btn">+ New Activation</button>
    </a>

</div>

<table>

<tr>
    <th>ID</th>
    <th>Customer</th>
    <th>Technician</th>
    <th>Installation Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>

@foreach($activations as $activation)

<tr>

    <td>{{ $activation->id }}</td>

    <td>{{ $activation->customer->customer_name }}</td>

    <td>{{ $activation->technician->full_name }}</td>

    <td>{{ $activation->installation_date }}</td>

<td>

@if($activation->status == 'Pending')

<span style="background:#ffc107; color:white; padding:6px 15px; border-radius:20px; font-weight:bold;">
    Pending
</span>

@else

<span style="background:#28a745; color:white; padding:6px 15px; border-radius:20px; font-weight:bold;">
    ✔ Completed
</span>

@endif

</td>
<td>

@if($activation->status == 'Pending')

<form action="/activations/{{ $activation->id }}/complete" method="POST">

    @csrf
    @method('PUT')

    <button class="btn">
        Complete
    </button>

</form>

@else

<span style="background:#28a745; color:white; padding:6px 15px; border-radius:20px; font-weight:bold;">
    ✔ Completed
</span>

@endif

</td>
</tr>

@endforeach

</table>

@endsection