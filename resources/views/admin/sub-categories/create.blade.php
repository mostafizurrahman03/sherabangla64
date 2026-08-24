@extends('layouts.master')

@section('title', 'Create Sub Category')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Create Sub Category</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.sub-categories.index') }}">
                            Sub Categories
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Create
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

                <div class="card card-primary">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-plus"></i>

                            Add New Sub Category

                        </h3>

                    </div>


                    <form
                        action="{{ route('admin.sub-categories.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf


                        <div class="card-body">

                            {{-- Category --}}
                            <div class="form-group">

                                <label for="category_id">

                                    Parent Category

                                    <span class="text-danger">*</span>

                                </label>

                                <select
                                    name="category_id"
                                    id="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    required
                                >

                                    <option value="">
                                        -- Select Category --
                                    </option>

                                    @foreach($categories as $category)

                                        <option
                                            value="{{ $category->id }}"
                                            @selected(old('category_id') == $category->id)
                                        >

                                            {{ $category->name }}

                                        </option>

                                    @endforeach

                                </select>

                                @error('category_id')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- Name --}}
                            <div class="form-group">

                                <label for="name">

                                    Sub Category Name

                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    placeholder="Enter sub-category name"
                                    required
                                >

                                @error('name')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- Slug --}}
                            <div class="form-group">

                                <label for="slug">
                                    Slug
                                </label>

                                <input
                                    type="text"
                                    name="slug"
                                    id="slug"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    value="{{ old('slug') }}"
                                    placeholder="sub-category-slug"
                                >

                                <small class="text-muted">

                                    Leave empty to generate automatically.

                                </small>

                                @error('slug')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- Description --}}
                            <div class="form-group">

                                <label for="description">
                                    Description
                                </label>

                                <textarea
                                    name="description"
                                    id="description"
                                    rows="4"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter description"
                                >{{ old('description') }}</textarea>

                                @error('description')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- Image --}}
                            <div class="form-group">

                                <label for="image">
                                    Sub Category Image
                                </label>

                                <div class="custom-file">

                                    <input
                                        type="file"
                                        name="image"
                                        id="image"
                                        class="custom-file-input"
                                        accept=".jpg,.jpeg,.png,.webp"
                                    >

                                    <label
                                        class="custom-file-label"
                                        for="image"
                                        id="image-label"
                                    >
                                        Choose image
                                    </label>

                                </div>

                                <small class="text-muted">

                                    JPG, JPEG, PNG or WEBP.
                                    Maximum 2MB.

                                </small>


                                <div class="mt-3">

                                    <img
                                        id="image-preview"
                                        src="#"
                                        class="image-preview"
                                        style="display:none;"
                                        width="120"
                                    >

                                </div>

                                @error('image')

                                    <span class="text-danger d-block">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- Sort --}}
                            <div class="form-group">

                                <label for="sort_order">
                                    Sort Order
                                </label>

                                <input
                                    type="number"
                                    name="sort_order"
                                    id="sort_order"
                                    class="form-control"
                                    value="{{ old('sort_order', 0) }}"
                                    min="0"
                                >

                            </div>


                            {{-- Status --}}
                            <div class="form-group">

                                <label>
                                    Status
                                </label>

                                <div class="custom-control custom-switch">

                                    <input
                                        type="checkbox"
                                        name="is_active"
                                        value="1"
                                        class="custom-control-input"
                                        id="is_active"
                                        @checked(old('is_active', true))
                                    >

                                    <label
                                        class="custom-control-label"
                                        for="is_active"
                                    >
                                        Active
                                    </label>

                                </div>

                            </div>


                            <hr>


                            {{-- SEO --}}
                            <h5 class="mb-3">

                                <i class="fas fa-search"></i>

                                SEO Information

                            </h5>


                            <div class="form-group">

                                <label for="meta_title">
                                    Meta Title
                                </label>

                                <input
                                    type="text"
                                    name="meta_title"
                                    id="meta_title"
                                    class="form-control"
                                    value="{{ old('meta_title') }}"
                                    placeholder="SEO meta title"
                                >

                            </div>


                            <div class="form-group">

                                <label for="meta_description">
                                    Meta Description
                                </label>

                                <textarea
                                    name="meta_description"
                                    id="meta_description"
                                    rows="3"
                                    class="form-control"
                                    placeholder="SEO meta description"
                                >{{ old('meta_description') }}</textarea>

                            </div>

                        </div>


                        <div class="card-footer">

                            <a
                                href="{{ route('admin.sub-categories.index') }}"
                                class="btn btn-secondary"
                            >

                                <i class="fas fa-arrow-left"></i>

                                Back

                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="fas fa-save"></i>

                                Save Sub Category

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

    .image-preview {

        width: 120px !important;

        height: 120px !important;

        max-width: 120px !important;

        max-height: 120px !important;

        object-fit: contain;

        border: 1px solid #ddd;

        border-radius: 8px;

        padding: 5px;

        background: #f8f9fa;

    }

</style>

@endpush


@push('js')

<script>

document
    .getElementById('image')
    .addEventListener('change', function (event) {

        const file = event.target.files[0];

        const preview =
            document.getElementById('image-preview');

        const label =
            document.getElementById('image-label');


        if (file) {

            label.textContent = file.name;

            const reader = new FileReader();

            reader.onload = function (e) {

                preview.src = e.target.result;

                preview.style.display = 'inline-block';

            };

            reader.readAsDataURL(file);

        }

    });


/*
|--------------------------------------------------------------------------
| Auto Slug
|--------------------------------------------------------------------------
*/

const nameInput =
    document.getElementById('name');

const slugInput =
    document.getElementById('slug');


nameInput.addEventListener('input', function () {

    if (!slugInput.dataset.edited) {

        slugInput.value = this.value

            .toLowerCase()

            .trim()

            .replace(/[^a-z0-9\s-]/g, '')

            .replace(/\s+/g, '-')

            .replace(/-+/g, '-');

    }

});


slugInput.addEventListener('input', function () {

    this.dataset.edited = 'true';

});

</script>

@endpush