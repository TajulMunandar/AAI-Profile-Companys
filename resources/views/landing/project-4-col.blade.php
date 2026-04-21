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
            @php
            $projects = \App\Models\Project::latest()->get();
            @endphp
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
    </div>
</section><!-- ./ project-section -->

{{-- Sponsor Section - Fetches from Clients --}}
<x-sponsor-section />

@endsection
