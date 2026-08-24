@extends('layouts.master')

@section('title', 'Edit Category')

@section('content')

@include('admin.components.alert')

<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Edit Category</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.categories.index') }}">
                            Categories
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit Category
                    </li>

                </ol>
            </div>

        </div>

    </div>
</section>


<section class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-10 mx-auto">

                <div class="card card-warning">

                    {{-- Card Header --}}
                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-edit"></i>

                            Edit Category

                        </h3>

                    </div>


                    {{-- Form --}}
                    <form
                        action="{{ route('admin.categories.update', $category->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


                        <div class="card-body">

                            {{-- ================================================= --}}
                            {{-- Category Name --}}
                            {{-- ================================================= --}}

                            <div class="form-group">

                                <label for="name">

                                    Category Name

                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $category->name) }}"
                                    placeholder="Enter category name"
                                    required
                                >

                                @error('name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- ================================================= --}}
                            {{-- Slug --}}
                            {{-- ================================================= --}}

                            <div class="form-group">

                                <label for="slug">
                                    Slug
                                </label>

                                <input
                                    type="text"
                                    name="slug"
                                    id="slug"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    value="{{ old('slug', $category->slug) }}"
                                    placeholder="category-slug"
                                >

                                <small class="form-text text-muted">

                                    Leave empty to generate automatically from
                                    category name.

                                </small>

                                @error('slug')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- ================================================= --}}
                            {{-- Description --}}
                            {{-- ================================================= --}}

                            <div class="form-group">

                                <label for="description">
                                    Description
                                </label>

                                <textarea
                                    name="description"
                                    id="description"
                                    rows="4"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter category description"
                                >{{ old('description', $category->description) }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- ================================================= --}}
                            {{-- Category Image --}}
                            {{-- ================================================= --}}

                            <div class="form-group">

                                <label for="image">
                                    Category Image
                                </label>


                                {{-- Current Image --}}
                                @if($category->image)

                                    <div class="mb-3">

                                        <label class="d-block">
                                            Current Image
                                        </label>

                                        <div class="current-image-wrapper">

                                            <img
                                                src="{{ asset('storage/' . $category->image) }}"
                                                alt="{{ $category->name }}"
                                                class="current-category-image"
                                                width="120"
                                            >

                                        </div>

                                    </div>

                                @endif


                                {{-- New Image --}}
                                <div class="custom-file">

                                    <input
                                        type="file"
                                        name="image"
                                        id="image"
                                        class="custom-file-input @error('image') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png,.webp"
                                    >

                                    <label
                                        class="custom-file-label"
                                        for="image"
                                        id="image-label"
                                    >
                                        Choose new image
                                    </label>

                                </div>


                                <small class="form-text text-muted">

                                    Leave empty to keep the current image.

                                    Allowed: JPG, JPEG, PNG, WEBP.
                                    Maximum size: 2MB.

                                </small>


                                @error('image')

                                    <span class="text-danger d-block mt-1">
                                        {{ $message }}
                                    </span>

                                @enderror


                                {{-- New Image Preview --}}
                                <div class="mt-3">

                                    <label id="preview-label"
                                           style="display:none;">

                                        New Image Preview

                                    </label>

                                    <br>

                                    <img
                                        id="image-preview"
                                        src="#"
                                        alt="Preview"
                                        class="new-image-preview"
                                        style="display:none;"
                                        width="120"
                                    >

                                </div>

                            </div>


                            {{-- ================================================= --}}
                            {{-- Sort Order --}}
                            {{-- ================================================= --}}

                            <div class="form-group">

                                <label for="sort_order">
                                    Sort Order
                                </label>

                                <input
                                    type="number"
                                    name="sort_order"
                                    id="sort_order"
                                    class="form-control @error('sort_order') is-invalid @enderror"
                                    value="{{ old('sort_order', $category->sort_order ?? 0) }}"
                                    min="0"
                                    placeholder="0"
                                >

                                <small class="form-text text-muted">

                                    Lower number will appear first.

                                </small>

                                @error('sort_order')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- ================================================= --}}
                            {{-- Status --}}
                            {{-- ================================================= --}}

                            <div class="form-group">

                                <label>
                                    Status
                                </label>

                                <div class="custom-control custom-switch">

                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="is_active"
                                        name="is_active"
                                        value="1"
                                        @checked(old('is_active', $category->is_active))
                                    >

                                    <label
                                        class="custom-control-label"
                                        for="is_active"
                                    >
                                        Active
                                    </label>

                                </div>

                            </div>


                            {{-- ================================================= --}}
                            {{-- SEO --}}
                            {{-- ================================================= --}}

                            <hr>

                            <h5 class="mb-3">

                                <i class="fas fa-search"></i>

                                SEO Information

                            </h5>


                            {{-- Meta Title --}}
                            <div class="form-group">

                                <label for="meta_title">
                                    Meta Title
                                </label>

                                <input
                                    type="text"
                                    name="meta_title"
                                    id="meta_title"
                                    class="form-control @error('meta_title') is-invalid @enderror"
                                    value="{{ old('meta_title', $category->meta_title) }}"
                                    maxlength="255"
                                    placeholder="Enter SEO meta title"
                                >

                                @error('meta_title')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Meta Description --}}
                            <div class="form-group">

                                <label for="meta_description">
                                    Meta Description
                                </label>

                                <textarea
                                    name="meta_description"
                                    id="meta_description"
                                    rows="3"
                                    class="form-control @error('meta_description') is-invalid @enderror"
                                    placeholder="Enter SEO meta description"
                                >{{ old('meta_description', $category->meta_description) }}</textarea>

                                @error('meta_description')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- Card Footer --}}
                        {{-- ================================================= --}}

                        <div class="card-footer">

                            <a
                                href="{{ route('admin.categories.index') }}"
                                class="btn btn-secondary"
                            >

                                <i class="fas fa-arrow-left"></i>

                                Back

                            </a>


                            <button
                                type="submit"
                                class="btn btn-warning"
                            >

                                <i class="fas fa-save"></i>

                                Update Category

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection


