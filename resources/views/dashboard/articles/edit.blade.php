@extends('dashboard.layouts.main')

@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="ti ti-pencil me-2"></i>Edit Article
                </h5>
                <a href="{{ route('dashboard.articles.index') }}" class="btn btn-secondary d-flex align-items-center gap-1">
                    <i class="ti ti-arrow-left"></i> Back to List
                </a>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('dashboard.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" id="articleForm">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-8">
                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold">
                                    <i class="ti ti-heading me-1"></i>Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg" id="title" name="title"
                                       value="{{ old('title', $article->title) }}" placeholder="Enter article title..." required>
                                <div class="form-text">The title will be automatically converted to a URL slug.</div>
                            </div>

                            <!-- Excerpt -->
                            <div class="mb-4">
                                <label for="excerpt" class="form-label fw-semibold">
                                    <i class="ti ti-text-recognition me-1"></i>Excerpt
                                </label>
                                <textarea class="form-control" id="excerpt" name="excerpt" rows="3"
                                          placeholder="Brief summary of the article ( optional)...">{{ old('excerpt', $article->excerpt) }}</textarea>
                                <div class="form-text">A short summary that will appear in blog listings. If empty, it will be auto-generated from content.</div>
                            </div>

                            <!-- Content -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    <i class="ti ti-file-text me-1"></i>Content <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control d-none" id="content" name="content">{{ old('content', $article->content) }}</textarea>
                                <div id="editor" style="min-height: 400px; background: white;">{!! old('content', $article->content) !!}</div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-4">
                            <!-- Publish Card -->
                            <div class="card border mb-4">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-semibold"><i class="ti ti-send me-1"></i>Publish Settings</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label for="kategori_id" class="form-label fw-semibold">
                                            Category <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" id="kategori_id" name="kategori_id" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}" {{ old('kategori_id', $article->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Tags -->
                                    <div class="mb-3">
                                        <label for="tag" class="form-label fw-semibold">
                                            <i class="ti ti-tags me-1"></i>Tags
                                        </label>
                                        <input type="text" class="form-control" id="tag" name="tag"
                                               value="{{ old('tag', $article->tag) }}" placeholder="news, update, info">
                                        <div class="form-text">Separate tags with commas</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Card -->
                            <div class="card border mb-4">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-semibold"><i class="ti ti-photo me-1"></i>Featured Image</h6>
                                </div>
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        @if($article->image)
                                        <img id="imagePreview" src="{{ asset('storage/' . $article->image) }}" alt="Current Image" class="img-fluid rounded mb-3" style="max-height: 200px;">
                                        @else
                                        <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded mb-3" style="max-height: 200px; display: none;">
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label d-block">
                                            <div class="border border-dashed rounded p-4 cursor-pointer" id="imageDropZone">
                                                <i class="ti ti-cloud-upload fs-1 text-muted d-block mb-2"></i>
                                                <p class="mb-1 text-muted">Click to upload or drag & drop</p>
                                                <small class="text-muted">PNG, JPG, GIF up to 2MB</small>
                                            </div>
                                            <input type="file" class="form-control d-none" id="image" name="image" accept="image/*">
                                        </label>
                                    </div>
                                    <div id="fileName" class="text-muted small">
                                        @if($article->image)
                                        Current: {{ basename($article->image) }}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                <i class="ti ti-pencil me-1"></i>Update Article
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .border-dashed {
        border-style: dashed !important;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .cursor-pointer:hover {
        background-color: #f8f9fa;
    }
</style>
@endpush

@push('js')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    // Initialize Quill Editor
    var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Write your article content here...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video'],
                ['clean']
            ]
        }
    });

    // Sync Quill content with hidden textarea on form submit
    document.getElementById('articleForm').addEventListener('submit', function() {
        document.getElementById('content').value = quill.root.innerHTML;
    });

    // Initialize textarea with existing content if any
    var initialContent = document.getElementById('content').value;
    if (initialContent) {
        quill.root.innerHTML = initialContent;
    }

    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const fileName = document.getElementById('fileName');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
            fileName.textContent = file.name;
        }
    });

    // Click to upload
    document.getElementById('imageDropZone').addEventListener('click', function() {
        document.getElementById('image').click();
    });

    // Drag and drop
    const dropZone = document.getElementById('imageDropZone');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.add('bg-light');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.remove('bg-light');
        });
    });

    dropZone.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        document.getElementById('image').files = files;
        document.getElementById('image').dispatchEvent(new Event('change'));
    });
</script>
@endpush
