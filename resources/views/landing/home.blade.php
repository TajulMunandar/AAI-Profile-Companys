@extends('layouts.landing')

@section('title', 'Atlantic Alam Industri - Industrial Construction Solutions')
@section('meta_description', 'AAI Profile - Industrial Construction HTML5 Template')

@section('content')

{{-- Hero Slider --}}
@php
$dbSliders = \App\Models\Slider::where('is_active', true)
    ->orderBy('order')
    ->take(3)
    ->get()
    ->map(function($slider) {
        return [
            'image' => $slider->image ? 'storage/' . $slider->image : 'assets/FotoHeroSection/AAI0008.jpg',
            'medium_caption' => $slider->medium_caption,
            'big_caption' => $slider->big_caption,
            'small_caption' => $slider->small_caption,
        ];
    })
    ->toArray();

if (!empty($dbSliders)) {
    $slides = $dbSliders;
} else {
    $slides = [
        [
            'image' => 'assets/FotoHeroSection/AAI0008.jpg',
            'medium_caption' => 'PT. ATLANTIC ALAM INDUSTRI',
            'big_caption' => 'Engineering, Procurement & Construction Company',
            'small_caption' => 'Professional contractor services with commitment to quality and safety.<br>Delivering excellence in every project since establishment.'
        ],
        [
            'image' => 'assets/FotoHeroSection/IMG-20190706-WA0029.jpg',
            'medium_caption' => 'Quality & Safety First',
            'big_caption' => 'Committed To Superior Quality And Results!',
            'small_caption' => 'Ensuring work environment that motivates and supports all employees<br>without accidents and illness caused by work activities.'
        ],
        [
            'image' => 'assets/FotoHeroSection/IMG20201112114341.jpg',
            'medium_caption' => 'Trusted Partner',
            'big_caption' => 'Best National Scale EPC Service Provider',
            'small_caption' => 'Working with customers to understand their desires and help implement<br>the best Quality and HSE practices in construction services.'
        ]
    ];
}
@endphp
<x-hero-slider :slides="$slides" />

{{-- About Section --}}
@php
$aboutLists = [
    ['icon' => 'dl dl-levels', 'title' => 'Our Mission', 'description' => 'Ensure a work environment that motivates and supports all employees without accidents. Work with customers to implement best Quality and HSE practices in construction services.'],
    ['icon' => 'dl dl-industrial-robot-8', 'title' => 'Our Vision', 'description' => 'Becoming the Best National Scale Engineering, Procurement and Construction (EPC) Service in the Field of General Contractors.']
];
@endphp
<x-about-section
    title="We're Building Everything Best <br>That You <span>Needed!</span>"
    description="PT. ATLANTIC ALAM INDUSTRI is a construction services company committed to providing the best contractor services. We prioritize quality and safety in every project."
    :lists="$aboutLists"
    btnText="More about us"
    btnLink="/about"
    image="assets/FotoHeroSection/IMG20201112114341.jpg"
    signImage="landing-assets/img/sign.png"
    expText="25 Years Of <br>Experiences"
/>

{{-- Service Section --}}
@php
$services = \App\Models\Service::take(3)->get()->map(function($service) {
    return [
        'image' => $service->image ? 'storage/' . $service->image : 'assets/FotoHeroSection/AAI0008.jpg',
        'icon' => $service->icon ?? 'assets/Icon-Engineering/engineering.png',
        'title' => $service->title,
        'description' => Str::limit(strip_tags($service->description), 100),
        'link' => url('/service/' . $service->slug)
    ];
})->toArray();

if (empty($services)) {
    $services = [
        ['image' => 'assets/FotoHeroSection/AAI0008.jpg', 'icon' => 'assets/Icon-Engineering/engineering.png', 'title' => 'Automobile & Manufacturing', 'description' => 'Professional contractor services with commitment to quality and safety.', 'link' => '/service'],
        ['image' => 'assets/FotoHeroSection/IMG-20190706-WA0029.jpg', 'icon' => 'assets/Icon-Engineering/worker.png', 'title' => 'Mechanical Engineering', 'description' => 'Quality construction services with professional team.', 'link' => '/service'],
        ['image' => 'assets/FotoHeroSection/IMG20201112114341.jpg', 'icon' => 'assets/Icon-Engineering/procurement.png', 'title' => 'Oil Gas & Power Plant', 'description' => 'Industrial construction solutions for various sectors.', 'link' => '/service']
    ];
}
@endphp
<x-service-section
    subHeading="Our Service"
    title="High Quality Construction Solutions <br>For Residentials & <span>Industries!</span>"
    description="PT. ATLANTIC ALAM INDUSTRI provides comprehensive construction and engineering services."
    :services="$services"
