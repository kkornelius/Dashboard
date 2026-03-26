@extends('layout')

@section('content')
<div style="margin-bottom: 2rem;">
    <h1>✏️ Edit Client</h1>
    <p style="color: #6b7280; margin-bottom: 0;">Update client information.</p>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('clients.update', $client) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Client Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $client->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address *</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $client->email) }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $client->phone) }}" placeholder="+1 (555) 123-4567">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status *</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="" disabled>Choose a status...</option>
                            <option value="lead" {{ old('status', $client->status) == 'lead' ? 'selected' : '' }}>🎯 Lead</option>
                            <option value="contacted" {{ old('status', $client->status) == 'contacted' ? 'selected' : '' }}>📞 Contacted</option>
                            <option value="client" {{ old('status', $client->status) == 'client' ? 'selected' : '' }}>✓ Client</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="4" placeholder="Add any notes or comments about this client...">{{ old('notes', $client->notes) }}</textarea>
                        @error('notes')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="btn-group" style="gap: 0.5rem;">
                        <button type="submit" class="btn btn-primary">
                            ✓ Update Client
                        </button>
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection