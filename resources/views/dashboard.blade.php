@extends('layouts.app')

@section('content')

<style>

.cards{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-top:20px;
}

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,.08);
    transition:.3s;
    text-align:center;
    border-left:6px solid #0056b3;
}
.blue{
    border-left:6px solid #007bff;
}

.orange{
    border-left:6px solid #ff9800;
}

.purple{
    border-left:6px solid #9c27b0;
}

.green{
    border-left:6px solid #28a745;
}

.teal{
    border-left:6px solid #20c997;
}

.emerald{
    border-left:6px solid #198754;
}

.card:hover{
    transform:translateY(-6px);
    box-shadow:0 12px 25px rgba(0,0,0,.15);
}

.card h3{
    color:#0056b3;
    margin-bottom:15px;
}

.number{
    font-size:42px;
    font-weight:bold;
    color:#0056b3;
}

</style>

<div style="background:linear-gradient(90deg,#0056b3,#0b3c78);
color:white;
padding:25px;
border-radius:15px;
margin-bottom:30px;">

<h2>
👋 Welcome, Angela
</h2>

<p style="margin-top:10px;opacity:.9;">

Monitor customer activations,
technician activities,
network provisioning
and operational reports in one place.

</p>

</div>
<div class="cards">

    <div class="card blue">
<h3>👥 Total Customers</h3>
<div class="number">{{ $totalCustomers }}</div>
    </div>

    <div class="card orange">
<h3>📡 Pending Activations</h3>
<div class="number">{{ $pendingActivations }}</div>
    </div>

    <div class="card purple">
<h3>👷 Total Technicians</h3>
<div class="number">{{ $totalTechnicians }}</div>
    </div>

    <div class="card green">
<h3>🟢 Active Customers</h3>
<div class="number">{{ $activeCustomers }}</div>
    </div>

   <div class="card teal">
    <h3>🌐 Network Status</h3>
    <div class="number">Online</div>
</div>

<div class="card emerald">
    <h3>✅ Completed Activations</h3>
    <div class="number">{{ $completedActivations }}</div>
</div>

</div>
<div style="margin-top:40px; display:flex; gap:30px;">

    <div style="flex:2; background:white; padding:20px; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,.08);">

        <h3>📊 FibreX Statistics</h3>

        <canvas id="fibreChart"></canvas>

    </div>

    <div style="flex:1; background:white; padding:20px; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,.08);">

        <h3>🥧 Activation Status</h3>

        <canvas id="pieChart"></canvas>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('fibreChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Customers',
            'Technicians',
            'Pending',
            'Active',
            'Completed'
        ],

        datasets: [{

            label: 'FibreX Statistics',

            data: [

                {{ $totalCustomers }},
                {{ $totalTechnicians }},
                {{ $pendingActivations }},
                {{ $activeCustomers }},
                {{ $completedActivations }}

            ],

            backgroundColor: [

                '#007bff',
                '#9c27b0',
                '#ffc107',
                '#28a745',
                '#20c997'

            ]

        }]

    }

});

const pie = document.getElementById('pieChart');

new Chart(pie, {

    type: 'pie',

    data: {

        labels: [
            'Pending',
            'Active',
            'Completed'
        ],

        datasets: [{

            data: [

                {{ $pendingActivations }},
                {{ $activeCustomers }},
                {{ $completedActivations }}

            ],

            backgroundColor: [

                '#ffc107',
                '#28a745',
                '#17a2b8'

            ]

        }]

    },

    options: {

        plugins: {

            legend: {

                position: 'bottom'

            }

        }

    }

});

</script>

@endsection