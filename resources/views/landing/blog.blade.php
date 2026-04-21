@extends('layouts.landing')

@section('title', 'Blog - Atlantic Alam Industri')
@section('meta_description', 'Blog - Latest News and Updates from AAI')

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
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
                                <h3><a href="{{ route('blog.show', $article->slug) }}">{{ $article->title }}</a></h3>
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
                <div class="mt-30">
                    {{ $articles->links() }}
                </div>
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
                                <a href="{{ route('blog.show', $recent->slug) }}">{{ $recent->title }}<span>{{ $recent->created_at->format('F d, Y') }}</span></a>
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
