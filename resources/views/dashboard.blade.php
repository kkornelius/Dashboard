@extends('layout')

@section('content')
<div style="margin-bottom: 2rem;">
    <h1>📊 Dashboard</h1>
    <p style="color: #6b7280; margin-bottom: 0;">Welcome back! Here's an overview of your business.</p>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 3rem; margin-bottom: 3rem;">
    <div class="card text-white bg-primary">
        <div class="card-body">
            <h5 class="card-title">Total Clients</h5>
            <h2>{{ $stats['total_clients'] }}</h2>
            <p style="font-size: 0.875rem; opacity: 0.9; margin: 0;">All clients</p>
        </div>
    </div>
    <div class="card text-white bg-warning">
        <div class="card-body">
            <h5 class="card-title">🎯 Leads</h5>
            <h2>{{ $stats['leads'] }}</h2>
            <p style="font-size: 0.875rem; opacity: 0.9; margin: 0;">Potential clients</p>
        </div>
    </div>
    <div class="card text-white bg-info">
        <div class="card-body">
            <h5 class="card-title">📞 Contacted</h5>
            <h2>{{ $stats['contacted'] }}</h2>
            <p style="font-size: 0.875rem; opacity: 0.9; margin: 0;">Reached out</p>
        </div>
    </div>
    <div class="card text-white bg-success">
        <div class="card-body">
            <h5 class="card-title">✓ Clients</h5>
            <h2>{{ $stats['clients'] }}</h2>
            <p style="font-size: 0.875rem; opacity: 0.9; margin: 0;">Active clients</p>
        </div>
    </div>
</div>

<div class="mt-5">
    <a href="{{ route('clients.index') }}" class="btn btn-primary btn-lg">
        👥 Manage Clients
    </a>
</div>
@endsection