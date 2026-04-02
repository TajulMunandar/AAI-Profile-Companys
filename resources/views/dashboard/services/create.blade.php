@extends('dashboard.layouts.main')

@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="ti ti-pencil-plus me-2"></i>Create New Service
                </h5>
                <a href="{{ route('dashboard.services.index') }}" class="btn btn-secondary d-flex align-items-center gap-1">
                    <i class="ti ti-arrow-left"></i> Back to List
                </a>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data" id="serviceForm">
                    @csrf

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-8">
                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold">
                                    <i class="ti ti-heading me-1"></i>Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg" id="title" name="title"
                                       value="{{ old('title') }}" placeholder="Enter service title..." required>
                                <div class="form-text">The title will be automatically converted to a URL slug.</div>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-semibold">
                                    <i class="ti ti-file-text me-1"></i>Description <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" id="description" name="description" rows="8"
                                          placeholder="Describe the service...">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-4">
                            <!-- Settings Card -->
                            <div class="card border mb-4">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-semibold"><i class="ti ti-settings me-1"></i>Settings</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Icon -->
                                    <div class="mb-3">
                                        <label for="icon" class="form-label fw-semibold">
                                            <i class="ti ti-star me-1"></i>Icon
                                        </label>
                                        <select class="form-select" id="icon" name="icon">
                                            <option value="">-- Select Icon --</option>
                                            <option value="dl dl-factory-1" {{ old('icon') == 'dl dl-factory-1' ? 'selected' : '' }}>🏭 Factory (dl dl-factory-1)</option>
                                            <option value="dl dl-industrial-robot-9" {{ old('icon') == 'dl dl-industrial-robot-9' ? 'selected' : '' }}>🤖 Industrial Robot (dl dl-industrial-robot-9)</option>
                                            <option value="dl dl-industrial-robot-12" {{ old('icon') == 'dl dl-industrial-robot-12' ? 'selected' : '' }}>🦾 Industrial Robot 2 (dl dl-industrial-robot-12)</option>
                                            <option value="dl dl-industrial-robot-8" {{ old('icon') == 'dl dl-industrial-robot-8' ? 'selected' : '' }}>🔧 Industrial Robot 3 (dl dl-industrial-robot-8)</option>
                                            <option value="dl dl-levels" {{ old('icon') == 'dl dl-levels' ? 'selected' : '' }}>📊 Levels (dl dl-levels)</option>
                                            <option value="dl dl-crane" {{ old('icon') == 'dl dl-crane' ? 'selected' : '' }}>🏗️ Crane (dl dl-crane)</option>
                                            <option value="dl dl-helmet" {{ old('icon') == 'dl dl-helmet' ? 'selected' : '' }}>⛑️ Safety Helmet (dl dl-helmet)</option>
                                            <option value="dl dl-tools" {{ old('icon') == 'dl dl-tools' ? 'selected' : '' }}>🔨 Tools (dl dl-tools)</option>
                                            <option value="dl dl-gear" {{ old('icon') == 'dl dl-gear' ? 'selected' : '' }}>⚙️ Gear (dl dl-gear)</option>
                                            <option value="dl dl-energy" {{ old('icon') == 'dl dl-energy' ? 'selected' : '' }}>⚡ Energy (dl dl-energy)</option>
                                        </select>
                                        <div class="form-text">Choose an icon for this service</div>
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
                                        <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded mb-3"
                                             style="max-height: 200px; display: none;">
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
                                    <div id="fileName" class="text-muted small"></div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 btn-lg">
                                <i class="ti ti-plus me-1"></i>Create Service
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
<script>
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
