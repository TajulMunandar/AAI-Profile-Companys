@extends('layouts.landing')

@section('title', 'Clients & Partners - Atlantic Alam Industri')
@section('meta_description', 'Clients & Partners - Trusted by Industry Leaders')

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/bg-landing.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Clients & Partners</h4>
            <h2>Trusted By Industry <br><span>Leaders!</span></h2>
            <p>Construction is a general term meaning the art and science to <br>form objects systems organizations.</p>
        </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- Clients Section --}}
<section class="clients-section padding bd-bottom">
    <div class="container">
        <div class="row">
            @for($i = 1; $i <= 12; $i++)
            <div class="col-lg-3 col-md-4 col-sm-6 sm-padding">
                <div class="client-item text-center">
                    <img src="{{ asset('landing-assets/img/sponsor-' . (($i - 1) % 6 + 1) . '.png') }}" alt="client" class="img-fluid">
                </div>
            </div>
            @endfor
        </div>
    </div>
</section><!-- ./clients-section -->

{{-- Testimonial Section --}}
@php
$testimonials = [
    ['image' => 'landing-assets/img/testimonial-1.jpg', 'quote' => 'They should be used to tell a story <br>and let your users know about your <br>product or service', 'name' => 'Fiorella Ibanez', 'position' => 'Merketting Officer', 'rating' => 5],
    ['image' => 'landing-assets/img/testimonial-2.jpg', 'quote' => 'They should be used to tell a story <br>and let your users know about your <br>product or service', 'name' => 'Kyle Fedrick', 'position' => 'Engineering Officer', 'rating' => 5],
    ['image' => 'landing-assets/img/testimonial-3.jpg', 'quote' => 'They should be used to tell a story <br>and let your users know about your <br>product or service', 'name' => 'Jose Carpio', 'position' => 'Field Officer', 'rating' => 5]
];
@endphp
<x-testimonial-section
    subHeading="Tesimonials"
    title="Words From"
    highlight="Clients!"
    description="Construction is a general term meaning the art and science to <br>form objects systems organizations."
    :testimonials="$testimonials"
/>

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
