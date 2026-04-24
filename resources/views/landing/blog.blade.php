@extends('layouts.landing')

@section('title', 'Blog - Atlantic Alam Industri')
@section('meta_description', 'Blog - Latest News and Updates from AAI')


@section('content')

{{-- Page Header --}}
 <section class="page-header padding" style="background-image: url('{{ asset('assets/bg-landing.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Blog Grid Layout</h4>
            <h2>Get The Latest <span>Updates Daily!</span></h2>
            <p>Stay informed about our latest projects, industry insights, and company news.</p>
        </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- Blog Section --}}
<section class="blog-section padding">
    <div class="container">
        <div class="blog-wrap row">
            <div class="col-lg-8 sm-padding">
                <div class="row">
                    @forelse($articles as $article)
                    <div class="col-sm-6 padding-15">
                        <div class="blog-item">
                            <div class="blog-thumb">
                                @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                                @else
                                <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}" alt="post">
                                @endif
                                <span class="category"><a href="{{ route('blog', ['category' => $article->kategori_id]) }}">{{ $article->kategori->nama ?? 'General' }}</a></span>
                            </div>
                            <div class="blog-content">
                                <div class="row">
                                    <div class="col">
                                        <h3><a href="{{ route('blog.show', $article->slug) }}">{{ $article->title }}</a></h3>
                                    </div>
                                    <div class="col">
                                        <p>
                                            {{ $article->published_at ? $article->published_at->format('F d, Y H:i') : $article->created_at->format('F d, Y H:i') }}
                                        </p>
                                    </div>
                                </div>
                                <p>{{ Str::limit(strip_tags($article->content), 100) }}</p>
                                <a href="{{ route('blog.show', $article->slug) }}" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 padding-15">
                        <div class="text-center">
                            <h3>No articles available yet.</h3>
                            <p>Check back soon for updates and news!</p>
                        </div>
                    </div>
                    @endforelse
                </div><!-- /.row -->

                {{-- Pagination --}}
                @if ($articles->hasPages())
                <div class="mt-30">
                    <div class="pg-wrapper">
                        {{-- Info --}}
                        <p class="pg-info">
                            Menampilkan
                            {{ ($articles->currentPage() - 1) * $articles->perPage() + 1 }}–{{ min($articles->currentPage() * $articles->perPage(), $articles->total()) }}
                            dari {{ $articles->total() }} artikel
                        </p>

                        {{-- Controls --}}
                        <nav class="pg-controls" aria-label="Pagination">
                            {{-- Prev --}}
                            @if ($articles->onFirstPage())
                                <span class="pg-btn disabled" aria-disabled="true">&#8592; <span
                                        class="pg-label">Prev</span></span>
                            @else
                                <a class="pg-btn nav" href="{{ $articles->previousPageUrl() }}" rel="prev">&#8592;
                                    <span class="pg-label">Prev</span></a>
                            @endif

                            @php
                                $cur = $articles->currentPage();
                                $last = $articles->lastPage();

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
                                    <a class="pg-btn" href="{{ $articles->url($p) }}">{{ $p }}</a>
                                @endif
                            @endforeach

                            {{-- Next --}}
                            @if ($articles->hasMorePages())
                                <a class="pg-btn nav" href="{{ $articles->nextPageUrl() }}" rel="next"><span
                                        class="pg-label">Next</span> &#8594;</a>
                            @else
                                <span class="pg-btn disabled" aria-disabled="true"><span class="pg-label">Next</span>
                                    &#8594;</span>
                            @endif
                        </nav>
                    </div>
                </div>
                @endif
            </div><!--/.col-lg-8-->

            <div class="col-lg-4 padding-15">
                <div class="sidebar-wrap">
                    <div class="widget-content">
                        <form action="{{ route('blog') }}" method="GET" class="search-form">
                            <input type="text" name="search" class="form-control" placeholder="Search articles...">
                            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget-content">
                        <h4>Recent Posts</h4>
                        <ul class="thumb-post">
                            @foreach($recentArticles as $recent)
                            <li>
                                @if($recent->image)
                                <img src="{{ asset('storage/' . $recent->image) }}" alt="post">
                                @else
                                <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}" alt="post">
                                @endif
                                <a href="{{ route('blog.show', $recent->slug) }}">{{ $recent->title }}<span>{{ $recent->published_at ? $recent->published_at->format('F d, Y H:i') : $recent->created_at->format('F d, Y H:i') }}</span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- /.widget-content -->
                    <div class="widget-content">
                        <h4>Categories</h4>
                        <ul class="widget-links">
                            <li><a href="{{ route('blog') }}" class="{{ !request('category') ? 'active' : '' }}">All</a></li>
                            @foreach($categories as $category)
                            <li><a href="{{ route('blog', ['category' => $category->id]) }}" class="{{ request('category') == $category->id ? 'active' : '' }}">{{ $category->nama }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- ./widget-content -->
                </div><!-- /.sidebar-wrap -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.blog-wrap -->
    </div>
</section><!-- /.blog-section -->

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
