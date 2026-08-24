@extends('layouts.master')

@section('title', 'Edit Sub Category')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>Edit Sub Category</h1>

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
                        Edit
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

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-edit"></i>

                            Edit Sub Category

                        </h3>

                    </div>


                    <form
                        action="{{ route('admin.sub-categories.update', $subCategory->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


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
                                            @selected(
                                                old(
                                                    'category_id',
                                                    $subCategory->category_id
                                                ) == $category->id
                                            )
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
                                    value="{{ old('name', $subCategory->name) }}"
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
                                    value="{{ old('slug', $subCategory->slug) }}"
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
                                >{{ old('description', $subCategory->description) }}</textarea>

                                @error('description')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- Image --}}
                            <div class="form-group">

                                <label>
                                    Sub Category Image
                                </label>


                                @if($subCategory->image)

                                    <div class="mb-3">

                                        <label class="d-block">
                                            Current Image
                                        </label>

                                        <img
                                            src="{{ asset('storage/' . $subCategory->image) }}"
                                            alt="{{ $subCategory->name }}"
                                            class="current-image"
                                            width="120"
                                        >

                                    </div>

                                @endif


                                <label for="image">
                                    Change Image
                                </label>

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
                                        id="image-label"
                                        for="image"
                                    >
                                        Choose new image
                                    </label>

                                </div>

                                <small class="text-muted">

                                    Leave empty to keep current image.

                                    JPG, JPEG, PNG or WEBP.
                                    Maximum 2MB.

                                </small>


                                @error('image')

                                    <span class="text-danger d-block mt-1">
                                        {{ $message }}
                                    </span>

                                @enderror


                                <div class="mt-3">

                                    <img
                                        id="image-preview"
                                        src="#"
                                        class="image-preview"
                                        style="display:none;"
                                        width="120"
                                    >

                                </div>

                            </div>


                            {{-- Sort Order --}}
                            <div class="form-group">

                                <label for="sort_order">
                                    Sort Order
                                </label>

                                <input
                                    type="number"
                                    name="sort_order"
                                    id="sort_order"
                                    class="form-control @error('sort_order') is-invalid @enderror"
                                    value="{{ old('sort_order', $subCategory->sort_order ?? 0) }}"
                                    min="0"
                                >

                                @error('sort_order')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

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
                                        @checked(
                                            old(
                                                'is_active',
                                                $subCategory->is_active
                                            )
                                        )
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
                                    class="form-control @error('meta_title') is-invalid @enderror"
                                    value="{{ old('meta_title', $subCategory->meta_title) }}"
                                    placeholder="SEO meta title"
                                >

                                @error('meta_title')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <div class="form-group">

                                <label for="meta_description">
                                    Meta Description
                                </label>

                                <textarea
                                    name="meta_description"
                                    id="meta_description"
                                    rows="3"
                                    class="form-control @error('meta_description') is-invalid @enderror"
                                    placeholder="SEO meta description"
                                >{{ old('meta_description', $subCategory->meta_description) }}</textarea>

                                @error('meta_description')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

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
                                class="btn btn-warning"
                            >

                                <i class="fas fa-save"></i>

                                Update Sub Category

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

    .current-image {

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

    slugInput.value = this.value

        .toLowerCase()

        .trim()

        .replace(/[^a-z0-9\s-]/g, '')

        .replace(/\s+/g, '-')

        .replace(/-+/g, '-');

});

</script>

@endpush