@push('styles')

<style>

    /*
    |--------------------------------------------------------------------------
    | Current Image
    |--------------------------------------------------------------------------
    */

    .current-image-wrapper {

        width: 120px;
        height: 120px;

        border: 1px solid #ddd;

        border-radius: 8px;

        background: #f8f9fa;

        display: flex;

        align-items: center;

        justify-content: center;

        overflow: hidden;

    }


    .current-category-image {

        width: 100%;
        height: 100%;

        object-fit: contain;

        padding: 5px;

    }


    /*
    |--------------------------------------------------------------------------
    | New Image Preview
    |--------------------------------------------------------------------------
    */

    .new-image-preview {

        width: 120px;
        height: 120px;

        object-fit: contain;

        border: 1px solid #ddd;

        border-radius: 8px;

        padding: 5px;

        background: #f8f9fa;

    }


    /*
    |--------------------------------------------------------------------------
    | Form
    |--------------------------------------------------------------------------
    */

    .form-group label {

        font-weight: 600;

    }

</style>

@endpush


@push('js')

<script>

document.getElementById('image').addEventListener('change', function (event) {

    const file = event.target.files[0];

    const preview = document.getElementById('image-preview');

    const previewLabel = document.getElementById('preview-label');

    const label = document.getElementById('image-label');


    if (file) {

        /*
        |--------------------------------------------------------------------------
        | File Name
        |--------------------------------------------------------------------------
        */

        label.textContent = file.name;


        /*
        |--------------------------------------------------------------------------
        | Preview
        |--------------------------------------------------------------------------
        */

        const reader = new FileReader();

        reader.onload = function (e) {

            preview.src = e.target.result;

            preview.style.display = 'inline-block';

            previewLabel.style.display = 'inline';

        };

        reader.readAsDataURL(file);

    } else {

        label.textContent = 'Choose new image';

        preview.src = '#';

        preview.style.display = 'none';

        previewLabel.style.display = 'none';

    }

});

</script>

@endpush