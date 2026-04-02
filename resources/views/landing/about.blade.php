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
           <p>PT. ATLANTIC ALAM INDUSTRI is a construction services company engaged in providing contractor services. Management views that the provision of services in accordance with the wishes of the customer is the main capital to be able to compete in global competition.</p>
       </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

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
    image="landing-assets/img/about-img-03.png"
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
                    <p>PT. ATLANTIC ALAM INDUSTRI has a commitment to
always provide optimal services as a service company,
Procurement and construction as wel as supporting
services provided for its customers and employees.
For this reason, PT. ATLANTIC ALAM INDUSTRI always
meets the requirements and expectations of customers
including the government, community and employees,
so as to meet customer satisfaction optimally.</p>
                    <a href="#" class="default-btn">Read more <span></span></a>
                </div>
            </div>
            <div class="col-md-6 sm-padding">
                <div class="content-thumb">
                    <img src="{{ asset('landing-assets/img/post-1-768x512.jpg') }}" alt="post">
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