/>

{{-- Vehicle & Heavy Equipment Section --}}
@php
$vehicles = \App\Models\Equipment::where('is_active', true)->orderBy('order')->take(8)->get();
@endphp

<section class="vehicle-section padding" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-heading mb-40 text-center">
            <h4 class="sub-heading">Our Equipment</h4>
            <h2>Vehicle & <span>Heavy Equipment</span></h2>
        </div>
        <div class="vehicle-carousel" style="position: relative;">
            @foreach($vehicles as $vehicle)
            <div class="vehicle-item">
                <div style="text-align: center; padding: 0 10px;">
                    @if($vehicle->image)
                    <img src="{{ asset('storage/' . $vehicle->image) }}" alt="{{ $vehicle->title }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;">
                    @else
                    <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}" alt="{{ $vehicle->title }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;">
                    @endif
                    <h5 style="font-size: 14px; font-weight: 600;">{{ $vehicle->title }}</h5>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('/equipment') }}" class="default-btn">View More <span></span></a>
        </div>
    </div>
</section>

{{-- Project Section --}}
@php
$projects = \App\Models\Project::latest()->take(5)->get()->map(function($project) {
    return [
        'image' => $project->image ? 'storage/' . $project->image : 'assets/FotoHeroSection/AAI0008.jpg',
        'lightbox_image' => $project->image ? 'storage/' . $project->image : 'assets/FotoHeroSection/AAI0008.jpg',
        'category' => $project->project_type ?? 'Construction',
        'title' => Str::limit($project->title, 40),
        'client' => $project->client_name ?? '',
        'location' => $project->location ?? '',
        'date' => $project->date ?? '',
        'link' => url('/project/' . $project->slug)
    ];
})->toArray();

if (empty($projects)) {
    $projects = [
        ['image' => 'assets/FotoHeroSection/AAI0008.jpg', 'lightbox_image' => 'assets/FotoHeroSection/AAI0008.jpg', 'category' => 'Construction', 'title' => 'Industrial Project 1', 'client' => 'PT Maju Jaya', 'location' => 'Jakarta', 'date' => '2024-01-15', 'link' => '/project/industrial-project-1'],
        ['image' => 'assets/FotoHeroSection/IMG-20190706-WA0029.jpg', 'lightbox_image' => 'assets/FotoHeroSection/IMG-20190706-WA0029.jpg', 'category' => 'Building', 'title' => 'Industrial Project 2', 'client' => 'PT Sejahtera', 'location' => 'Surabaya', 'date' => '2024-02-20', 'link' => '/project/industrial-project-2'],
        ['image' => 'assets/FotoHeroSection/IMG20201112114341.jpg', 'lightbox_image' => 'assets/FotoHeroSection/IMG20201112114341.jpg', 'category' => 'Industrial', 'title' => 'Industrial Project 3', 'client' => 'PT Nusantara', 'location' => 'Bandung', 'date' => '2024-03-10', 'link' => '/project/industrial-project-3'],
        ['image' => 'assets/FotoHeroSection/AAI0008.jpg', 'lightbox_image' => 'assets/FotoHeroSection/AAI0008.jpg', 'category' => 'Construction', 'title' => 'Industrial Project 4', 'client' => 'PT Bersama', 'location' => 'Medan', 'date' => '2024-04-05', 'link' => '/project/industrial-project-4'],
        ['image' => 'assets/FotoHeroSection/IMG-20190706-WA0029.jpg', 'lightbox_image' => 'assets/FotoHeroSection/IMG-20190706-WA0029.jpg', 'category' => 'Building', 'title' => 'Industrial Project 5', 'client' => 'PT Keluarga', 'location' => 'Makassar', 'date' => '2024-05-12', 'link' => '/project/industrial-project-5']
    ];
}

