@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ isset($project) ? 'Edit Project' : 'Create Project' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($project) ? route('dashboard.projects.update', $project->id) : route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($project))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ isset($project) ? $project->title : old('title') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="client_name" class="form-label">Client Name</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" value="{{ isset($project) ? $project->client_name : old('client_name') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ isset($project) ? $project->description : old('description') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="project_type" class="form-label">Project Type</label>
                    <input type="text" class="form-control" id="project_type" name="project_type" value="{{ isset($project) ? $project->project_type : old('project_type') }}" placeholder="e.g., Construction, Building" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ isset($project) ? $project->location : old('location') }}" placeholder="e.g., Jakarta, Indonesia">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="project_director" class="form-label">Project Director <span class="text-muted">(Opsional)</span></label>
                    <input type="text" class="form-control" id="project_director" name="project_director" value="{{ isset($project) ? $project->project_director : old('project_director') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ isset($project) ? $project->date : old('date') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image {{ isset($project) ? '(Kosongkan jika tidak ingin mengubah)' : '' }}</label>
                <input type="file" class="form-control" id="image" name="image" {{ !isset($project) ? 'required' : '' }}>
                @if(isset($project) && $project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Current Image" width="100" class="mt-2">
                @endif
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti {{ isset($project) ? 'ti-pencil' : 'ti-plus' }}"></i>
                    {{ isset($project) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection