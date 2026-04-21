@extends('dashboard.layouts.main')

@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">Job Applications</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="jobApplicationTable" class="table table-striped table-bordered nowrap table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Position</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jobApplications as $key => $application)
                            <tr>
                                <td class="ps-4">{{ $key + 1 }}</td>
                                <td>{{ $application->jobVacancy->title ?? '-' }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $application->name }}</div>
                                </td>
                                <td>{{ $application->email }}</td>
                                <td>{{ $application->created_at->format('d M Y H:i') }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ asset('storage/' . $application->cv_file) }}" target="_blank" class="btn btn-sm btn-icon btn-light-primary" title="Download CV">
                                            <i class="ti ti-download"></i>
                                        </a>
                                        <a href="{{ route('dashboard.job-applications.show', $application->id) }}" class="btn btn-sm btn-icon btn-light-info" title="View">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <form action="{{ route('dashboard.job-applications.destroy', $application->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon btn-light-danger delete-confirm" title="Delete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="ti ti-file-x fs-1 d-block mb-2"></i>
                                        <p class="mb-0">No job applications found</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@push('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#jobApplicationTable').DataTable({
            responsive: true,
            order: [[4, 'desc']],
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    next: "Next",
                    previous: "Previous"
                },
                emptyTable: "No job applications available"
            }
        });
    });

    // Delete confirmation
    document.querySelectorAll('.delete-confirm').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
