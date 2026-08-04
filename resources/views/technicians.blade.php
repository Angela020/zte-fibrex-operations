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

.available{
    background:#d4edda;
    color:#155724;
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
.btn{
    background:#0056b3;
    color:white;
    border:none;
    padding:10px 15px;
    border-radius:5px;
    cursor:pointer;
}

.delete-btn{
    background:#dc3545;
    color:white;
    border:none;
    padding:10px 15px;
    border-radius:5px;
    cursor:pointer;
}

.delete-btn:hover{
    background:#bb2d3b;
}
</style>

@if(session('success'))
<div class="success">
    {{ session('success') }}
</div>
@endif

<div class="top">

    <h2>👷 Technicians</h2>

    <div style="display:flex; gap:10px; align-items:center;">

        <form method="GET" action="/technicians">

            <input
                type="text"
                name="search"
                placeholder="🔍 Search technician..."
                value="{{ request('search') }}"
                style="padding:10px; width:250px; border:1px solid #ccc; border-radius:8px;">

            <button class="btn">Search</button>

        </form>

        <a href="/addtechnician">
            <button class="btn">+ Add Technician</button>
        </a>

    </div>

</div>

<table>

<tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Department</th>
    <th>Status</th>
    <th>Action</th>
</tr>

@foreach($technicians as $technician)

<tr>

    <td>{{ $technician->id }}</td>
    <td>{{ $technician->full_name }}</td>
    <td>{{ $technician->phone_number }}</td>
    <td>{{ $technician->email }}</td>
    <td>{{ $technician->department }}</td>
    <td class="available">{{ $technician->status }}</td>

<td style="white-space: nowrap;">

    <a href="/technicians/{{ $technician->id }}/edit">
        <button class="btn" style="padding:6px 12px; margin-right:5px;">
            ✏️ Edit
        </button>
    </a>

    <form action="/technicians/{{ $technician->id }}" method="POST" style="display:inline;">

        @csrf
        @method('DELETE')

        <button
            class="delete-btn"
            style="padding:6px 12px;"
            onclick="return confirm('Delete this technician?')">
            🗑 Delete
        </button>

    </form>

</td>

</tr>

@endforeach

</table>

@endsection