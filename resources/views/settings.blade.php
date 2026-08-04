@extends('layouts.app')

@section('content')

<style>

.card{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    margin-bottom:20px;
}

.card h3{
    color:#0056b3;
    margin-bottom:15px;
}

label{
    display:block;
    margin-top:10px;
    font-weight:bold;
}

input,select{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:8px;
    margin-top:5px;
}

.btn{
    margin-top:20px;
}

</style>

<h2 style="margin-bottom:25px;">⚙️ System Settings</h2>

<div class="card">

<h3>👤 Administrator</h3>

<label>Name</label>
<input type="text" value="Administrator">

<label>Email</label>
<input type="email" value="admin@mtnfibrex.com">

<button class="btn">Update Profile</button>

</div>

<div class="card">

<h3>🔔 Notifications</h3>

<label>
<input type="checkbox" checked>
 Email Notifications
</label>

<label>
<input type="checkbox" checked>
 SMS Notifications
</label>

<label>
<input type="checkbox">
 Daily Reports
</label>

</div>

<div class="card">

<h3>🌐 System Configuration</h3>

<label>Default Service Plan</label>

<select>
<option>Home Unlimited</option>
<option>Business Premium</option>
<option>Enterprise</option>
</select>

<label>Default Technician Status</label>

<select>
<option>Available</option>
<option>Busy</option>
</select>

<button class="btn">Save Configuration</button>

</div>

<div class="card">

<h3>ℹ️ About System</h3>

<p><strong>System:</strong> FibreX Operations Management System</p>

<p><strong>Version:</strong> 1.0</p>

<p><strong>Developer:</strong> Angela Isaac</p>

<p><strong>University:</strong> University of Ibadan</p>

</div>

@endsection