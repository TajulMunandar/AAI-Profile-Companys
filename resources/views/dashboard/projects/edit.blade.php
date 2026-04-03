@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Project</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="client_name" class="form-label">Client Name</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $project->client_name }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $project->description }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="project_type" class="form-label">Project Type</label>
                    <input type="text" class="form-control" id="project_type" name="project_type" value="{{ $project->project_type }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $project->location }}" placeholder="e.g., Jakarta, Indonesia">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="project_director" class="form-label">Project Director <span class="text-muted">(Opsional)</span></label>
                    <input type="text" class="form-control" id="project_director" name="project_director" value="{{ $project->project_director }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $project->date }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image (Kosongkan jika tidak ingin mengubah)</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Current Image" width="100" class="mt-2">
                @endif
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-pencil"></i> Update
                </button>
                <a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection