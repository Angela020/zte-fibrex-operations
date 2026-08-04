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

.active{
    background:#d4edda;
    color:#155724;
    padding:6px 14px;
    border-radius:20px;
    font-size:13px;
    font-weight:bold;
}

.pending{
    background:#fff3cd;
    color:#856404;
    padding:6px 14px;
    border-radius:20px;
    font-size:13px;
    font-weight:bold;
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

    <h2>Customer List</h2>

    <a href="/addcustomer">
        <button class="btn">+ Add Customer</button>
    </a>

</div>

<form method="GET" action="/customers" style="margin-bottom:20px; display:flex; gap:10px;">

    <input
        type="text"
        name="search"
        placeholder="🔍 Search customer..."
        value="{{ request('search') }}"
        style="padding:10px; width:300px; border:1px solid #ccc; border-radius:8px;">

    <button class="btn">Search</button>

</form>

<table>

    <tr>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Service Plan</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($customers as $customer)

    <tr>
<td>ZTE{{ str_pad($customer->id, 4, '0', STR_PAD_LEFT) }}</td>
        <td>{{ $customer->customer_name }}</td>
        <td>{{ $customer->phone_number }}</td>
        <td>{{ $customer->address }}</td>
        <td>{{ $customer->service_plan }}</td>

        <td>
            @if($customer->status == 'Active')
                <span class="active">Active</span>
            @else
                <span class="pending">Pending</span>
            @endif
        </td>

      <td style="white-space: nowrap;">

    <a href="/customers/{{ $customer->id }}/edit">
        <button class="btn" style="padding:8px 15px;">
            ✏️ Edit
        </button>
    </a>

    <form action="/customers/{{ $customer->id }}" method="POST" style="display:inline;">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn"
            style="background:#dc3545; padding:8px 15px;"
            onclick="return confirm('Are you sure you want to delete this customer?')">
            🗑 Delete
        </button>

    </form>

</td>

    </tr>

    @endforeach

</table>
<div style="margin-top:20px;">
    {{ $customers->links() }}
</div>

@endsection