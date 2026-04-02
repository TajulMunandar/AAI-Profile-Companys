@extends('dashboard.layouts.main')

@section('page-content')
<!-- Row -->
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ isset($comment) ? 'Edit Comment' : 'Create Comment' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($comment) ? route('dashboard.comments.update', $comment->id) : route('dashboard.comments.store') }}" method="POST">
            @csrf
            @if(isset($comment))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="article_id" class="form-label">Article</label>
                    <select class="form-select" id="article_id" name="article_id" required>
                        <option value="">Select Article</option>
                        @foreach($articles as $article)
                            <option value="{{ $article->id }}" {{ isset($comment) && $comment->article_id == $article->id ? 'selected' : '' }}>
                                {{ $article->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($comment) ? $comment->name : old('name') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ isset($comment) ? $comment->email : old('email') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="6" required>{{ isset($comment) ? $comment->comment : old('comment') }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti {{ isset($comment) ? 'ti-pencil' : 'ti-plus' }}"></i>
                    {{ isset($comment) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('dashboard.comments.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
