@extends('layouts.landing')

@section('title', 'Our Projects - Atlantic Alam Industri')
@section('meta_description', 'Our Projects - Industrial Construction Portfolio')

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Our Projects</h4>
            <h2>Transforming The Ideas And <br>Visions For <span>Industries!</span></h2>
            <p>Construction is an integrated process of systematically planning, building, repairing, or dismantling <br>physical structures (such as buildings, roads, bridges, and infrastructure).</p>
        </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- Project Section --}}
<section class="project-section padding bd-bottom">
    <div class="container">
        <div class="row">
            @forelse($projects as $project)
            <div class="col-lg-3 col-md-6 sm-padding">
                <div class="project-item">
                   <div class="project-thumb">
                       @if($project->image)
                       <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                       @else
                       <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}" alt="{{ $project->title }}">
                       @endif
                        <div class="project-view">
                            @if($project->image)
                            <a class="dl-lightbox" href="{{ asset('storage/' . $project->image) }}"><i class="fas fa-plus"></i></a>
                            @else
                            <a class="dl-lightbox" href="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}"><i class="fas fa-plus"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="project-content">
                        <a href="{{ url('/project/' . $project->slug) }}" class="cat">{{ $project->project_type ?? 'Construction' }}</a>
                        <h3><a href="{{ url('/project/' . $project->slug) }}">{{ $project->title }}</a></h3>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="text-muted">
                    <i class="ti ti-folder-x fs-1 d-block mb-2"></i>
                    <p class="mb-0">No projects available yet.</p>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($projects->hasPages())
        <div class="row mt-5">
            <div class="col-12">
                <div class="pg-wrapper">
                    {{-- Info --}}
                    <p class="pg-info">
                        Menampilkan
                        {{ ($projects->currentPage() - 1) * $projects->perPage() + 1 }}–{{ min($projects->currentPage() * $projects->perPage(), $projects->total()) }}
                        dari {{ $projects->total() }} item
                    </p>

                    {{-- Controls --}}
                    <nav class="pg-controls" aria-label="Pagination">
                        {{-- Prev --}}
                        @if ($projects->onFirstPage())
                            <span class="pg-btn disabled" aria-disabled="true">&#8592; <span
                                    class="pg-label">Prev</span></span>
                        @else
                            <a class="pg-btn nav" href="{{ $projects->previousPageUrl() }}" rel="prev">&#8592;
                                <span class="pg-label">Prev</span></a>
                        @endif

                        @php
                            $cur = $projects->currentPage();
                            $last = $projects->lastPage();

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
                                <a class="pg-btn" href="{{ $projects->url($p) }}">{{ $p }}</a>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($projects->hasMorePages())
                            <a class="pg-btn nav" href="{{ $projects->nextPageUrl() }}" rel="next"><span
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
</section><!-- ./ project-section -->

{{-- Sponsor Section - Fetches from Clients --}}
<x-sponsor-section />

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
