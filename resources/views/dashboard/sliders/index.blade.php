@extends('dashboard.layouts.main')

@section('page-content')
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Sliders</h4>
        <a href="{{ route('dashboard.sliders.create') }}" class="btn btn-primary">
            <i class="ti ti-plus"></i> Add Slider
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="sliderTable" class="table table-striped table-bordered nowrap table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Medium Caption</th>
                        <th>Big Caption</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $key => $slider)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($slider->image)
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider" width="80" height="50" class="rounded object-cover">
                            @else
                            <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>{{ $slider->medium_caption ?? '-' }}</td>
                        <td>{{ $slider->big_caption ?? '-' }}</td>
                        <td>{{ $slider->order }}</td>
                        <td>
                            @if($slider->is_active)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('dashboard.sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <form action="{{ route('dashboard.sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete">
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
        $('#sliderTable').DataTable({
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
