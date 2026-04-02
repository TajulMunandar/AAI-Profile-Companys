@extends('dashboard.layouts.main')

@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">Articles Management</h5>
                <a href="{{ route('dashboard.articles.create') }}" class="btn btn-primary d-flex align-items-center gap-1">
                    <i class="ti ti-plus"></i> Add Article
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="articleTable" class="table table-striped table-bordered nowrap table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $key => $article)
                            <tr>
                                <td class="ps-4">{{ $key + 1 }}</td>
                                <td>
                                    @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="rounded" width="60" height="40" style="object-fit: cover;">
                                    @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 40px;">
                                        <i class="ti ti-photo text-muted"></i>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $article->title }}</div>
                                    <small class="text-muted">{{ $article->slug }}</small>
                                </td>
                                <td><span class="badge bg-secondary">{{ $article->kategori->nama ?? '-' }}</span></td>
                                <td>
                                    @if($article->tag)
                                        @foreach(explode(',', $article->tag) as $tag)
                                            <span class="badge bg-info me-1 mb-1">{{ trim($tag) }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $article->user->name ?? 'Admin' }}</td>
                                <td>{{ $article->created_at->format('d M Y') }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('dashboard.articles.show', $article->id) }}" class="btn btn-sm btn-icon btn-light-info" title="View">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn btn-sm btn-icon btn-light-warning" title="Edit">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <form action="{{ route('dashboard.articles.destroy', $article->id) }}" method="POST" class="d-inline">
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
                                <td colspan="8" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="ti ti-file-x fs-1 d-block mb-2"></i>
                                        <p class="mb-0">No articles found</p>
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
        $('#articleTable').DataTable({
            responsive: true,
            order: [[6, 'desc']],
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    next: "Next",
                    previous: "Previous"
                },
                emptyTable: "No articles available"
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
