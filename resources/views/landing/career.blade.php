@extends('layouts.landing')

@section('title', 'Career - Atlantic Alam Industri')
@section('meta_description', 'Join our team at PT. Atlantic Alam Industri. View current job openings and apply online.')

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Join Our Team</h4>
            <h2>Career Opportunities</h2>
        </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- Career Section --}}
<section class="blog-section padding">
    <div class="container">
        @php
            $activeVacancies = $jobVacancies->where('is_active', true);
        @endphp

        @if($activeVacancies->count() > 0)
            <div class="row">
                @foreach($activeVacancies as $vacancy)
                <div class="col-lg-8 mx-auto padding-15">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h3 class="fw-semibold mb-0">{{ $vacancy->title }}</h3>
                                <span class="badge bg-success">Open</span>
                            </div>

                            @if($vacancy->description)
                            <div class="mb-3">
                                <h6 class="fw-semibold mb-2">Description</h6>
                                {!! nl2br(e($vacancy->description)) !!}
                            </div>
                            @endif

                            @if($vacancy->requirements)
                            <div class="mb-4">
                                <h6 class="fw-semibold mb-2">Requirements</h6>
                                {!! nl2br(e($vacancy->requirements)) !!}
                            </div>
                            @endif

                            <button class="btn btn-primary apply-btn" data-id="{{ $vacancy->id }}" data-title="{{ $vacancy->title }}">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="ti ti-briefcase fs-1 text-muted d-block mb-3"></i>
                <h3>There are no job openings yet</h3>
                <p class="text-muted">Please come back next time.</p>
            </div>
        @endif
    </div>
</section><!-- /.blog-section -->

{{-- Apply Modal --}}
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applyModalLabel">Apply for Position</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data" id="applyForm">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <h6 id="modalJobTitle" class="fw-semibold text-primary"></h6>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="cv_file" class="form-label">Upload CV <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="cv_file" name="cv_file" accept=".pdf,.doc,.docx" required>
                <div class="form-text">Allowed formats: PDF, DOC, DOCX (Max 2MB)</div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.apply-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;
        const title = this.dataset.title;
        
        document.getElementById('modalJobTitle').textContent = title;
        document.getElementById('applyForm').action = `/career/${id}/apply`;
        
        const modal = new bootstrap.Modal(document.getElementById('applyModal'));
        modal.show();
    });
});

@if(session('success'))
Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: '{{ session('success') }}',
    timer: 3000,
    showConfirmButton: false
});
@endif

@if(session('error'))
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '{{ session('error') }}',
});
@endif
</script>
@endpush

@endsection
