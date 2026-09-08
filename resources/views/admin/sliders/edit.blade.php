@extends('layouts.master')

@section('title', 'Edit Slider')

@section('content')

@include('admin.components.alert')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Edit Slider</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.sliders.index') }}">
                            Sliders
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


<!-- Main Content -->
<section class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="card card-warning">

                    <!-- Card Header -->
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            Edit Slider
                        </h3>
                    </div>


                    <!-- Form -->
                    <form
                        action="{{ route('admin.sliders.update', $slider->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="row">

                                <!-- Position -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="position">
                                            Position
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select
                                            name="position"
                                            id="position"
                                            class="form-control @error('position') is-invalid @enderror"
                                            required
                                        >

                                            <option value="main_slider"
                                                {{ old('position', $slider->position) == 'main_slider' ? 'selected' : '' }}>
                                                Main Slider
                                            </option>

                                            <option value="side_top"
                                                {{ old('position', $slider->position) == 'side_top' ? 'selected' : '' }}>
                                                Side Top
                                            </option>

                                            <option value="side_bottom"
                                                {{ old('position', $slider->position) == 'side_bottom' ? 'selected' : '' }}>
                                                Side Bottom
                                            </option>

                                        </select>

                                        @error('position')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                <!-- Link URL -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="link_url">
                                            Link URL
                                        </label>

                                        <input
                                            type="url"
                                            name="link_url"
                                            id="link_url"
                                            class="form-control @error('link_url') is-invalid @enderror"
                                            value="{{ old('link_url', $slider->link_url) }}"
                                            placeholder="https://example.com/product/example"
                                        >

                                        <small class="text-muted">
                                            Optional. Add the product or page URL.
                                        </small>

                                        @error('link_url')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                <!-- Current Image -->
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>
                                            Current Image
                                        </label>

                                        <div class="mt-2">

                                            @if($slider->image)

                                                <img
                                                    src="{{ asset('storage/' . $slider->image) }}"
                                                    alt="Slider Image"
                                                    class="current-slider-image"
                                                    width="120"
                                                >

                                            @else

                                                <div class="alert alert-secondary">
                                                    No image available.
                                                </div>

                                            @endif

                                        </div>

                                    </div>

                                </div>


                                <!-- Change Image -->
                                <div class="col-md-8">

                                    <div class="form-group">

                                        <label for="image">
                                            Change Image
                                        </label>

                                        <input
                                            type="file"
                                            name="image"
                                            id="image"
                                            class="form-control-file @error('image') is-invalid @enderror"
                                            accept="image/jpeg,image/png,image/webp"
                                        >

                                        <small class="text-muted d-block mt-1">
                                            Leave empty to keep the current image.
                                            JPG, JPEG, PNG or WEBP. Maximum 2MB.
                                        </small>

                                        @error('image')
                                            <span class="text-danger d-block mt-1">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                <!-- Sort Order -->
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="sort_order">
                                            Sort Order
                                        </label>

                                        <input
                                            type="number"
                                            name="sort_order"
                                            id="sort_order"
                                            class="form-control @error('sort_order') is-invalid @enderror"
                                            value="{{ old('sort_order', $slider->sort_order) }}"
                                            min="0"
                                        >

                                        <small class="text-muted">
                                            Lower number will appear first.
                                        </small>

                                        @error('sort_order')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                <!-- Start At -->
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="start_at">
                                            Start At
                                        </label>

                                        <input
                                            type="datetime-local"
                                            name="start_at"
                                            id="start_at"
                                            class="form-control @error('start_at') is-invalid @enderror"
                                            value="{{ old('start_at', $slider->start_at?->format('Y-m-d\TH:i')) }}"
                                        >

                                        <small class="text-muted">
                                            Optional.
                                        </small>

                                        @error('start_at')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                <!-- End At -->
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="end_at">
                                            End At
                                        </label>

                                        <input
                                            type="datetime-local"
                                            name="end_at"
                                            id="end_at"
                                            class="form-control @error('end_at') is-invalid @enderror"
                                            value="{{ old('end_at', $slider->end_at?->format('Y-m-d\TH:i')) }}"
                                        >

                                        <small class="text-muted">
                                            Optional.
                                        </small>

                                        @error('end_at')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                <!-- Status -->
                                <div class="col-md-12 mt-2">

                                    <div class="form-group">

                                        <div class="custom-control custom-switch">

                                            <input
                                                type="checkbox"
                                                name="is_active"
                                                value="1"
                                                class="custom-control-input"
                                                id="is_active"
                                                @checked(old('is_active', $slider->is_active))
                                            >

                                            <label
                                                class="custom-control-label"
                                                for="is_active"
                                            >
                                                Active Slider
                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- Card Footer -->
                        <div class="card-footer">

                            <a
                                href="{{ route('admin.sliders.index') }}"
                                class="btn btn-secondary"
                            >
                                <i class="fas fa-arrow-left"></i>
                                Back
                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning float-right"
                            >
                                <i class="fas fa-save"></i>
                                Update Slider
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
    .current-slider-image {
        width: 220px;
        height: 120px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ddd;
    }
</style>

@endpush

