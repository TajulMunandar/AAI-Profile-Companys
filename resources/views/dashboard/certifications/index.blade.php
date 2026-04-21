@extends('dashboard.layouts.main')

@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">Certifications Management</h5>
                <a href="{{ route('dashboard.certifications.create') }}" class="btn btn-primary d-flex align-items-center gap-1">
                    <i class="ti ti-plus"></i> Add Certification
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="certificationTable" class="table table-striped table-bordered nowrap table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Order</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($certifications as $key => $certification)
                            <tr>
                                <td class="ps-4">{{ $key + 1 }}</td>
                                <td>
                                    @if($certification->image)
                                    <img src="{{ asset('storage/' . $certification->image) }}" alt="{{ $certification->title }}" class="rounded" width="60" height="40" style="object-fit: cover;">
                                    @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 40px;">
                                        <i class="ti ti-photo text-muted"></i>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $certification->title }}</div>
                                </td>
                                <td>{{ Str::limit($certification->description, 50) ?? '-' }}</td>
                                <td>{{ $certification->order }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('dashboard.certifications.edit', $certification->id) }}" class="btn btn-sm btn-icon btn-light-warning" title="Edit">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <form action="{{ route('dashboard.certifications.destroy', $certification->id) }}" method="POST" class="d-inline">
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
                                        <p class="mb-0">No certifications found</p>
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
        $('#certificationTable').DataTable({
            responsive: true,
            order: [[4, 'asc']],
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    next: "Next",
                    previous: "Previous"
                },
                emptyTable: "No certifications available"
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
