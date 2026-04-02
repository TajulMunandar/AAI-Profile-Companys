@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Comment Details</h4>
        <a href="{{ route('dashboard.comments.index') }}" class="btn btn-secondary btn-sm">
            <i class="ti ti-arrow-left"></i> Back
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Name</label>
                <p>{{ $comment->name }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Email</label>
                <p>{{ $comment->email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Article</label>
                <p>{{ $comment->article->title ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Created At</label>
                <p>{{ $comment->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Comment</label>
            <div class="p-3 bg-light rounded">
                {{ $comment->comment }}
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('dashboard.comments.edit', $comment->id) }}" class="btn btn-warning">
                <i class="ti ti-pencil"></i> Edit
            </a>
            <form action="{{ route('dashboard.comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">
                    <i class="ti ti-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
