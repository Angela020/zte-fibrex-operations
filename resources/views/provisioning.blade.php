@extends('layouts.app')

@section('content')

<style>

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

<h2 style="margin-bottom:25px;">
🌐 Provisioning Queue
</h2>

@if(session('success'))
<div class="success">
{{ session('success') }}
</div>
@endif

<table>

<tr>
    <th>Customer</th>
    <th>Technician</th>
    <th>Installation Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>

@foreach($activations as $activation)

<tr>

<td>{{ $activation->customer->customer_name }}</td>

<td>{{ $activation->technician->full_name }}</td>

<td>{{ $activation->installation_date }}</td>

<td>

@if($activation->status == 'Completed')

<span style="background:#d4edda;color:#155724;padding:6px 14px;border-radius:20px;font-weight:bold;">
✅ Completed
</span>

@elseif($activation->status == 'Provisioned')

<span style="background:#cfe2ff;color:#084298;padding:6px 14px;border-radius:20px;font-weight:bold;">
🌐 Provisioned
</span>

@else

<span style="background:#fff3cd;color:#856404;padding:6px 14px;border-radius:20px;font-weight:bold;">
🟡 Pending
</span>

@endif

</td>
<td>

@if($activation->status == 'Completed')

<form action="/provisioning/{{ $activation->id }}" method="POST">

@csrf

@method('PUT')

<button class="btn" style="background:#198754;">
🚀 Provision
</button>

</form>

@else

✔ Done

@endif

</td>

</tr>

@endforeach

</table>

@endsection