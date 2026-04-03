@extends('dashboard.layouts.main')

@section('page-content')
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Heavy Equipment</h4>
        <a href="{{ route('dashboard.equipment.create') }}" class="btn btn-primary">
            <i class="ti ti-plus"></i> Add Equipment
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="equipmentTable" class="table table-striped table-bordered nowrap table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipment as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" width="60" height="60" class="rounded">
                            @else
                            <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ Str::limit($item->description, 50) }}</td>
                        <td>{{ $item->order }}</td>
                        <td>
                            @if($item->is_active)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('dashboard.equipment.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <form action="{{ route('dashboard.equipment.destroy', $item->id) }}" method="POST" class="d-inline">
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
        $('#equipmentTable').DataTable({
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