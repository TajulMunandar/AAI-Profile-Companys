@extends('layouts.landing')

@section('title', 'About Us - AAI Profile')
@section('meta_description', 'About Us - AAI Profile Industrial Construction')

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
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
@php
$aboutLists = [
    ['icon' => 'dl dl-levels', 'title' => 'Our Mission', 'description' => 'Ensure a work environment that motivates and supports all employees without accidents. Work with customers to implement best Quality and HSE practices in construction services.'],
    ['icon' => 'dl dl-industrial-robot-8', 'title' => 'Our Vision', 'description' => 'Becoming the Best National Scale Engineering, Procurement and Construction (EPC) Service in the Field of General Contractors.']
];
@endphp
<x-about-section
    title="We're Building Everything Best <br>That You <span>Needed!</span>"
    description="PT. ATLANTIC ALAM INDUSTRI is committed to delivering quality construction services with safety as our top priority."
    :lists="$aboutLists"
    btnText="More about us"
    btnLink="/about"
    image="assets/FotoHeroSection/IMG20201112114341.jpg"
    signImage="landing-assets/img/sign.png"
    expText="25 Years Of <br>Experiences"
/>

{{-- Content Section --}}
<section class="content-section padding">
   <div class="left-pattern"></div>
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 sm-padding">
                <div class="section-heading">
                    <h2>Construction Services With <br>Architectural <span>Expertise!</span></h2>
                    <p>PT. ATLANTIC ALAM INDUSTRI is committed to delivering quality construction services. We ensure customer satisfaction through professional project management and adherence to safety standards.</p>
                    <a href="#" class="default-btn">Read more <span></span></a>
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
<section class="cta-section padding">
   <div class="overlay"></div>
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
