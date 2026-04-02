@extends('layouts.landing')

@section('title', 'AAI Profile - Industrial Construction Solutions')
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
    ['icon' => 'dl dl-levels', 'title' => 'Our Mission', 'description' => '<p>In carrying out its business activities, PT. ATLANTIC ALAM INDUSTRI has a goal:</p><ul><li>Ensure a work environment that motivates and supports the efforts of all their employees without accidents and illness caused by work that comes from activities, services, products and facilities management systems that develop HSE performance continuously.</li><li>Work with customers to understand their desires and help implement the best Quality and HSE practices in designing and providing safe construction services and reliable construction services and also ensuring the provision of services that exceed or exceed customer expectations.</li><li>Implement a broad management system that ensures the fulfillment of customer satisfaction, compliance with applicable regulations and other requirements and conducts periodic reviews of quality and HSE performance and its application.</li></ul>'],
    ['icon' => 'dl dl-industrial-robot-8', 'title' => 'Our Vision', 'description' => 'Becoming the Best National Scale Engineering, Procurement and Construction (EPC) Service in the Field of General Contractors.']
];
@endphp
<x-about-section
    title="We're Building Everything Best <br>That You <span>Needed!</span>"
    description="PT. ATLANTIC ALAM INDUSTRI is a construction services company engaged in providing contractor services. Management views that the provision of services in accordance with the wishes of the customer is the main capital to be able to compete in global competition. In the face of fierce business competition in the present and the future and the increasing needs and expectations of customers, there is no other choice for the Organization to be able to survive and develop its business by always improving the quality of services provided to customers and improving safety and health work in an organizational environment."
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
        'image' => $service->image ? 'storage/' . $service->image : 'landing-assets/img/post-4-768x512.jpg',
        'icon' => $service->icon ?? 'dl dl-factory-1',
        'title' => $service->title,
        'description' => Str::limit(strip_tags($service->description), 100),
        'link' => url('/service/' . $service->slug)
    ];
})->toArray();

if (empty($services)) {
    $services = [
        ['image' => 'landing-assets/img/post-4-768x512.jpg', 'icon' => 'dl dl-factory-1', 'title' => 'Automobile & Manufacturing', 'description' => 'We produce positive results from growing Industrial estates, we have established a corporate or mandate,', 'link' => '/service'],
        ['image' => 'landing-assets/img/post-3-768x512.jpg', 'icon' => 'dl dl-industrial-robot-9', 'title' => 'Mechanical Engineering', 'description' => 'We produce positive results from growing Industrial estates, we have established a corporate or mandate,', 'link' => '/service'],
        ['image' => 'landing-assets/img/post-8-768x512.jpg', 'icon' => 'dl dl-industrial-robot-12', 'title' => 'Oil Gas & Power Plant', 'description' => 'We produce positive results from growing Industrial estates, we have established a corporate or mandate,', 'link' => '/service']
    ];
}
@endphp
<x-service-section
    subHeading="Our Service"
    title="High Quality Construction Solutions <br>For Residentials & <span>Industries!</span>"
    description="PT. ATLANTIC ALAM INDUSTRI provides comprehensive construction and engineering services."
    :services="$services"
/>

{{-- Project Section --}}
@php
$projects = \App\Models\Project::latest()->take(5)->get()->map(function($project) {
    return [
        'image' => $project->image ? 'storage/' . $project->image : 'landing-assets/img/project-1-420x520.jpg',
        'lightbox_image' => $project->image ? 'storage/' . $project->image : 'landing-assets/img/project-1-768x600.jpg',
        'category' => $project->project_type ?? 'Construction',
        'title' => $project->title,
        'link' => url('/project/' . $project->slug)
    ];
})->toArray();

if (empty($projects)) {
    $projects = [
        ['image' => 'landing-assets/img/project-1-420x520.jpg', 'lightbox_image' => 'landing-assets/img/project-1-768x600.jpg', 'category' => 'Architecture', 'title' => 'The Burj Khalifa', 'link' => '/project-4-col'],
        ['image' => 'landing-assets/img/project-2-420x520.jpg', 'lightbox_image' => 'landing-assets/img/project-2-768x600.jpg', 'category' => 'Building', 'title' => 'Federation Tower', 'link' => '/project-4-col'],
        ['image' => 'landing-assets/img/project-3-420x520.jpg', 'lightbox_image' => 'landing-assets/img/project-3-768x600.jpg', 'category' => 'Realstate', 'title' => 'The Exchange 106', 'link' => '/project-4-col'],
        ['image' => 'landing-assets/img/project-4-420x520.jpg', 'lightbox_image' => 'landing-assets/img/project-4-768x600.jpg', 'category' => 'Industrial', 'title' => 'World Trade Center', 'link' => '/project-4-col'],
        ['image' => 'landing-assets/img/project-5-420x520.jpg', 'lightbox_image' => 'landing-assets/img/project-5-768x600.jpg', 'category' => 'Realstate', 'title' => 'Vincom Landmark 81', 'link' => '/project-4-col']
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
$articles = \App\Models\Article::latest()->take(3)->get()->map(function($article) {
    return [
        'image' => $article->image ? 'storage/' . $article->image : 'landing-assets/img/post-1-768x512.jpg',
        'category' => $article->kategori->nama ?? 'General',
        'category_link' => '/blog',
        'title' => $article->title,
        'excerpt' => $article->excerpt ?? Str::limit(strip_tags($article->content), 100),
        'link' => url('/blog/' . $article->slug)
    ];
})->toArray();

if (empty($articles)) {
    $articles = [
        ['image' => 'landing-assets/img/post-1-768x512.jpg', 'category' => 'interior', 'category_link' => '/blog-grid', 'title' => 'Industrial Factory Building Equipment 2021', 'excerpt' => 'The new functions coming to construction for equipment mathematics promise make life easier for owners...', 'link' => '/blog-details'],
        ['image' => 'landing-assets/img/post-2-768x512.jpg', 'category' => 'Architecture', 'category_link' => '/blog-grid', 'title' => 'The Evolution Of Construction Services 1995', 'excerpt' => 'The new functions coming to construction for equipment mathematics promise make life easier for owners...', 'link' => '/blog-details'],
        ['image' => 'landing-assets/img/post-3-768x512.jpg', 'category' => 'Constuction', 'category_link' => '/blog-grid', 'title' => 'Manufacturing The Industries Construction INC', 'excerpt' => 'The new functions coming to construction for equipment mathematics promise make life easier for owners...', 'link' => '/blog-details']
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

{{-- Sponsor Section - Fetches from Clients --}}
<x-sponsor-section />

@endsection
