@extends('layouts.landing')

@section('title', 'Contact Us - Atlantic Alam Industri')
@section('meta_description', 'Contact Us - Get in touch with AAI Profile')

@push('css')
<style>
    /* Office Cards Grid */
    .office-cards-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 25px;
    }

    .office-card {
        background: #f8f9fa;
        border-left: 3px solid #fdb900;
        padding: 18px 16px;
        transition: all 0.3s ease;
    }

    .office-card:hover {
        background: #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    .office-card-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
    }

    .office-card-header i {
        color: #fdb900;
        font-size: 16px;
        width: 34px;
        height: 34px;
        line-height: 34px;
        text-align: center;
        background: #333;
        flex-shrink: 0;
    }

    .office-card-header h4 {
        font-size: 14px;
        font-weight: 700;
        margin: 0;
        color: #222;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .office-card-desc {
        font-size: 12.5px;
        color: #666;
        margin: 0;
        line-height: 1.6;
    }

    /* Contact Methods Row */
    .contact-methods {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .contact-method-item {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #333;
        padding: 12px 16px;
        flex: 1;
        min-width: 140px;
        transition: all 0.3s ease;
    }

    .contact-method-item:hover {
        background: #fdb900;
    }

    .contact-method-item:hover .method-label,
    .contact-method-item:hover .method-value {
        color: #222;
    }

    .contact-method-item i {
        color: #fdb900;
        font-size: 16px;
        flex-shrink: 0;
    }

    .contact-method-item:hover i {
        color: #222;
    }

    .method-label {
        display: block;
        font-size: 10px;
        color: #aaa;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 2px;
    }

    .method-value {
        display: block;
        font-size: 14px;
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }

    .method-value:hover {
        color: #fdb900;
        text-decoration: none;
    }

    .contact-method-item:hover .method-value:hover {
        color: #222;
    }

    /* Responsive */
    @media (max-width: 767px) {
        .office-cards-grid {
            grid-template-columns: 1fr;
        }

        .contact-methods {
            flex-direction: column;
        }

        .contact-method-item {
            min-width: 100%;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .office-cards-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>
@endpush

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/bg-landing.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Contact Us</h4>
            <h2>Get In Touch With <br>Our <span>Team!</span></h2>
            <p>Construction is a general term meaning the art and science to <br>form objects systems organizations.</p>
        </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- Contact Section --}}
<section class="contact-section padding bd-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 sm-padding">
                <div class="contact-info">
                    <div class="section-heading mb-30">
                        <h2>Let's Talk About <br>Your <span>Project!</span></h2>
                        <p>We are ready to assist you with your industrial construction needs. Contact us today for a free consultation.</p>
                    </div>

                    {{-- Office Cards Grid --}}
                    <div class="office-cards-grid">
                        <div class="office-card">
                            <div class="office-card-header">
                                <i class="fas fa-building"></i>
                                <h4>Head Office</h4>
                            </div>
                            <p class="office-card-desc">Engineering, Procurement & Construction</p>
                        </div>
                        <div class="office-card">
                            <div class="office-card-header">
                                <i class="fas fa-map-marker-alt"></i>
                                <h4>Jakarta Office</h4>
                            </div>
                            <p class="office-card-desc">Jln. Mampang Prapatan XVIII Blok C No.3, Pancoran, Jakarta Selatan 12760</p>
                        </div>
                        <div class="office-card">
                            <div class="office-card-header">
                                <i class="fas fa-map-marker-alt"></i>
                                <h4>Branch Office</h4>
                            </div>
                            <p class="office-card-desc">Jln. Kenari No: 129A BTN Lama Panggoi, Kec. Muara Dua, Lhokseumawe 24352 - Aceh</p>
                        </div>
                        <div class="office-card">
                            <div class="office-card-header">
                                <i class="fas fa-tools"></i>
                                <h4>WorkShop</h4>
                            </div>
                            <p class="office-card-desc">Jln. Medan - B.Aceh Paloh. No: 102, Kec. Muara Satu, Lhokseumawe</p>
                        </div>
                    </div>

                    {{-- Contact Methods --}}
                    <div class="contact-methods">
                        <div class="contact-method-item">
                            <i class="fas fa-phone-alt"></i>
                            <div>
                                <span class="method-label">Office</span>
                                <a href="tel:+6264541042" class="method-value">+62 645 41042</a>
                            </div>
                        </div>
                        <div class="contact-method-item">
                            <i class="fas fa-phone-alt"></i>
                            <div>
                                <span class="method-label">WorkShop</span>
                                <a href="tel:+626456502123" class="method-value">+62 645 6502123</a>
                            </div>
                        </div>
                        <div class="contact-method-item">
                            <i class="fas fa-phone-alt"></i>
                            <div>
                                <span class="method-label">Jakarta</span>
                                <a href="tel:02127533271" class="method-value">(021) 27533271</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 sm-padding">
                <div class="contact-form">
                    @if(session('success'))
                    <div class="alert alert-success mb-20">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger mb-20">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('contact.submit') }}" method="POST" class="form-field">
                        @csrf
                        <div class="form-group mb-20">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-20">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-20">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-20">
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-20">
                            <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required>{{ old('message') }}</textarea>
                            @error('message')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="default-btn">Send Message <span></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.contact-section -->

{{-- Map Section --}}
<section class="map-section">
    <div class="container-fluid p-0">
        <iframe src="https://maps.google.com/maps?q=Jln.+Kenari+No+129A+BTN+Lama+Panggoi+Kec+Muara+Dua+Lhokseumawe+Aceh&output=embed&z=16" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section><!-- /.map-section -->

{{-- Sponsor Section - Fetches from Clients --}}
<x-sponsor-section />

@endsection
