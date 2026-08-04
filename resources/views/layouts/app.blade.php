<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FibreX Management System</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins', sans-serif;
            background:#f4f7fc;
            color:#333;
        }

        .wrapper{
            display:flex;
        }

        .sidebar{
            width:250px;
            min-height:100vh;
            background:linear-gradient(180deg,#0b3c78,#0056b3);
            color:white;
            padding:25px;
            box-shadow:3px 0 15px rgba(0,0,0,.15);
        }

        .sidebar h2{
            margin-bottom:35px;
            text-align:center;
            font-weight:700;
            letter-spacing:1px;
        }

        .sidebar p{
            margin:10px 0;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:12px 15px;
            border-radius:10px;
            transition:.3s;
            font-weight:500;
        }

        .sidebar a:hover{
            background:white;
            color:#0056b3
            transform:translateX(5px);
        }

        .main{
            flex:1;
        }

        .header{
            background:white;
            padding:20px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 2px 15px rgba(0,0,0,.08);
        }

        .header h2{
            color:#0056b3;
            font-size:28px;
            font-weight:700;
        }

        .header strong{
            background:#0056b3;
            color:white;
            padding:10px 18px;
            border-radius:25px;
            font-size:14px;
            font-weight:600;
        }

        .content{
            padding:30px;
        }

        .btn{
            background:#0056b3;
            color:white;
            border:none;
            padding:12px 22px;
            border-radius:8px;
            cursor:pointer;
            font-family:'Poppins',sans-serif;
            font-weight:500;
            transition:.3s;
        }

        .btn:hover{
            background:#004494;
            transform:translateY(-2px);
            box-shadow:0 8px 18px rgba(0,86,179,.25);
        }

    </style>

</head>

<body>

<div class="wrapper">

    <div class="sidebar">

<div style="text-align:center;margin-bottom:35px;">

<h2 style="font-size:28px;">
📡 ZTE
</h2>

<p style="font-size:14px;opacity:.9;">
FibreX Operations
</p>

</div>
        <p><a href="/dashboard">🏠 Dashboard</a></p>

        <p><a href="/customers">👥 Customers</a></p>

        <p><a href="/technicians">👷 Technicians</a></p>

        <p><a href="/activations">📡 Activation Queue</a></p>

        <p><a href="/provisioning">🌐 Provisioning</a></p>

        <p><a href="/reports">📊 Reports</a></p>

        <p><a href="/settings">⚙️ Settings</a></p>

    </div>

    <div class="main">

        <div class="header">

            <div>

<h2>📡 ZTE FibreX Operations</h2>

<p style="font-size:14px;color:#666;margin-top:5px;">
Activation & Provisioning Management System
</p>

</div>

<strong>
👤 Angela Isaac
</strong>
        </div>

        <div class="content">

            @yield('content')

        </div>

    </div>

</div>

<footer style="
text-align:center;
padding:20px;
font-size:13px;
color:#666;
">

© 2026 ZTE FibreX Operations Management System

<br>

Developed by Angela Isaac
• University of Ibadan

</footer>
</body>
</html>