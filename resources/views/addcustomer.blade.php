<!DOCTYPE html>
<html>
<head>
    <title>Add Customer - FibreX</title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
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

        input, select{
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

        button:hover{
            background:#004494;
        }

    </style>

</head>

<body>

<div class="header">
    <h2>📡 Add New Customer</h2>
</div>

<div class="container">

<form action="/customers" method="POST">

    @csrf

    <label>Customer Name</label>
    <input type="text" name="customer_name" required>

    <label>Phone Number</label>
    <input type="text" name="phone_number" required>

    <label>Email</label>
    <input type="email" name="email">

    <label>Address</label>
    <input type="text" name="address" required>

    <label>Service Plan</label>

    <select name="service_plan">
        <option value="20 Mbps">20 Mbps</option>
        <option value="50 Mbps">50 Mbps</option>
        <option value="100 Mbps">100 Mbps</option>
        <option value="200 Mbps">200 Mbps</option>
    </select>

    <button type="submit">
        Register Customer
    </button>

</form>

</div>

</body>
</html>