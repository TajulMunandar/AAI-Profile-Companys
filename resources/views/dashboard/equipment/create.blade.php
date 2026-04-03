@extends('dashboard.layouts.main')

@section('page-content')
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ isset($equipment) ? 'Edit Equipment' : 'Create Equipment' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($equipment) ? route('dashboard.equipment.update', $equipment->id) : route('dashboard.equipment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($equipment))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ isset($equipment) ? $equipment->title : old('title') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="order" class="form-label">Order</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ isset($equipment) ? $equipment->order : old('order', 0) }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ isset($equipment) ? $equipment->description : old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image {{ isset($equipment) ? '(Kosongkan jika tidak ingin mengubah)' : '' }}</label>
                <input type="file" class="form-control" id="image" name="image" {{ !isset($equipment) ? '' : '' }}>
                @if(isset($equipment) && $equipment->image)
                    <img src="{{ asset('storage/' . $equipment->image) }}" alt="Current Image" width="100" class="mt-2">
                @endif
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ isset($equipment) && $equipment->is_active ? 'checked' : (old('is_active') ? 'checked' : '') }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti {{ isset($equipment) ? 'ti-pencil' : 'ti-plus' }}"></i>
                    {{ isset($equipment) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('dashboard.equipment.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection