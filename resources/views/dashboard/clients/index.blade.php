@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Clients</h4>
        <a href="{{ route('dashboard.clients.create') }}" class="btn btn-primary">
            <i class="ti ti-plus"></i> Add Client
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="clientTable" class="table table-striped table-bordered nowrap table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $key => $client)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($client->photo)
                            <img src="{{ asset('storage/' . $client->photo) }}" alt="{{ $client->name }}" width="60" height="60" class="rounded">
                            @else
                            <span class="badge bg-secondary">No Photo</span>
                            @endif
                        </td>
                        <td>{{ $client->name }}</td>
                        <td>
                            <a href="{{ $client->link }}" target="_blank" class="btn btn-sm btn-info">
                                <i class="ti ti-external-link"></i> Visit
                            </a>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('dashboard.clients.edit', $client->id) }}" class="btn btn-sm btn-warning">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <form action="{{ route('dashboard.clients.destroy', $client->id) }}" method="POST" class="d-inline">
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
        $('#clientTable').DataTable({
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
