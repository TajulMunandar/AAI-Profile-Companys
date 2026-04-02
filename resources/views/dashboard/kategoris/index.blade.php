@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Categories</h4>
        <a href="{{ route('dashboard.kategoris.create') }}" class="btn btn-primary">
            <i class="ti ti-plus"></i> Add Category
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kategoriTable" class="table table-striped table-bordered nowrap table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $key => $kategori)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->slug }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('dashboard.kategoris.edit', $kategori->id) }}" class="btn btn-sm btn-warning">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <form action="{{ route('dashboard.kategoris.destroy', $kategori->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush

@push('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kategoriTable').DataTable({
            responsive: true,
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });
</script>
@endpush
