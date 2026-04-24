@extends('layouts.landing')

@section('title', 'Our Services - Atlantic Alam Industri')
@section('meta_description', 'Our Services - Industrial Construction Solutions')

@section('content')

{{-- Page Header --}}
 <section class="page-header padding" style="background-image: url('{{ asset('assets/bg-landing.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Our Services</h4>
            <h2>High Quality Construction Solutions <br>For Residentials & <span>Industries!</span></h2>
            <p>Construction is a general term meaning the art and science to <br>form objects systems organizations.</p>
        </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- Service Section --}}
@php
$services = \App\Models\Service::all()->map(function($service) {
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
        ['image' => 'assets/FotoHeroSection/AAI0008.jpg', 'icon' => 'assets/Icon-Engineering/engineering.png', 'title' => 'Automobile & Manufacturing', 'description' => 'Professional contractor services with commitment to quality.', 'link' => '#'],
        ['image' => 'assets/FotoHeroSection/IMG-20190706-WA0029.jpg', 'icon' => 'assets/Icon-Engineering/worker.png', 'title' => 'Mechanical Engineering', 'description' => 'Quality construction services with professional team.', 'link' => '#'],
        ['image' => 'assets/FotoHeroSection/IMG20201112114341.jpg', 'icon' => 'assets/Icon-Engineering/procurement.png', 'title' => 'Oil Gas & Power Plant', 'description' => 'Industrial construction solutions for various sectors.', 'link' => '#'],
        ['image' => 'assets/FotoHeroSection/AAI0008.jpg', 'icon' => 'assets/Icon-Engineering/worker-1.png', 'title' => 'Steel & Metal Works', 'description' => 'Professional steel and metal construction services.', 'link' => '#'],
        ['image' => 'assets/FotoHeroSection/IMG-20190706-WA0029.jpg', 'icon' => 'assets/Icon-Engineering/hook.png', 'title' => 'Electrical Engineering', 'description' => 'Expert electrical engineering solutions.', 'link' => '#'],
        ['image' => 'assets/FotoHeroSection/IMG20201112114341.jpg', 'icon' => 'assets/Icon-Engineering/hook-1.png', 'title' => 'Chemical Processing', 'description' => 'Chemical processing plant construction.', 'link' => '#']
    ];
}
@endphp
<x-service-section
    subHeading="What We Offer"
    title="Comprehensive Industrial <br>& <span>Construction Services!</span>"
    description="PT. ATLANTIC ALAM INDUSTRI provides comprehensive construction and engineering services."
    :services="$services"
/>

{{-- CTA Section --}}
<section class="cta-section padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay" style="background: rgba(0,0,0,0.7);"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="cta-content text-center">
                    <div class="section-heading text-center">
                        <h4 class="sub-heading">Contact Us</h4>
                        <h2>Trusted By More Than 650,000 <br>Happy<span> Peoples!</span></h2>
                        <p>Construction is a general term meaning the art and science to <br>form objects systems organizations.</p>
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
