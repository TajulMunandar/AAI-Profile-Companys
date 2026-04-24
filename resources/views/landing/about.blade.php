@extends('layouts.landing')

@section('title', 'About Us - Atlantic Alam Industri')
@section('meta_description', 'About Us - Atlantic Alam Industri Profile Industrial Construction')

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/bg-landing.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">About Us</h4>
            <h2>High Quality Construction Solutions <br>For Residentials & <span>Industries!</span></h2>
            <p>PT. ATLANTIC ALAM INDUSTRI is a construction services company committed to quality and customer satisfaction.</p>
        </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- About Section --}}
<section class="about-section padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading mb-40 text-center">
                    <h2>We're Building Everything Best <br>That You <span>Needed!</span></h2>
                    <p>PT. ATLANTIC ALAM INDUSTRI is committed to delivering quality construction services with safety as our top priority.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="vision-mission-card" style="background: #f8f9fa; padding: 30px; border-radius: 10px; height: 100%;">
                    <h3 style="color: #f77f00; margin-bottom: 20px; font-weight: 700;">Our Vision</h3>
                    <p style="font-size: 16px; line-height: 1.8; color: #555;">Becoming the Best National Scale Engineering, Procurement and Construction (EPC) Service in the Field of General Contractors.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="vision-mission-card" style="background: #f8f9fa; padding: 30px; border-radius: 10px; height: 100%;">
                    <h3 style="color: #f77f00; margin-bottom: 20px; font-weight: 700;">Our Mission</h3>
                    <p style="font-size: 15px; line-height: 1.8; color: #555; margin-bottom: 15px;">In carrying out its business activities, PT. ATLANTIC ALAM INDUSTRI has a goal:</p>
                    <ol style="padding-left: 20px; color: #555;">
                        <li style="margin-bottom: 10px;">Ensure a work environment that motivates and supports the efforts of all their employees without accidents and illness caused by work that comes from activities, services, products and facilities management systems that develop HSE performance continuously.</li>
                        <li style="margin-bottom: 10px;">Work with customers to understand their desires and help implement the best Quality and HSE practices in designing and providing safe construction services and reliable construction services and also ensuring the provision of services that exceed or exceed customer expectations.</li>
                        <li>Implement a broad management system that ensures the fulfillment of customer satisfaction, compliance with applicable regulations and other requirements and conducts periodic reviews of quality and HSE performance and its application.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Content Section --}}
<section class="content-section padding">
   <div class="left-pattern"></div>
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 sm-padding">
                <div class="section-heading">
                    <h2>Construction Services With <br>Architectural <span>Expertise!</span></h2>
                    <p>PT. ATLANTIC ALAM INDUSTRI is committed to delivering quality construction services. We ensure customer satisfaction through professional project management and adherence to safety standards.</p>
                    <a href="/company-service" class="default-btn">Read more <span></span></a>
                </div>
            </div>
            <div class="col-md-6 sm-padding">
                <div class="content-thumb">
                    <img src="{{ asset('assets/FotoHeroSection/IMG-20190706-WA0029.jpg') }}" alt="post">
                </div>
            </div>
        </div>
    </div>
</section><!-- ./ content-section-->

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
                        <p>PT. ATLANTIC ALAM INDUSTRI is ready to assist you with your industrial construction needs. Contact us today for a free consultation.</p>
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
