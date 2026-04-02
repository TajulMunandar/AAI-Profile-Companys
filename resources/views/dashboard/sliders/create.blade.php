@extends('dashboard.layouts.main')

@section('page-content')
<div class="card shadow-none border-0">
    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ isset($slider) ? 'Edit Slider' : 'Create Slider' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ isset($slider) ? route('dashboard.sliders.update', $slider->id) : route('dashboard.sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($slider))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="medium_caption" class="form-label">Medium Caption</label>
                    <input type="text" class="form-control" id="medium_caption" name="medium_caption" value="{{ isset($slider) ? $slider->medium_caption : old('medium_caption') }}" placeholder="Contoh: PT. ATLANTIC ALAM INDUSTRI">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="big_caption" class="form-label">Big Caption</label>
                    <input type="text" class="form-control" id="big_caption" name="big_caption" value="{{ isset($slider) ? $slider->big_caption : old('big_caption') }}" placeholder="Contoh: Engineering, Procurement & Construction Company">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="small_caption" class="form-label">Small Caption</label>
                    <textarea class="form-control" id="small_caption" name="small_caption" rows="3" placeholder="Deskripsi singkat">{{ isset($slider) ? $slider->small_caption : old('small_caption') }}</textarea>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="order" class="form-label">Order</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ isset($slider) ? $slider->order : old('order', 0) }}" min="0">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="is_active" class="form-label">Status</label>
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ isset($slider) ? ($slider->is_active ? 'checked' : '') : 'checked' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Image {{ isset($slider) ? '(Kosongkan jika tidak ingin mengubah)' : '' }}</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" {{ !isset($slider) ? 'required' : '' }}>
                    @if(isset($slider) && $slider->image)
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="Current Image" width="200" class="mt-2">
                    @endif
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti {{ isset($slider) ? 'ti-pencil' : 'ti-plus' }}"></i>
                    {{ isset($slider) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('dashboard.sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
