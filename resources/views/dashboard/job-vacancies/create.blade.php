@extends('dashboard.layouts.main')

@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="ti ti-pencil-plus me-2"></i>Create New Job Vacancy
                </h5>
                <a href="{{ route('dashboard.job-vacancies.index') }}" class="btn btn-secondary d-flex align-items-center gap-1">
                    <i class="ti ti-arrow-left"></i> Back to List
                </a>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('dashboard.job-vacancies.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold">
                                    <i class="ti ti-heading me-1"></i>Job Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg" id="title" name="title"
                                       value="{{ old('title') }}" placeholder="Enter job title..." required>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-semibold">
                                    <i class="ti ti-text-recognition me-1"></i>Description
                                </label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                          placeholder="Enter job description...">{{ old('description') }}</textarea>
                            </div>

                            <!-- Requirements -->
                            <div class="mb-4">
                                <label for="requirements" class="form-label fw-semibold">
                                    <i class="ti ti-list-check me-1"></i>Requirements
                                </label>
                                <textarea class="form-control" id="requirements" name="requirements" rows="5"
                                          placeholder="Enter job requirements...">{{ old('requirements') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <!-- Settings Card -->
                            <div class="card border mb-4">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-semibold"><i class="ti ti-settings me-1"></i>Settings</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label for="is_active" class="form-label fw-semibold">
                                            Status
                                        </label>
                                        <select class="form-select" id="is_active" name="is_active">
                                            <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Open</option>
                                            <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Closed</option>
                                        </select>
                                    </div>

                                    <!-- Order -->
                                    <div class="mb-3">
                                        <label for="order" class="form-label fw-semibold">
                                            <i class="ti ti-sort-numeric-ascending me-1"></i>Display Order
                                        </label>
                                        <input type="number" class="form-control" id="order" name="order"
                                               value="{{ old('order', 0) }}" min="0">
                                        <div class="form-text">Lower number appears first</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                <i class="ti ti-plus me-1"></i>Create Job Vacancy
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
