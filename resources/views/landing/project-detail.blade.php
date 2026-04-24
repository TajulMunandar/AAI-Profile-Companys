@extends('layouts.landing')

@section('title', $project->title . ' - Atlantic Alam Industri')
@section('meta_description', Str::limit(strip_tags($project->description ?? ''), 150))

@section('content')

    {{-- Page Header --}}
    <section class="page-header padding"
        style="background-image: url('{{ asset('assets/bg-landing.jpg') }}'); background-size: cover; background-position: center;">
        <div class="overlay"></div>
        <div class="container">
            <div class="section-heading mt-40 text-center">
                <h4 class="sub-heading">Our Projects</h4>
                <h2>{{ $project->title }}</h2>
                <p>PT. ATLANTIC ALAM INDUSTRI - Professional Engineering, Procurement & Construction Services</p>
            </div>
        </div>
    </section>

    {{-- Project Detail Section --}}
    <section class="project-detail-section padding">
        <div class="container">
            <div class="row g-4">

                {{-- ===== MAIN CONTENT (col-lg-8) ===== --}}
                <div class="col-lg-8">

                    {{-- Carousel --}}
                    @php
                        $projectImages = array_filter([
                            $project->image ?? null,
                            $project->image_2 ?? null,
                            $project->image_3 ?? null,
                        ]);
                        $projectImages = array_values($projectImages);
                    @endphp

                    @if (count($projectImages) > 0)
                        <div class="aai-carousel-wrapper mb-4">
                            <div id="projectImageSlider" class="carousel slide" data-bs-ride="false">

                                {{-- Slides --}}
                                <div class="carousel-inner">
                                    @foreach ($projectImages as $key => $image)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $image) }}"
                                                class="d-block w-100 aai-carousel-img"
                                                alt="{{ $project->title }} - Photo {{ $key + 1 }}">
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Controls (only if multiple images) --}}
                                @if (count($projectImages) > 1)
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#projectImageSlider" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        {{-- <span class="visually-hidden">Previous</span> --}}
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#projectImageSlider" data-bs-slide="next">
                                        {{-- <span class="visually-hidden">Next</span> --}}
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    </button>

                                    {{-- Thumbnail indicators --}}
                                    {{-- <div class="aai-thumbs mt-2 d-flex gap-2">
                                        @foreach ($projectImages as $key => $image)
                                            <button class="aai-thumb {{ $key === 0 ? 'active' : '' }}"
                                                data-bs-target="#projectImageSlider"
                                                data-bs-slide-to="{{ $key }}"
                                                aria-label="Slide {{ $key + 1 }}">
                                                <img src="{{ asset('storage/' . $image) }}"
                                                    alt="Thumb {{ $key + 1 }}">
                                            </button>
                                        @endforeach
                                    </div> --}}
                                @endif
                            </div>
                        </div>
                    @else
                        <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}"
                            alt="{{ $project->title }}"
                            class="img-fluid rounded mb-4 w-100 aai-carousel-img">
                    @endif

                    {{-- Project Meta Cards --}}
                    <div class="aai-meta-grid mb-4">
                        <div class="aai-meta-item">
                            <span class="aai-meta-icon"><i class="fas fa-building"></i></span>
                            <div>
                                <p class="aai-meta-label">Category</p>
                                <p class="aai-meta-value">{{ $project->project_type ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="aai-meta-item">
                            <span class="aai-meta-icon"><i class="fas fa-user-tie"></i></span>
                            <div>
                                <p class="aai-meta-label">Client</p>
                                <p class="aai-meta-value">{{ $project->client_name ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="aai-meta-item">
                            <span class="aai-meta-icon"><i class="fas fa-map-marker-alt"></i></span>
                            <div>
                                <p class="aai-meta-label">Location</p>
                                <p class="aai-meta-value">{{ $project->location ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="aai-meta-item">
                            <span class="aai-meta-icon"><i class="far fa-calendar-alt"></i></span>
                            <div>
                                <p class="aai-meta-label">Date</p>
                                <p class="aai-meta-value">
                                    {{ $project->date ? \Carbon\Carbon::parse($project->date)->format('F Y') : '-' }}
                                </p>
                            </div>
                        </div>
                        @if ($project->project_director)
                            <div class="aai-meta-item">
                                <span class="aai-meta-icon"><i class="fas fa-hard-hat"></i></span>
                                <div>
                                    <p class="aai-meta-label">Project Director</p>
                                    <p class="aai-meta-value">{{ $project->project_director }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Description --}}
                    <div class="project-content">
                        {!! $project->description !!}
                    </div>

                </div>
                {{-- ===== END MAIN CONTENT ===== --}}

                {{-- ===== SIDEBAR (col-lg-4) ===== --}}
                <div class="col-lg-4">
                    <div class="aai-sidebar">

                        {{-- Other Projects --}}
                        <div class="aai-sidebar-card mb-4">
                            <div class="aai-sidebar-header">
                                <h5>Other Projects</h5>
                            </div>
                            <ul class="aai-project-list">
                                @foreach (\App\Models\Project::where('id', '!=', $project->id)->latest()->take(5)->get() as $otherProject)
                                    <li class="aai-project-item">
                                        <a href="{{ url('/project/' . $otherProject->slug) }}">
                                            <div class="aai-project-thumb">
                                                <img src="{{ $otherProject->image
                                                    ? asset('storage/' . $otherProject->image)
                                                    : asset('assets/FotoHeroSection/AAI0008.jpg') }}"
                                                    alt="{{ $otherProject->title }}">
                                            </div>
                                            <div class="aai-project-info">
                                                <span class="aai-project-title">{{ Str::limit($otherProject->title, 35) }}</span>
                                                @if ($otherProject->project_type)
                                                    <span class="aai-project-type">{{ $otherProject->project_type }}</span>
                                                @endif
                                            </div>
                                            <i class="fas fa-chevron-right aai-project-arrow"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- CTA Card --}}
                        <div class="aai-cta-card">
                            <div class="aai-cta-icon">
                                <i class="fas fa-hard-hat"></i>
                            </div>
                            <h5>Have a Project?</h5>
                            <p>Let's discuss your industrial construction needs and build something great together.</p>
                            <a href="{{ url('/contact') }}" class="aai-cta-btn">
                                Contact Us <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>

                    </div>
                </div>
                {{-- ===== END SIDEBAR ===== --}}

            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="cta-section padding"
        style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
        <div class="overlay" style="background: rgba(0,0,0,0.7);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="cta-content text-center">
                        <div class="section-heading text-center">
                            <h4 class="sub-heading">Contact Us</h4>
                            <h2>Ready to Start Your <span>Project?</span></h2>
                            <p>PT. ATLANTIC ALAM INDUSTRI is ready to assist you with your industrial construction
                                needs.<br>Contact us today for a free consultation.</p>
                        </div>
                        <a href="{{ url('/contact') }}" class="default-btn">Get a free quote <span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Sponsor Section --}}
    @php
        $sponsors = [
            ['image' => 'landing-assets/img/sponsor-1.png'],
            ['image' => 'landing-assets/img/sponsor-2.png'],
            ['image' => 'landing-assets/img/sponsor-3.png'],
            ['image' => 'landing-assets/img/sponsor-4.png'],
            ['image' => 'landing-assets/img/sponsor-5.png'],
            ['image' => 'landing-assets/img/sponsor-6.png'],
            ['image' => 'landing-assets/img/sponsor-3.png'],
        ];
    @endphp
    <x-sponsor-section :sponsors="$sponsors" />

