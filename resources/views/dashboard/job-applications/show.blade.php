@extends('dashboard.layouts.main')

@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="ti ti-file-description me-2"></i>Job Application Details
                </h5>
                <a href="{{ route('dashboard.job-applications.index') }}" class="btn btn-secondary d-flex align-items-center gap-1">
                    <i class="ti ti-arrow-left"></i> Back to List
                </a>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="fw-semibold text-muted mb-3">Application Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td width="150px" class="fw-semibold">Position</td>
                                <td>{{ $jobApplication->jobVacancy->title ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Name</td>
                                <td>{{ $jobApplication->name }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Email</td>
                                <td>{{ $jobApplication->email }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Address</td>
                                <td>{{ $jobApplication->address }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Submitted At</td>
                                <td>{{ $jobApplication->created_at->format('d F Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="fw-semibold text-muted mb-3">CV File</h6>
                        <div class="card border bg-light">
                            <div class="card-body text-center">
                                <i class="ti ti-file-text fs-1 text-primary mb-3 d-block"></i>
                                <p class="mb-3 fw-semibold">{{ basename($jobApplication->cv_file) }}</p>
                                <a href="{{ asset('storage/' . $jobApplication->cv_file) }}" target="_blank" class="btn btn-primary">
                                    <i class="ti ti-download me-1"></i> Download CV
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
