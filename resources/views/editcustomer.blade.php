<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer - FibreX</title>

    <style>

        body{
            font-family:Arial, Helvetica, sans-serif;
            background:#f4f6f9;
            margin:0;
        }

        .header{
            background:#0056b3;
            color:white;
            padding:20px;
        }

        .container{
            width:70%;
            margin:30px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
        }

        input,select{
            width:100%;
            padding:12px;
            margin-top:8px;
            margin-bottom:20px;
            border:1px solid #ccc;
            border-radius:5px;
            box-sizing:border-box;
        }

        button{
            background:#0056b3;
            color:white;
            border:none;
            padding:15px 25px;
            border-radius:5px;
            cursor:pointer;
        }

    </style>

</head>

<body>

<div class="header">
    <h2>📡 Edit Customer</h2>
</div>

<div class="container">

<form action="/customers/{{ $customer->id }}" method="POST">

    @csrf
    @method('PUT')

    <label>Customer Name</label>
    <input type="text" name="customer_name" value="{{ $customer->customer_name }}">

    <label>Phone Number</label>
    <input type="text" name="phone_number" value="{{ $customer->phone_number }}">

    <label>Email</label>
    <input type="email" name="email" value="{{ $customer->email }}">

    <label>Address</label>
    <input type="text" name="address" value="{{ $customer->address }}">

    <label>Service Plan</label>
    <select name="service_plan">
        <option {{ $customer->service_plan == '20 Mbps' ? 'selected' : '' }}>20 Mbps</option>
        <option {{ $customer->service_plan == '50 Mbps' ? 'selected' : '' }}>50 Mbps</option>
        <option {{ $customer->service_plan == '100 Mbps' ? 'selected' : '' }}>100 Mbps</option>
        <option {{ $customer->service_plan == '200 Mbps' ? 'selected' : '' }}>200 Mbps</option>
    </select>

    <label>Status</label>
    <select name="status">
        <option {{ $customer->status == 'Pending' ? 'selected' : '' }}>Pending</option>
        <option {{ $customer->status == 'Active' ? 'selected' : '' }}>Active</option>
    </select>

    <button type="submit">Update Customer</button>

</form>

</div>

</body>
</html>