@endsection

@push('css')
<style>
/* ── Carousel ── */
.aai-carousel-wrapper { border-radius: 12px; overflow: hidden; box-shadow: 0 8px 32px rgba(0,0,0,0.12); }
.aai-carousel-img { height: 460px; object-fit: cover; display: block; width: 100%; border-radius: 12px; }
.carousel-control-prev,
.carousel-control-next {
    width: 44px; height: 44px;
    background: rgba(10,36,99,0.85);
    border-radius: 50%;
    top: 50%; transform: translateY(-50%);
    margin: 0 12px;
    opacity: 1;
}
.carousel-control-prev:hover,
.carousel-control-next:hover { background: rgba(10,36,99,1); }
.carousel-control-prev-icon,
.carousel-control-next-icon { width: 16px; height: 16px; }

/* Thumbnail indicators */
.aai-thumbs { overflow-x: auto; padding-bottom: 4px; }
.aai-thumb {
    flex-shrink: 0;
    border: 2px solid transparent;
    border-radius: 8px;
    overflow: hidden;
    padding: 0; background: none; cursor: pointer;
    opacity: 0.55;
    transition: opacity .25s, border-color .25s;
}
.aai-thumb img { width: 80px; height: 54px; object-fit: cover; display: block; }
.aai-thumb.active,
.aai-thumb:hover { opacity: 1; border-color: #0a2463; }

/* ── Meta Grid ── */
.aai-meta-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}
.aai-meta-item {
    display: flex; align-items: flex-start; gap: 12px;
    background: #f8f9fc;
    border: 1px solid #e8ecf4;
    border-radius: 10px;
    padding: 14px 16px;
}
.aai-meta-icon {
    width: 36px; height: 36px; flex-shrink: 0;
    background: #0a2463;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    color: #f5c842;
    font-size: 14px;
}
.aai-meta-label { font-size: 11px; text-transform: uppercase; letter-spacing: .06em; color: #8a94a6; margin: 0 0 2px; }
.aai-meta-value { font-size: 14px; font-weight: 600; color: #1a2340; margin: 0; }

/* ── Project Content ── */
.project-content h1,.project-content h2,.project-content h3,
.project-content h4,.project-content h5,.project-content h6 { margin-top: 1.5rem; margin-bottom: 1rem; color: #1a2340; }
.project-content p { margin-bottom: 1rem; line-height: 1.85; color: #444; }
.project-content ul,.project-content ol { margin-bottom: 1rem; padding-left: 2rem; }
.project-content img { max-width: 100%; height: auto; border-radius: 8px; margin: 1rem 0; }
.project-content blockquote {
    border-left: 4px solid #0a2463;
    padding: 1rem 1.5rem;
    margin: 1.5rem 0;
    background: #f0f4ff;
    border-radius: 0 8px 8px 0;
    color: #1a2340;
    font-style: italic;
}

/* ── Sidebar ── */
.aai-sidebar { position: sticky; top: 100px; }
.aai-sidebar-card {
    border: 1px solid #e8ecf4;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 2px 16px rgba(0,0,0,0.06);
}
.aai-sidebar-header {
    background: linear-gradient(135deg, #0a2463 0%, #1a3a7a 100%);
    padding: 14px 20px;
}
.aai-sidebar-header h5 { color: #fff; margin: 0; font-size: 15px; font-weight: 600; }

/* Other Project List */
.aai-project-list { list-style: none; margin: 0; padding: 0; }
.aai-project-item { border-bottom: 1px solid #f0f2f7; }
.aai-project-item:last-child { border-bottom: none; }
.aai-project-item a {
    display: flex; align-items: center; gap: 12px;
    padding: 12px 16px;
    text-decoration: none;
    transition: background .2s;
}
.aai-project-item a:hover { background: #f5f7ff; }
.aai-project-thumb { flex-shrink: 0; border-radius: 6px; overflow: hidden; }
.aai-project-thumb img { width: 58px; height: 42px; object-fit: cover; display: block; }
.aai-project-info { flex: 1; min-width: 0; }
.aai-project-title { display: block; font-size: 13px; font-weight: 600; color: #1a2340; line-height: 1.4; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.aai-project-type { display: block; font-size: 11px; color: #8a94a6; margin-top: 2px; }
.aai-project-arrow { font-size: 10px; color: #c0c8d8; flex-shrink: 0; transition: transform .2s, color .2s; }
.aai-project-item a:hover .aai-project-arrow { transform: translateX(3px); color: #0a2463; }

/* CTA Card */
.aai-cta-card {
    background: linear-gradient(135deg, #0a2463 0%, #1a3a7a 100%);
    border-radius: 12px;
    padding: 28px 24px;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.aai-cta-card::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse at top right, rgba(245,200,66,0.15) 0%, transparent 60%);
    pointer-events: none;
}
.aai-cta-icon {
    width: 56px; height: 56px;
    background: rgba(245,200,66,0.15);
    border: 1px solid rgba(245,200,66,0.3);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px;
    font-size: 22px;
    color: #f5c842;
}
.aai-cta-card h5 { color: #fff; font-size: 18px; font-weight: 700; margin-bottom: 8px; }
.aai-cta-card p { color: rgba(255,255,255,0.7); font-size: 13px; line-height: 1.6; margin-bottom: 20px; }
.aai-cta-btn {
    display: inline-flex; align-items: center;
    background: #f5c842;
    color: #0a2463;
    font-weight: 700;
    font-size: 14px;
    padding: 10px 24px;
    border-radius: 50px;
    text-decoration: none;
    transition: background .2s, transform .2s;
}
.aai-cta-btn:hover { background: #ffd84d; transform: translateY(-2px); color: #0a2463; }

@media (max-width: 767px) {
    .aai-meta-grid { grid-template-columns: 1fr; }
    .aai-carousel-img { height: 240px; }
    .aai-sidebar { position: static; }
}
</style>
@endpush

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var el = document.getElementById('projectImageSlider');
    if (!el || typeof bootstrap === 'undefined') return;

    // Inisialisasi carousel untuk Bootstrap 5.0.x
    var carousel = new bootstrap.Carousel(el, {
        interval: 5000,
        pause: 'hover',
        wrap: true,
        keyboard: true
    });

    // Fix manual prev button
    el.querySelector('.carousel-control-prev').addEventListener('click', function(e) {
        e.preventDefault();
        carousel.prev();
    });

    // Fix manual next button
    el.querySelector('.carousel-control-next').addEventListener('click', function(e) {
        e.preventDefault();
        carousel.next();
    });

    // Fix manual indicators
    var indicators = el.querySelectorAll('.carousel-indicators button');
    indicators.forEach(function(indicator, index) {
        indicator.addEventListener('click', function(e) {
            e.preventDefault();
            carousel.to(index);
            
            // Update active indicator
            indicators.forEach(function(i) { 
                i.classList.remove('active'); 
                i.removeAttribute('aria-current');
            });
            this.classList.add('active');
            this.setAttribute('aria-current', 'true');
        });
    });

    // Sync indicators on auto slide
    el.addEventListener('slid.bs.carousel', function (e) {
        indicators.forEach(function(i, idx) {
            i.classList.toggle('active', idx === e.to);
            i.toggleAttribute('aria-current', idx === e.to);
        });
    });
});
</script>
@endpush
