@extends('layouts.master')

@section('title', 'Add Product')

@section('content')
  @include('admin.components.alert')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
            <li class="breadcrumb-item active">Add Product</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          {{-- Left Column: Main Product Details --}}
          <div class="col-md-8">

            {{-- Basic Information --}}
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
              </div>
              <div class="card-body">

                {{-- Product Name --}}
                <div class="form-group">
                  <label for="name">Product Name <span class="text-danger">*</span></label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required placeholder="Enter product name">
                  @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="row">
                  {{-- Slug --}}
                  <div class="col-md-6 form-group">
                    <label for="slug">Slug (Optional)</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                      value="{{ old('slug') }}" placeholder="Auto-generated if left empty">
                    @error('slug') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  {{-- SKU --}}
                  <div class="col-md-6 form-group">
                    <label for="sku">SKU</label>
                    <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror"
                      value="{{ old('sku') }}" placeholder="e.g. PROD-1001">
                    @error('sku') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>
                </div>

                {{-- Short Description --}}
                <div class="form-group">
                  <label for="short_desc">Short Description</label>
                  <textarea name="short_desc" id="short_desc" rows="3"
                    class="form-control @error('short_desc') is-invalid @enderror"
                    placeholder="Brief overview of the product">{{ old('short_desc') }}</textarea>
                  @error('short_desc') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Full Description --}}
                <div class="form-group">
                  <label for="full_desc">Full Description</label>
                  <textarea name="full_desc" id="full_desc" rows="6"
                    class="form-control @error('full_desc') is-invalid @enderror"
                    placeholder="Detailed product specification">{{ old('full_desc') }}</textarea>
                  @error('full_desc') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

              </div>
            </div>

            {{-- Pricing & Inventory --}}
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Pricing & Inventory</h3>
              </div>
              <div class="card-body">
                <div class="row">

                  {{-- Regular Price --}}
                  <div class="col-md-4 form-group">
                    <label for="regular_price">Regular Price <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="regular_price" id="regular_price"
                      class="form-control @error('regular_price') is-invalid @enderror" value="{{ old('regular_price') }}"
                      required placeholder="0.00">
                    @error('regular_price') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  {{-- Sale Price --}}
                  <div class="col-md-4 form-group">
                    <label for="sale_price">Sale Price</label>
                    <input type="number" step="0.01" name="sale_price" id="sale_price"
                      class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price') }}"
                      placeholder="0.00">
                    @error('sale_price') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  {{-- Discount --}}
                  <div class="col-md-4 form-group">
                    <label for="discount">Discount Amount / %</label>
                    <input type="number" step="0.01" name="discount" id="discount"
                      class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', 0) }}">
                    @error('discount') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  {{-- Stock Quantity --}}
                  <div class="col-md-6 form-group">
                    <label for="stock_quantity">Stock Quantity</label>
                    <input type="number" name="stock_quantity" id="stock_quantity"
                      class="form-control @error('stock_quantity') is-invalid @enderror"
                      value="{{ old('stock_quantity', 0) }}">
                    @error('stock_quantity') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                  {{-- Low Stock Threshold --}}
                  <div class="col-md-6 form-group">
                    <label for="low_stock_threshold">Low Stock Threshold</label>
                    <input type="number" name="low_stock_threshold" id="low_stock_threshold"
                      class="form-control @error('low_stock_threshold') is-invalid @enderror"
                      value="{{ old('low_stock_threshold', 5) }}">
                    @error('low_stock_threshold') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>

                </div>
              </div>
            </div>

            {{-- SEO Meta Information --}}
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">SEO Optimization</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="meta_title">Meta Title</label>
                  <input type="text" name="meta_title" id="meta_title"
                    class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') }}"
                    placeholder="Search engine title">
                  @error('meta_title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                  <label for="meta_description">Meta Description</label>
                  <textarea name="meta_description" id="meta_description" rows="3"
                    class="form-control @error('meta_description') is-invalid @enderror"
                    placeholder="Search engine description">{{ old('meta_description') }}</textarea>
                  @error('meta_description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

          </div>

          {{-- Right Column: Organization, Status & Media --}}
          <div class="col-md-4">



            {{-- Categories & Brand --}}
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Organization</h3>
              </div>
              <div class="card-body">

                {{-- Category --}}
                <div class="form-group">
                  <label for="category_id">Category <span class="text-danger">*</span></label>
                  <select name="category_id" id="category_id"
                    class="form-control @error('category_id') is-invalid @enderror" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                      </option>
                    @endforeach
                  </select>
                  @error('category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Sub Category --}}
                <div class="form-group">
                  <label for="sub_category_id">Sub Category</label>
                  <select name="sub_category_id" id="sub_category_id"
                    class="form-control @error('sub_category_id') is-invalid @enderror">
                    <option value="">Select Sub Category</option>
                    @foreach($subCategories ?? [] as $subCategory)
                      <option value="{{ $subCategory->id }}" {{ old('sub_category_id') == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
                    @endforeach
                  </select>
                  @error('sub_category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Brand --}}
                <div class="form-group">
                  <label for="brand_id">Brand</label>
                  <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                    <option value="">Select Brand</option>
                    @foreach($brands ?? [] as $brand)
                      <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                      </option>
                    @endforeach
                  </select>
                  @error('brand_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

              </div>
            </div>

            {{-- Image Upload --}}
            <!-- <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Product Image</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror"
                      id="image" accept="image/*">
                    <label class="custom-file-label" for="image">Choose image</label>
                  </div>
                  @error('image') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
              </div>
            </div> -->

            {{-- Image Upload --}}
          <div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-image"></i> Product Image
        </h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="custom-file">
                <input 
                    type="file" 
                    name="image" 
                    class="custom-file-input @error('image') is-invalid @enderror" 
                    id="image" 
                    accept="image/*"
                >
                <label class="custom-file-label" for="image">Choose Product Image</label>
            </div>
            @error('image') 
                <span class="text-danger small">{{ $message }}</span> 
            @enderror
            <small class="form-text text-muted">Recommended size: 800x800px. Max 2MB.</small>
        </div>

        {{-- Image Preview --}}
        <div id="image-preview" class="mt-2 text-center" style="display: none;">
            <img 
                id="image-preview-img" 
                src="#" 
                alt="Image Preview" 
                class="img-thumbnail" 
                style="max-height: 150px; max-width: 150px;"
            >
            <br>
            <button type="button" onclick="removeImage()" class="btn btn-danger btn-sm mt-2">
                <i class="fas fa-times"></i> Remove
            </button>
        </div>
    </div>
</div>

          

            {{-- Publish & Status --}}
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Publish Options</h3>
              </div>
              <div class="card-body">

                {{-- Status --}}
                <div class="form-group">
                  <label for="status">Status <span class="text-danger">*</span></label>
                  <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                  </select>
                  @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Sort Order --}}
                <div class="form-group">
                  <label for="sort_order">Sort Order</label>
                  <input type="number" name="sort_order" id="sort_order"
                    class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', 0) }}">
                  @error('sort_order') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                {{-- Is Featured --}}
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="is_featured" class="custom-control-input" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="is_featured">Featured Product</label>
                  </div>
                </div>

                {{-- Is Flash --}}
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="is_flash" class="custom-control-input" id="is_flash" value="1" {{ old('is_flash') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="is_flash">Flash Product</label>
                  </div>
                </div>

                {{-- Is Best --}}
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="is_best" class="custom-control-input" id="is_best" value="1" {{ old('is_best') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="is_best">Best Selling</label>
                  </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-primary btn-block">Save Product</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-block">Cancel</a>

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
        background-color: #fff;
    }
    
    .custom-file-label::after {
        content: "Browse";
    }
</style>
@endpush

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // ===== PRODUCT IMAGE PREVIEW =====
        const imageInput = document.getElementById('image');
        const previewDiv = document.getElementById('image-preview');
        const previewImg = document.getElementById('image-preview-img');

        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        if (previewImg) {
                            previewImg.src = e.target.result;
                        }
                        if (previewDiv) {
                            previewDiv.style.display = 'block';
                        }
                    };
                    reader.readAsDataURL(file);

                    // Update file label
                    const label = this.nextElementSibling;
                    if (label && label.classList.contains('custom-file-label')) {
                        label.innerHTML = file.name;
                    }
                }
            });
        }

        // ===== REMOVE IMAGE PREVIEW =====
        window.removeImage = function() {
            const previewDiv = document.getElementById('image-preview');
            const imageInput = document.getElementById('image');
            const label = imageInput ? imageInput.nextElementSibling : null;
            
            if (previewDiv) {
                previewDiv.style.display = 'none';
            }
            
            if (imageInput) {
                imageInput.value = '';
            }
            
            if (label && label.classList.contains('custom-file-label')) {
                label.innerHTML = 'Choose Product Image';
            }
        };

        // ===== AUTO GENERATE SLUG FROM NAME =====
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        if (nameInput && slugInput) {
            nameInput.addEventListener('keyup', function() {
                if (slugInput.value === '' || slugInput.dataset.generated === 'true') {
                    const slug = this.value
                        .toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, '')    // Remove special characters
                        .replace(/\s+/g, '-')            // Replace spaces with -
                        .replace(/-+/g, '-')             // Remove multiple -
                        .replace(/^-+|-+$/g, '');        // Remove leading/trailing -
                    slugInput.value = slug;
                    slugInput.dataset.generated = 'true';
                }
            });

            slugInput.addEventListener('keydown', function() {
                this.dataset.generated = 'false';
            });
            
            // If user manually types in slug
            slugInput.addEventListener('input', function() {
                this.dataset.generated = 'false';
            });
        }

    }); // End DOMContentLoaded
</script>
@endpush