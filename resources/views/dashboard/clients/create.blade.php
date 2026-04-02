@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ isset($client) ? 'Edit Client' : 'Create Client' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($client) ? route('dashboard.clients.update', $client->id) : route('dashboard.clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($client))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($client) ? $client->name : old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="url" class="form-control" id="link" name="link" value="{{ isset($client) ? $client->link : old('link') }}" placeholder="https://example.com" required>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo {{ isset($client) ? '(Kosongkan jika tidak ingin mengubah)' : '' }}</label>
                <input type="file" class="form-control" id="photo" name="photo" {{ !isset($client) ? 'required' : '' }}>
                @if(isset($client) && $client->photo)
                    <img src="{{ asset('storage/' . $client->photo) }}" alt="Current Photo" width="100" class="mt-2">
                @endif
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti {{ isset($client) ? 'ti-pencil' : 'ti-plus' }}"></i>
                    {{ isset($client) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('dashboard.clients.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