$counters = [
    ['count' => \App\Models\Project::count(), 'label' => 'Projects Complete'],
    ['count' => \App\Models\Client::count(), 'label' => 'Happy Customer'],
    ['count' => \App\Models\Service::count(), 'label' => 'Our Services'],
    ['count' => \App\Models\Article::count(), 'label' => 'Articles Published']
];
@endphp
<x-project-section
    subHeading="Our Project"
    title="Transforming The Ideas And <br>Visions For <span>Industries!</span>"
    description="PT. ATLANTIC ALAM INDUSTRI has successfully completed numerous projects across various industries."
    btnText="View all projects"
    btnLink="/project-4-col"
    :projects="$projects"
    showCounter="true"
    counterSubHeading="Some Facts"
    counterTitle="Delivering The Most<br> Innovation <span>Goals!</span>"
    :counters="$counters"
/>

{{-- Blog Section --}}
@php
$articles = \App\Models\Article::latest('published_at')->take(3)->get()->map(function($article) {
    return [
        'image' => $article->image ? 'storage/' . $article->image : 'assets/FotoHeroSection/AAI0008.jpg',
        'category' => $article->kategori->nama ?? 'General',
        'category_link' => '/blog',
        'title' => $article->title,
        'excerpt' => $article->excerpt ?? Str::limit(strip_tags($article->content), 100),
        'link' => url('/blog/' . $article->slug)
    ];
})->toArray();

if (empty($articles)) {
    $articles = [
        ['image' => 'assets/FotoHeroSection/AAI0008.jpg', 'category' => 'Construction', 'category_link' => '/blog-grid', 'title' => 'Industrial Factory Building Equipment 2021', 'excerpt' => 'Latest developments in industrial construction equipment.', 'link' => '/blog-details'],
        ['image' => 'assets/FotoHeroSection/IMG-20190706-WA0029.jpg', 'category' => 'Architecture', 'category_link' => '/blog-grid', 'title' => 'The Evolution Of Construction Services 1995', 'excerpt' => 'Historical overview of construction service development.', 'link' => '/blog-details'],
        ['image' => 'assets/FotoHeroSection/IMG20201112114341.jpg', 'category' => 'Construction', 'category_link' => '/blog-grid', 'title' => 'Manufacturing The Industries Construction INC', 'excerpt' => 'Modern industrial construction techniques and methods.', 'link' => '/blog-details']
    ];
}
@endphp
<x-blog-section
    subHeading="From Blog"
    title="Get The Latest"
    highlight="Updates Daily!"
    description="Stay updated with our latest news, insights, and project updates."
    :posts="$articles"
/>

{{-- Our Certification Section --}}
<section class="padding" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-heading mb-50 text-center">
            <h4 class="sub-heading">Our Certification</h4>
            <h2>Certifications & <span>Achievements</span></h2>
            <p>We are committed to maintaining the highest standards of quality and safety in all our operations.</p>
        </div>
        @php
            $certifications = \App\Models\Certification::orderBy('order', 'asc')->get();
        @endphp
        
        @if($certifications->count() > 0)
        <div class="row justify-content-center">
            @foreach($certifications as $certification)
            <div class="col-lg-3 col-md-4 col-sm-6 padding-15">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        @if($certification->image)
                        <img src="{{ asset('storage/' . $certification->image) }}" 
                             alt="{{ $certification->title }}" 
                             class="img-fluid mb-3 cursor-pointer certification-image" 
                             style="max-height: 120px;"
                             data-src="{{ asset('storage/' . $certification->image) }}"
                             data-title="{{ $certification->title }}">
                        @endif
                        <h5 class="fw-semibold">{{ $certification->title }}</h5>
                        @if($certification->description)
                        <p class="text-muted small mt-2">{{ $certification->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- Certification Modal --}}
<div class="modal fade" id="certificationModal" tabindex="-1" aria-labelledby="certificationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="certificationModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="" id="certificationModalImage" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</div>

@push('js')
<script>
document.querySelectorAll('.certification-image').forEach(image => {
    image.addEventListener('click', function() {
        const modal = new bootstrap.Modal(document.getElementById('certificationModal'));
        document.getElementById('certificationModalLabel').textContent = this.dataset.title;
        document.getElementById('certificationModalImage').src = this.dataset.src;
        modal.show();
    });
    image.style.cursor = 'pointer';
    image.title = 'Click to view full size';
});
</script>
@endpush

{{-- Sponsor Section - Fetches from Clients --}}
<x-sponsor-section />

@endsection
