@extends('layout')

@section('content')
<div style="margin-bottom: 2rem;">
    <h1>👥 Client Management</h1>
    <p style="color: #6b7280; margin-bottom: 0;">Manage and track all your clients and leads.</p>
</div>

<div class="row mb-4">
    <div class="col-md-8">
        <a href="{{ route('clients.create') }}" class="btn btn-success btn-lg">
            ➕ Add New Client
        </a>
    </div>
    <div class="col-md-4">
        <form method="GET" class="d-flex gap-2">
            <select name="status" class="form-select" style="width: auto;">
                <option value="">All Status</option>
                <option value="lead" {{ request('status') == 'lead' ? 'selected' : '' }}>Lead</option>
                <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                <option value="client" {{ request('status') == 'client' ? 'selected' : '' }}>Client</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
            <tr>
                <td>
                    <strong>{{ $client->name }}</strong>
                </td>
                <td>
                    <a href="mailto:{{ $client->email }}" style="text-decoration: none; color: #667eea;">
                        {{ $client->email }}
                    </a>
                </td>
                <td>{{ $client->phone ?? '-' }}</td>
                <td>
                    <span class="badge bg-{{ $client->status == 'lead' ? 'warning' : ($client->status == 'contacted' ? 'info' : 'success') }}">
                        {{ ucfirst($client->status) }}
                    </span>
                </td>
                <td style="max-width: 200px;">
                    <span title="{{ $client->notes }}">{{ Str::limit($client->notes, 40) }}</span>
                </td>
                <td>
                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">
                        ✏️ Edit
                    </a>
                    <form method="POST" action="{{ route('clients.destroy', $client) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">
                            🗑️ Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 2rem;">
                    <p style="color: #6b7280;">No clients found. <a href="{{ route('clients.create') }}">Create one</a></p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 2rem;">
    {{ $clients->appends(request()->query())->links() }}
</div>
@endsection