@extends('dashboard.layouts.main')

@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="ti ti-file-text me-2"></i>Article Details
                </h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn btn-warning d-flex align-items-center gap-1">
                        <i class="ti ti-pencil"></i> Edit
                    </a>
                    <a href="{{ route('dashboard.articles.index') }}" class="btn btn-secondary d-flex align-items-center gap-1">
                        <i class="ti ti-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-lg-8">
                        <!-- Title -->
                        <h2 class="mb-3">{{ $article->title }}</h2>

                        <!-- Meta Info -->
                        <div class="d-flex flex-wrap gap-3 mb-4 text-muted">
                            <span><i class="ti ti-calendar me-1"></i>{{ $article->created_at->format('d F Y') }}</span>
                            <span><i class="ti ti-user me-1"></i>{{ $article->user->name ?? 'Admin' }}</span>
                            <span><i class="ti ti-folder me-1"></i>{{ $article->kategori->nama ?? '-' }}</span>
                        </div>

                        <!-- Excerpt -->
                        @if($article->excerpt)
                        <div class="alert alert-info mb-4">
                            <i class="ti ti-info-circle me-2"></i>{{ $article->excerpt }}
                        </div>
                        @endif

                        <!-- Content -->
                        <div class="article-content mb-4">
                            {!! $article->content !!}
                        </div>

                        <!-- Tags -->
                        @if($article->tag)
                        <div class="mb-4">
                            <h6 class="fw-semibold mb-2">Tags:</h6>
                            @foreach(explode(',', $article->tag) as $tag)
                                <span class="badge bg-info me-1 mb-1">{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-4">
                        <!-- Featured Image -->
                        @if($article->image)
                        <div class="card border mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0 fw-semibold"><i class="ti ti-photo me-1"></i>Featured Image</h6>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded">
                            </div>
                        </div>
                        @endif

                        <!-- Article Info -->
                        <div class="card border mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0 fw-semibold"><i class="ti ti-info-circle me-1"></i>Article Information</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm mb-0">
                                    <tr>
                                        <td class="text-muted fw-semibold">Slug:</td>
                                        <td><code>{{ $article->slug }}</code></td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-semibold">Created:</td>
                                        <td>{{ $article->created_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-semibold">Updated:</td>
                                        <td>{{ $article->updated_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Preview Link -->
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0 fw-semibold"><i class="ti ti-external-link me-1"></i>Preview</h6>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('blog.show', $article->slug) }}" target="_blank" class="btn btn-outline-primary w-100">
                                    <i class="ti ti-eye me-1"></i>View on Website
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .article-content h1, .article-content h2, .article-content h3,
    .article-content h4, .article-content h5, .article-content h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }
    .article-content p {
        margin-bottom: 1rem;
        line-height: 1.8;
    }
    .article-content ul, .article-content ol {
        margin-bottom: 1rem;
        padding-left: 2rem;
    }
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1rem 0;
    }
    .article-content blockquote {
        border-left: 4px solid #0d6efd;
        padding: 1rem 1.5rem;
        margin: 1.5rem 0;
        background-color: #f8f9fa;
        border-radius: 0 0.5rem 0.5rem 0;
    }
    .article-content table {
        width: 100%;
        margin-bottom: 1rem;
    }
    .article-content a {
        color: #0d6efd;
        text-decoration: underline;
    }
</style>
@endpush
