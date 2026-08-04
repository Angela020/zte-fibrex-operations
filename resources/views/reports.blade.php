@extends('layouts.app')

@section('content')

<style>

.cards{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    margin-bottom:30px;
}

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.card h3{
    color:#0056b3;
    margin-bottom:15px;
}

.number{
    font-size:40px;
    font-weight:bold;
    color:#0056b3;
}

</style>

<h2 style="margin-bottom:30px;">
📊 FibreX Reports
</h2>

<div class="cards">

<div class="card">
<h3>👥 Customers</h3>
<div class="number">{{ $totalCustomers }}</div>
</div>

<div class="card">
<h3>👷 Technicians</h3>
<div class="number">{{ $totalTechnicians }}</div>
</div>

<div class="card">
<h3>🟢 Active Customers</h3>
<div class="number">{{ $activeCustomers }}</div>
</div>

<div class="card">
<h3>📡 Pending</h3>
<div class="number">{{ $pendingActivations }}</div>
</div>

<div class="card">
<h3>✅ Completed</h3>
<div class="number">{{ $completedActivations }}</div>
</div>

<div class="card">
<h3>🌐 Provisioned</h3>
<div class="number">{{ $provisionedCustomers }}</div>
</div>

</div>

<div style="background:white;padding:25px;border-radius:15px;box-shadow:0 5px 15px rgba(0,0,0,.08);">

<h3 style="margin-bottom:20px;">
📈 Operations Summary
</h3>

<canvas id="reportChart"></canvas>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const report = document.getElementById('reportChart');

new Chart(report,{

type:'bar',

data:{

labels:[
'Customers',
'Technicians',
'Pending',
'Completed',
'Provisioned',
'Active'
],

datasets:[{

label:'FibreX Report',

data:[

{{ $totalCustomers }},
{{ $totalTechnicians }},
{{ $pendingActivations }},
{{ $completedActivations }},
{{ $provisionedCustomers }},
{{ $activeCustomers }}

],

backgroundColor:[
'#0d6efd',
'#6f42c1',
'#ffc107',
'#198754',
'#20c997',
'#198754'
]

}]

}

});

</script>

@endsection