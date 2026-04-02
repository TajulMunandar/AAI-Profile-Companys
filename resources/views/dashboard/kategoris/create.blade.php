@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ isset($kategori) ? 'Edit Category' : 'Create Category' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($kategori) ? route('dashboard.kategoris.update', $kategori->id) : route('dashboard.kategoris.store') }}" method="POST">
            @csrf
            @if(isset($kategori))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="nama" class="form-label">Name</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($kategori) ? $kategori->nama : old('nama') }}" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti {{ isset($kategori) ? 'ti-pencil' : 'ti-plus' }}"></i>
                    {{ isset($kategori) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('dashboard.kategoris.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
