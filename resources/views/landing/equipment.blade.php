@extends('layouts.landing')

@section('title', 'Heavy Equipment - Atlantic Alam Industri')
@section('meta_description', 'Heavy Equipment - Industrial Construction Solutions')

@section('content')

    {{-- Page Header --}}
    <section class="page-header padding"
        style="background-image: url('{{ asset('assets/bg-landing.jpg') }}'); background-size: cover; background-position: center;">
        <div class="overlay"></div>
        <div class="container">
            <div class="section-heading mt-40 text-center">
                <h4 class="sub-heading">Our Equipment</h4>
                <h2>Vehicle & <span>Heavy Equipment</span></h2>
                <p>PT AAI has a variety of heavy equipment and heavy vehicles ready to support your project needs.</p>
            </div>
        </div>
    </section>

    {{-- Equipment Section --}}
    <section class="equipment-section padding">
        <div class="container">
            @if ($equipment->count() > 0)
                <div class="row">
                    @foreach ($equipment as $item)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div style="text-align: center; margin-bottom: 30px;">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                                @else
                                    <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}" alt="{{ $item->title }}"
                                        style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
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

            {{-- Pagination --}}
            {{-- Pagination --}}
            @if ($equipment->hasPages())
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="pg-wrapper">

                            {{-- Info --}}
                            <p class="pg-info">
                                Menampilkan
                                {{ ($equipment->currentPage() - 1) * $equipment->perPage() + 1 }}–{{ min($equipment->currentPage() * $equipment->perPage(), $equipment->total()) }}
                                dari {{ $equipment->total() }} item
                            </p>

                            {{-- Controls --}}
                            <nav class="pg-controls" aria-label="Pagination">

                                {{-- Prev --}}
                                @if ($equipment->onFirstPage())
                                    <span class="pg-btn disabled" aria-disabled="true">&#8592; <span
                                            class="pg-label">Prev</span></span>
                                @else
                                    <a class="pg-btn nav" href="{{ $equipment->previousPageUrl() }}" rel="prev">&#8592;
                                        <span class="pg-label">Prev</span></a>
                                @endif

                                @php
                                    $cur = $equipment->currentPage();
                                    $last = $equipment->lastPage();

                                    // Build page list with ellipsis
                                    $pages = [];
                                    $pages[] = 1;
                                    if ($cur > 3) {
                                        $pages[] = '...';
                                    }
                                    for ($p = max(2, $cur - 1); $p <= min($last - 1, $cur + 1); $p++) {
                                        $pages[] = $p;
                                    }
                                    if ($cur < $last - 2) {
                                        $pages[] = '...';
                                    }
                                    if ($last > 1) {
                                        $pages[] = $last;
                                    }
                                @endphp

                                @foreach ($pages as $p)
                                    @if ($p === '...')
                                        <span class="pg-dot">···</span>
                                    @elseif($p == $cur)
                                        <span class="pg-btn active" aria-current="page">{{ $p }}</span>
                                    @else
                                        <a class="pg-btn" href="{{ $equipment->url($p) }}">{{ $p }}</a>
                                    @endif
                                @endforeach

                                {{-- Next --}}
                                @if ($equipment->hasMorePages())
                                    <a class="pg-btn nav" href="{{ $equipment->nextPageUrl() }}" rel="next"><span
                                            class="pg-label">Next</span> &#8594;</a>
                                @else
                                    <span class="pg-btn disabled" aria-disabled="true"><span class="pg-label">Next</span>
                                        &#8594;</span>
                                @endif

                            </nav>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="cta-section padding"
        style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
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

@push('css')
    <style>
        .pg-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 1rem 0;
        }

        .pg-info {
            font-size: 13px;
            color: #6c757d;
            margin: 0;
        }

        .pg-controls {
            display: flex;
            align-items: center;
            gap: 4px;
            flex-wrap: wrap;
        }

        .pg-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            background: #fff;
            color: #333;
            font-size: 13px;
            text-decoration: none;
            transition: background 0.15s, border-color 0.15s;
            cursor: pointer;
        }

        .pg-btn:hover:not(.disabled):not(.active) {
            background: #f5f5f5;
            border-color: #aaa;
            color: #0a2463;
        }

        .pg-btn.active {
            background: #0a2463;
            border-color: #0a2463;
            color: #fff;
            font-weight: 600;
            pointer-events: none;
        }

        .pg-btn.disabled {
            color: #adb5bd;
            border-color: #e9ecef;
            pointer-events: none;
        }

        .pg-dot {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            color: #aaa;
            font-size: 14px;
        }

        @media (max-width: 576px) {
            .pg-wrapper {
                justify-content: center;
            }

            .pg-info {
                width: 100%;
                text-align: center;
            }

            .pg-label {
                display: none;
            }

            .pg-btn {
                min-width: 32px;
                height: 32px;
                padding: 0 8px;
                font-size: 12px;
            }
        }
    </style>
@endpush
