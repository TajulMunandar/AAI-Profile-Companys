@extends('layouts.landing')

@section('title', 'Career - Atlantic Alam Industri')
@section('meta_description', 'Join our team at PT. Atlantic Alam Industri. View current job openings and apply online.')

@section('content')

    {{-- Page Header --}}
    <section class="page-header padding"
        style="background-image: url('{{ asset('assets/bg-landing.jpg') }}'); background-size: cover; background-position: center;">
        <div class="overlay"></div>
        <div class="container">
            <div class="section-heading mt-40 text-center">
                <h4 class="sub-heading">Join Our Team</h4>
                <h2>Career Opportunities</h2>
            </div><!-- /.section-heading -->
        </div>
    </section><!-- /.page-header -->

    {{-- Career Section --}}
    <section class="career-section">

        {{-- Ornamen Background (SVG inline) --}}
        <div class="career-bg-ornament">
            <svg width="100%" height="100%" viewBox="0 0 1200 700" preserveAspectRatio="xMidYMid slice"
                xmlns="http://www.w3.org/2000/svg">
                {{-- Lingkaran konsentris kanan atas --}}
                <circle cx="1100" cy="100" r="280" fill="#0a2463" fill-opacity="0.04" />
                <circle cx="1100" cy="100" r="190" fill="none" stroke="#0a2463" stroke-opacity="0.06"
                    stroke-width="1" />
                <circle cx="1100" cy="100" r="100" fill="none" stroke="#0a2463" stroke-opacity="0.08"
                    stroke-width="1" />
                {{-- Lingkaran konsentris kiri bawah (aksen kuning) --}}
                <circle cx="-80" cy="650" r="300" fill="#f5c842" fill-opacity="0.07" />
                <circle cx="-80" cy="650" r="200" fill="none" stroke="#f5c842" stroke-opacity="0.1"
                    stroke-width="1" />
                <circle cx="-80" cy="650" r="100" fill="none" stroke="#f5c842" stroke-opacity="0.12"
                    stroke-width="1" />
                {{-- Grid garis vertikal --}}
                <line x1="120" y1="0" x2="120" y2="700" stroke="#0a2463" stroke-opacity="0.03"
                    stroke-width="1" />
                <line x1="360" y1="0" x2="360" y2="700" stroke="#0a2463" stroke-opacity="0.03"
                    stroke-width="1" />
                <line x1="600" y1="0" x2="600" y2="700" stroke="#0a2463" stroke-opacity="0.03"
                    stroke-width="1" />
                <line x1="840" y1="0" x2="840" y2="700" stroke="#0a2463" stroke-opacity="0.03"
                    stroke-width="1" />
                <line x1="1080" y1="0" x2="1080" y2="700" stroke="#0a2463" stroke-opacity="0.03"
                    stroke-width="1" />
                {{-- Dot grid kiri atas --}}
                <rect x="40" y="40" width="10" height="10" rx="2" fill="#0a2463" fill-opacity="0.07" />
                <rect x="62" y="40" width="10" height="10" rx="2" fill="#0a2463" fill-opacity="0.04" />
                <rect x="40" y="62" width="10" height="10" rx="2" fill="#0a2463" fill-opacity="0.04" />
                <rect x="62" y="62" width="10" height="10" rx="2" fill="#0a2463" fill-opacity="0.07" />
                {{-- Dot grid kanan bawah (kuning) --}}
                <rect x="1100" y="580" width="10" height="10" rx="2" fill="#f5c842"
                    fill-opacity="0.18" />
                <rect x="1122" y="580" width="10" height="10" rx="2" fill="#f5c842"
                    fill-opacity="0.1" />
                <rect x="1100" y="602" width="10" height="10" rx="2" fill="#f5c842"
                    fill-opacity="0.1" />
                <rect x="1122" y="602" width="10" height="10" rx="2" fill="#f5c842"
                    fill-opacity="0.18" />
                {{-- Segitiga dekoratif --}}
                <path d="M1160 300 L1200 270 L1200 330 Z" fill="#0a2463" fill-opacity="0.05" />
                <path d="M0 380 L30 350 L30 410 Z" fill="#f5c842" fill-opacity="0.12" />
            </svg>
        </div>

        <div class="container">

            {{-- Section Header --}}
            <div class="career-header text-center">
                <span class="career-tag">
                    <span class="career-tag-dot"></span> Join Our Team
                </span>
                <h2 class="career-title">Open Positions</h2>
                <p class="career-subtitle">Be part of something bigger — grow your career with PT Atlantic Alam Industri
                </p>
            </div>

            @php
                $openVacancies = $jobVacancies->filter(fn($v) => !$v->is_closed);
            @endphp

            @if ($openVacancies->count() > 0)
                <div class="career-list">
                    @foreach ($openVacancies as $vacancy)
                        <div class="job-card">

                            {{-- Header --}}
                            <div class="job-card-header">
                                <h3 class="job-title">{{ $vacancy->title }}</h3>
                                <div class="job-badges">
                                    <span class="badge-open">&#10003; Open</span>
                                    @if ($vacancy->max_apply)
                                        <span class="badge-count">{{ $vacancy->current_applications_count }} /
                                            {{ $vacancy->max_apply }} applied</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Meta info --}}
                            <div class="job-meta">
                                <span class="meta-tag">
                                    <svg class="meta-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <path d="M8 8.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                        <path d="M13 8c0 4-5 7-5 7S3 12 3 8a5 5 0 0110 0z" />
                                    </svg>
                                    Indonesia
                                </span>
                                <span class="meta-tag">
                                    <svg class="meta-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <rect x="2" y="3" width="12" height="11" rx="1" />
                                        <path d="M5 3V2M11 3V2M2 7h12" />
                                    </svg>
                                    Full-time
                                </span>
                            </div>

                            <div class="job-divider"></div>

                            @if ($vacancy->description)
                                <div class="job-section">
                                    <div class="job-section-label">Description</div>
                                    <div class="job-section-text">{!! nl2br(e($vacancy->description)) !!}</div>
                                </div>
                            @endif

                            @if ($vacancy->requirements)
                                <div class="job-section">
                                    <div class="job-section-label">Requirements</div>
                                    <div class="job-section-text">{!! nl2br(e($vacancy->requirements)) !!}</div>
                                </div>
                            @endif

                            @if ($vacancy->max_apply)
                                <div class="job-progress">
                                    <div class="progress-bar-bg">
                                        <div class="progress-bar-fill"
                                            style="width: {{ min(100, ($vacancy->current_applications_count / $vacancy->max_apply) * 100) }}%">
                                        </div>
                                    </div>
                                    <div class="progress-label">{{ $vacancy->current_applications_count }} of
                                        {{ $vacancy->max_apply }} slots filled</div>
                                </div>
                            @endif

                            <button class="apply-btn" data-id="{{ $vacancy->id }}" data-title="{{ $vacancy->title }}">
                                Apply now
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                    <path d="M2 7h10M8 3l4 4-4 4" />
                                </svg>
                            </button>

                        </div>
                    @endforeach
                </div>
            @else
                <div class="career-empty">
                    <div class="empty-icon-wrap">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" stroke="#0a2463"
                            stroke-width="1.5" stroke-linecap="round">
                            <rect x="4" y="8" width="24" height="20" rx="2" />
                            <path d="M10 8V6a2 2 0 014 0v2M22 8V6a2 2 0 014 0v2M4 16h24" />
                        </svg>
                    </div>
                    <h3 class="empty-title">No openings right now</h3>
                    <p class="empty-sub">We'll be posting new positions soon. Check back later!</p>
                </div>
            @endif

        </div>
    </section>

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
                            <input type="file" class="form-control" id="cv_file" name="cv_file"
                                accept=".pdf,.doc,.docx" required>
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

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                });
            @endif
        </script>
    @endpush

    @push('css')
        <style>
            .career-section {
                position: relative;
                padding: 80px 0;
                background: #f7f9fc;
                overflow: hidden;
            }

            .career-bg-ornament {
                position: absolute;
                inset: 0;
                pointer-events: none;
                z-index: 0;
            }

            .career-section .container {
                position: relative;
                z-index: 1;
            }

            /* Header */
            .career-header {
                margin-bottom: 48px;
            }

            .career-tag {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: #e8eff9;
                color: #0a2463;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: 0.06em;
                padding: 5px 14px;
                border-radius: 20px;
                margin-bottom: 16px;
            }

            .career-tag-dot {
                width: 6px;
                height: 6px;
                background: #0a2463;
                border-radius: 50%;
            }

            .career-title {
                font-size: 32px;
                font-weight: 700;
                color: #0a2463;
                margin-bottom: 10px;
            }

            .career-subtitle {
                font-size: 15px;
                color: #6b7280;
            }

            /* Job card */
            .career-list {
                max-width: 760px;
                margin: 0 auto;
            }

            .job-card {
                background: #fff;
                border: 0.5px solid #d1dbe8;
                border-radius: 14px;
                padding: 28px 28px 24px;
                margin-bottom: 20px;
                position: relative;
                overflow: hidden;
            }

            .job-card::before {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 4px;
                background: #0a2463;
                border-radius: 4px 0 0 4px;
            }

            .job-card-header {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 12px;
                margin-bottom: 14px;
                flex-wrap: wrap;
            }

            .job-title {
                font-size: 17px;
                font-weight: 700;
                color: #0a2463;
                flex: 1;
            }

            .job-badges {
                display: flex;
                align-items: center;
                gap: 8px;
                flex-wrap: wrap;
            }

            .badge-open {
                background: #dcfce7;
                color: #166534;
                font-size: 11px;
                font-weight: 600;
                padding: 4px 11px;
                border-radius: 20px;
            }

            .badge-count {
                background: #e8eff9;
                color: #0a2463;
                font-size: 11px;
                font-weight: 500;
                padding: 4px 11px;
                border-radius: 20px;
            }

            .job-meta {
                display: flex;
                gap: 16px;
                flex-wrap: wrap;
                margin-bottom: 14px;
            }

            .meta-tag {
                display: flex;
                align-items: center;
                gap: 5px;
                font-size: 12px;
                color: #6b7280;
            }

            .meta-icon {
                width: 14px;
                height: 14px;
                flex-shrink: 0;
            }

            .job-divider {
                height: 0.5px;
                background: #e8eff9;
                margin-bottom: 16px;
            }

            .job-section {
                margin-bottom: 14px;
            }

            .job-section-label {
                font-size: 11px;
                font-weight: 700;
                color: #374151;
                text-transform: uppercase;
                letter-spacing: 0.07em;
                margin-bottom: 6px;
            }

            .job-section-text {
                font-size: 13.5px;
                color: #4b5563;
                line-height: 1.7;
            }

            /* Progress */
            .job-progress {
                margin: 16px 0 20px;
            }

            .progress-bar-bg {
                height: 6px;
                background: #e8eff9;
                border-radius: 3px;
                overflow: hidden;
            }

            .progress-bar-fill {
                height: 6px;
                background: #0a2463;
                border-radius: 3px;
                transition: width 0.4s;
            }

            .progress-label {
                font-size: 11px;
                color: #6b7280;
                margin-top: 5px;
                text-align: right;
            }

            /* Apply button */
            .apply-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: #0a2463;
                color: #fff;
                font-size: 13px;
                font-weight: 600;
                padding: 10px 22px;
                border-radius: 8px;
                border: none;
                cursor: pointer;
                transition: background 0.2s;
            }

            .apply-btn:hover {
                background: #142d7a;
            }

            /* Empty state */
            .career-empty {
                text-align: center;
                padding: 64px 24px;
            }

            .empty-icon-wrap {
                width: 72px;
                height: 72px;
                background: #e8eff9;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 20px;
            }

            .empty-title {
                font-size: 20px;
                font-weight: 700;
                color: #0a2463;
                margin-bottom: 8px;
            }

            .empty-sub {
                font-size: 14px;
                color: #6b7280;
            }

            @media (max-width: 576px) {
                .career-title {
                    font-size: 24px;
                }

                .job-card {
                    padding: 20px 18px 18px;
                }
            }
        </style>
    @endpush
@endsection
