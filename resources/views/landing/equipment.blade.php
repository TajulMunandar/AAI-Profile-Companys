@extends('layouts.landing')

@section('title', 'Heavy Equipment - AAI Profile')
@section('meta_description', 'Heavy Equipment - Industrial Construction Solutions')

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Our Equipment</h4>
            <h2>Vehicle & <span>Heavy Equipment</span></h2>
            <p>PT. ATLANTIC ALAM INDUSTRI has various heavy equipment ready to support your project needs.</p>
        </div>
    </div>
</section>

{{-- Equipment Section --}}
<section class="equipment-section padding">
    <div class="container">
        @if($equipment->count() > 0)
        <div class="row">
            @foreach($equipment as $item)
            <div class="col-lg-3 col-md-4 col-6">
                <div style="text-align: center; margin-bottom: 30px;">
                    @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                    @else
                    <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}" alt="{{ $item->title }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                    @endif
                    <h5 style="font-size: 16px; font-weight: 600; margin-bottom: 5px;">{{ $item->title }}</h5>
                    <p style="font-size: 13px; color: #666;">{{ $item->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center">
            <p>No equipment available.</p>
        </div>
        @endif
    </div>
</section>

{{-- CTA Section --}}
<section class="cta-section padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay" style="background: rgba(0,0,0,0.7);"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="cta-content text-center">
                    <div class="section-heading text-center">
                        <h4 class="sub-heading">Contact Us</h4>
                        <h2>Need Our Heavy Equipment?</h2>
                        <p>Contact us for more information about our heavy equipment and services.</p>
                    </div>
                    <a href="{{ url('/contact') }}" class="default-btn">Get a free quote <span></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection