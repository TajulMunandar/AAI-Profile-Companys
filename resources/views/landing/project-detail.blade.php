@extends('layouts.landing')

@section('title', $project->title . ' - Atlantic Alam Industri')
@section('meta_description', Str::limit(strip_tags($project->description ?? ''), 150))

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Our Projects</h4>
            <h2>{{ $project->title }}</h2>
            <p>PT. ATLANTIC ALAM INDUSTRI - Professional Engineering, Procurement & Construction Services</p>
       </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- Project Detail Section --}}
<section class="project-detail-section padding">
    <div class="container">
        <div class="row">
            <!-- Project Image -->
            <div class="col-lg-8 mb-4">
                @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid rounded mb-4 w-100" style="max-height: 500px; object-fit: cover;">
                @else
                <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}" alt="{{ $project->title }}" class="img-fluid rounded mb-4 w-100" style="max-height: 500px; object-fit: cover;">
                @endif

                <!-- Project Info -->
                <div class="project-info mb-4 p-4 bg-light rounded">
                    <h4 class="mb-3">Project Details</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p><strong><i class="fas fa-building me-2"></i>Category:</strong> {{ $project->project_type ?? '-' }}</p>
                            <p><strong><i class="fas fa-user me-2"></i>Client:</strong> {{ $project->client_name ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p><strong><i class="fas fa-map-marker-alt me-2"></i>Location:</strong> {{ $project->location ?? '-' }}</p>
                            <p><strong><i class="far fa-calendar me-2"></i>Date:</strong> {{ $project->date ? \Carbon\Carbon::parse($project->date)->format('F Y') : '-' }}</p>
                        </div>
                    </div>
                    @if($project->project_director)
                    <p><strong><i class="fas fa-hard-hat me-2"></i>Project Director:</strong> {{ $project->project_director }}</p>
                    @endif
                </div>

                <div class="project-content">
                    {!! $project->description !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Other Projects -->
                <div class="card border mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0 fw-semibold">Other Projects</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach(\App\Models\Project::where('id', '!=', $project->id)->latest()->take(5)->get() as $otherProject)
                            <li class="list-group-item">
                                <a href="{{ url('/project/' . $otherProject->slug) }}" class="text-decoration-none d-flex align-items-center">
                                    @if($otherProject->image)
                                    <img src="{{ asset('storage/' . $otherProject->image) }}" alt="" style="width: 50px; height: 40px; object-fit: cover; border-radius: 4px;" class="me-2">
                                    @else
                                    <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}" alt="" style="width: 50px; height: 40px; object-fit: cover; border-radius: 4px;" class="me-2">
                                    @endif
                                    <span>{{ Str::limit($otherProject->title, 30) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- CTA Card -->
                <div class="card border bg-primary text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">Have a Project?</h5>
                        <p class="card-text">Contact us today for a free consultation.</p>
                        <a href="{{ url('/contact') }}" class="btn btn-light">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.project-detail-section -->

{{-- CTA Section --}}
<section class="cta-section padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay" style="background: rgba(0,0,0,0.7);"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="cta-content text-center">
                    <div class="section-heading text-center">
                        <h4 class="sub-heading">Contact Us</h4>
                        <h2>Ready to Start Your <span>Project?</span></h2>
                        <p>PT. ATLANTIC ALAM INDUSTRI is ready to assist you with your industrial construction needs. <br>Contact us today for a free consultation.</p>
                    </div><!-- /.section-heading -->
                    <a href="{{ url('/contact') }}" class="default-btn">Get a free quote <span></span></a>
                </div>
            </div>
        </div>
    </div>
</section><!-- ./ cta section -->

{{-- Sponsor Section --}}
@php
$sponsors = [
    ['image' => 'landing-assets/img/sponsor-1.png'],
    ['image' => 'landing-assets/img/sponsor-2.png'],
    ['image' => 'landing-assets/img/sponsor-3.png'],
    ['image' => 'landing-assets/img/sponsor-4.png'],
    ['image' => 'landing-assets/img/sponsor-5.png'],
    ['image' => 'landing-assets/img/sponsor-6.png'],
    ['image' => 'landing-assets/img/sponsor-3.png']
];
@endphp
<x-sponsor-section :sponsors="$sponsors" />

@endsection

@push('css')
<style>
    .project-content h1, .project-content h2, .project-content h3,
    .project-content h4, .project-content h5, .project-content h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }
    .project-content p {
        margin-bottom: 1rem;
        line-height: 1.8;
    }
    .project-content ul, .project-content ol {
        margin-bottom: 1rem;
        padding-left: 2rem;
    }
    .project-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1rem 0;
    }
    .project-content blockquote {
        border-left: 4px solid #0d6efd;
        padding: 1rem 1.5rem;
        margin: 1.5rem 0;
        background-color: #f8f9fa;
        border-radius: 0 0.5rem 0.5rem 0;
    }
    .list-group-item a {
        color: #333;
        padding: 0.5rem 0;
        display: block;
        transition: color 0.3s;
    }
    .list-group-item a:hover {
        color: #0d6efd;
    }
    .project-info p {
        margin-bottom: 0.5rem;
    }
</style>
@endpush