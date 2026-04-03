@extends('layouts.landing')

@section('title', $article->title . ' - AAI Profile')
@section('meta_description', $article->excerpt ?? Str::limit(strip_tags($article->content), 150))

@section('content')

{{-- Page Header --}}
<section class="page-header padding" style="background-image: url('{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}'); background-size: cover; background-position: center;">
   <div class="overlay"></div>
    <div class="container">
       <div class="section-heading mt-40 text-center">
            <h4 class="sub-heading">Blog Post Details</h4>
            <h2>{{ $article->title }}</h2>
            <p>Published on {{ $article->created_at->format('F d, Y') }} by {{ $article->user->name ?? 'Admin' }}</p>
        </div><!-- /.section-heading -->
    </div>
</section><!-- /.page-header -->

{{-- Blog Section --}}
<section class="blog-section padding">
    <div class="container">
        <div class="blog-wrap row">
            <div class="col-lg-8 padding-15">
                <div class="blog-single-wrap">
                    <div class="blog-thumb">
                        @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                        @else
                        <img src="{{ asset('assets/FotoHeroSection/AAI0008.jpg') }}" alt="{{ $article->title }}">
                        @endif
                    </div>
                    <div class="blog-single-content">
                        <h2><a href="#">{{ $article->title }}</a></h2>
                        <ul class="single-post-meta">
                            <li><i class="fas fa-user"></i> <a href="#">{{ $article->user->name ?? 'Admin' }}</a></li>
                            <li><i class="fas fa-calendar"></i> <a href="#">{{ $article->created_at->format('F d, Y') }}</a></li>
                            <li><i class="fas fa-folder"></i> <a href="#">{{ $article->kategori->name ?? 'General' }}</a></li>
                        </ul>
                        <div class="article-content">
                            {!! $article->content !!}
                        </div>

                        @if($article->tags)
                        <ul class="post-tags">
                            @foreach(explode(',', $article->tags) as $tag)
                            <li><a href="#">{{ trim($tag) }}</a></li>
                            @endforeach
                        </ul><!-- /.post-tags -->
                        @endif

                        <div class="post-navigation row">
                            <div class="col prev-post">
                                @if($prevArticle)
                                <a href="{{ route('blog.show', $prevArticle->slug) }}"><i class="las la-arrow-left"></i> {{ $prevArticle->title }}</a>
                                @endif
                            </div>
                            <div class="col next-post">
                                @if($nextArticle)
                                <a href="{{ route('blog.show', $nextArticle->slug) }}">{{ $nextArticle->title }} <i class="las la-arrow-right"></i></a>
                                @endif
                            </div>
                        </div><!-- /.post-navigation -->

                        {{-- Comments Section --}}
                        <div class="comments-area">
                            <div class="comments-section">
                                <h3 class="comments-title">Comments ({{ $comments->count() }})</h3>
                                <ol class="comments">
                                    @foreach($comments as $comment)
                                    <li class="comment">
                                        <div>
                                            <div class="comment-thumb">
                                                <div class="comment-img">
                                                    <img src="{{ asset('landing-assets/img/comment-1.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="comment-main-area">
                                                <div class="comment-wrapper">
                                                    <div class="comments-meta">
                                                        <h4>{{ $comment->name }} <span class="comments-date">{{ $comment->created_at->format('M d, Y') }}</span></h4>
                                                    </div>
                                                    <div class="comment-area">
                                                        <p>{{ $comment->comment }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">Write a Comment</h3>
                                <form method="post" action="{{ route('comments.store') }}" class="comment-form">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                    <input type="hidden" name="is_public" value="1">
                                    <div class="form-textarea">
                                        <textarea name="comment" placeholder="Write Your Comments..." required></textarea>
                                    </div>
                                    <div class="form-inputs">
                                        <input name="name" placeholder="Name" type="text" required>
                                        <input name="email" placeholder="Email" type="email" required>
                                    </div>
                                    <div class="form-submit">
                                        <input value="Post Comment" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.comments-area -->
                    </div>
                </div><!--/.blog-single-->
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
                            <li><a href="{{ route('blog') }}">All</a></li>
                            @foreach($categories as $category)
                            <li><a href="{{ route('blog', ['category' => $category->id]) }}">{{ $category->nama }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- ./widget-content -->
                </div><!-- /.sidebar-wrap -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.blog-wrap -->
    </div>
</section><!-- /.blog-section -->

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            showConfirmButton: true
        });
    @endif
</script>
@endpush
