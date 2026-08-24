@extends('layouts.master')

@section('title', 'Add Brand')

@section('content')
@include('admin.components.alert')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add New Brand</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.brands.index') }}">Brands</a></li>
          <li class="breadcrumb-item active">Add Brand</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row">
        {{-- Left Column: Main Details --}}
        <div class="col-md-8">
          
          {{-- Basic Information --}}
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tag"></i> Basic Information
              </h3>
            </div>
            <div class="card-body">
              
              {{-- Brand Name --}}
              <div class="form-group">
                <label for="name">Brand Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Enter brand name">
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>

              <div class="row">
                {{-- Slug --}}
                <div class="col-md-6 form-group">
                  <label for="slug">Slug (Optional)</label>
                  <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="Auto-generated if left empty">
                  @error('slug') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Sort Order --}}
                <div class="col-md-6 form-group">
                  <label for="sort_order">Sort Order</label>
                  <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', 0) }}" min="0" placeholder="0">
                  @error('sort_order') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>

              {{-- Description --}}
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Brand description">{{ old('description') }}</textarea>
                @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>

            </div>
          </div>

          {{-- SEO Meta Information --}}
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-search"></i> SEO Optimization
              </h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') }}" placeholder="Search engine title">
                @error('meta_title') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror" placeholder="Search engine description">{{ old('meta_description') }}</textarea>
                @error('meta_description') <span class="invalid-feedback">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

        </div>

        {{-- Right Column: Media & Status --}}
        <div class="col-md-4">
          
          {{-- Brand Logo --}}
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-image"></i> Brand Logo
              </h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="logo" accept="image/*">
                  <label class="custom-file-label" for="logo">Choose logo image</label>
                </div>
                @error('logo') <span class="text-danger small">{{ $message }}</span> @enderror
                <small class="form-text text-muted">Recommended size: 200x200px. Max 2MB.</small>
              </div>

              {{-- Logo Preview --}}
              <div id="logo-preview" class="mt-2 text-center" style="display: none;">
                <img id="logo-preview-img" src="#" alt="Logo Preview" class="img-thumbnail" style="max-height: 150px; max-width: 150px;">
                <br>
                <button type="button" onclick="removeLogo()" class="btn btn-danger btn-sm mt-2">
                  <i class="fas fa-times"></i> Remove
                </button>
              </div>
            </div>
          </div>

          {{-- Status Options --}}
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-cog"></i> Publish Options
              </h3>
            </div>
            <div class="card-body">
              
              {{-- Active Status --}}
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                  <label class="custom-control-label" for="is_active">Active Status</label>
                </div>
                <small class="form-text text-muted">Inactive brands will not be displayed on the frontend.</small>
              </div>

              <hr>
              <button type="submit" class="btn btn-primary btn-block">
                <i class="fas fa-save"></i> Save Brand
              </button>
              <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary btn-block">
                <i class="fas fa-times"></i> Cancel
              </a>

            </div>
          </div>

        </div>
      </div>
    </form>
  </div>
</section>
@endsection

@push('styles')
<style>
  .img-thumbnail {
    border: 2px solid #ddd;
    padding: 5px;
    border-radius: 4px;
  }
</style>
@endpush

@push('js')
<script>
  // Logo preview
  document.addEventListener('DOMContentLoaded', function() {
    const logoInput = document.getElementById('logo');
    const previewDiv = document.getElementById('logo-preview');
    const previewImg = document.getElementById('logo-preview-img');

    if (logoInput) {
      logoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewDiv.style.display = 'block';
          };
          reader.readAsDataURL(file);

          // Update file label
          const label = document.querySelector('.custom-file-label');
          if (label) {
            label.textContent = file.name;
          }
        }
      });
    }
  });

  // Remove logo preview
  function removeLogo() {
    document.getElementById('logo-preview').style.display = 'none';
    document.getElementById('logo').value = '';
    const label = document.querySelector('.custom-file-label');
    if (label) {
      label.textContent = 'Choose logo image';
    }
  }

  // Auto generate slug from name
  document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    if (nameInput && slugInput) {
      nameInput.addEventListener('keyup', function() {
        if (slugInput.value === '' || slugInput.dataset.generated === 'true') {
          const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
          slugInput.value = slug;
          slugInput.dataset.generated = 'true';
        }
      });

      slugInput.addEventListener('keydown', function() {
        this.dataset.generated = 'false';
      });
    }
  });
</script>
@endpush