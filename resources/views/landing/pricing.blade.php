@extends('layouts.landing')

@section('title', 'Pricing Plans - AAI Profile')
@section('meta_description', 'Pricing Plans - Affordable Industrial Construction Solutions')

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/Foto Hero Section/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Pricing Plans</h4>
            <h2>Affordable Pricing <br><span>For Everyone!</span></h2>
            <p>Construction is a general term meaning the art and science to <br>form objects systems organizations.</p>
        </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- Pricing Section --}}
<section class="pricing-section padding bd-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 sm-padding">
                <div class="pricing-box">
                    <div class="pricing-header">
                        <h3>Basic Plan</h3>
                        <h2><span>$</span>99<span>/month</span></h2>
                    </div>
                    <ul class="pricing-list">
                        <li><i class="fas fa-check"></i> Basic Construction Services</li>
                        <li><i class="fas fa-check"></i> Project Management</li>
                        <li><i class="fas fa-check"></i> Quality Assurance</li>
                        <li><i class="fas fa-check"></i> 24/7 Support</li>
                        <li class="disabled"><i class="fas fa-times"></i> Advanced Analytics</li>
                        <li class="disabled"><i class="fas fa-times"></i> Custom Solutions</li>
                    </ul>
                    <a href="{{ url('/contact') }}" class="default-btn">Get Started <span></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sm-padding">
                <div class="pricing-box active">
                    <div class="pricing-header">
                        <h3>Standard Plan</h3>
                        <h2><span>$</span>199<span>/month</span></h2>
                    </div>
                    <ul class="pricing-list">
                        <li><i class="fas fa-check"></i> All Basic Features</li>
                        <li><i class="fas fa-check"></i> Advanced Project Management</li>
                        <li><i class="fas fa-check"></i> Priority Support</li>
                        <li><i class="fas fa-check"></i> Quality Assurance</li>
                        <li><i class="fas fa-check"></i> Advanced Analytics</li>
                        <li class="disabled"><i class="fas fa-times"></i> Custom Solutions</li>
                    </ul>
                    <a href="{{ url('/contact') }}" class="default-btn">Get Started <span></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sm-padding">
                <div class="pricing-box">
                    <div class="pricing-header">
                        <h3>Premium Plan</h3>
                        <h2><span>$</span>299<span>/month</span></h2>
                    </div>
                    <ul class="pricing-list">
                        <li><i class="fas fa-check"></i> All Standard Features</li>
                        <li><i class="fas fa-check"></i> Custom Solutions</li>
                        <li><i class="fas fa-check"></i> Dedicated Account Manager</li>
                        <li><i class="fas fa-check"></i> Priority Support</li>
                        <li><i class="fas fa-check"></i> Advanced Analytics</li>
                        <li><i class="fas fa-check"></i> Custom Integrations</li>
                    </ul>
                    <a href="{{ url('/contact') }}" class="default-btn">Get Started <span></span></a>
                </div>
            </div>
        </div>
    </div>
</section><!-- ./pricing-section -->

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
