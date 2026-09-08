@extends('layouts.master')

@section('title', 'Create Slider')

@section('content')

@include('admin.components.alert')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Create Slider</h1>
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
                        Create
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

                <div class="card card-primary">

                    <!-- Card Header -->
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-plus"></i>
                            Add New Slider
                        </h3>
                    </div>


                    <!-- Form -->
                    <form
                        action="{{ route('admin.sliders.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

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

                                            <option value="">
                                                -- Select Position --
                                            </option>

                                            <option
                                                value="main_slider"
                                                {{ old('position') == 'main_slider' ? 'selected' : '' }}
                                            >
                                                Main Slider
                                            </option>

                                            <option
                                                value="side_top"
                                                {{ old('position') == 'side_top' ? 'selected' : '' }}
                                            >
                                                Side Top
                                            </option>

                                            <option
                                                value="side_bottom"
                                                {{ old('position') == 'side_bottom' ? 'selected' : '' }}
                                            >
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
                                            value="{{ old('link_url') }}"
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


                                <!-- Banner Image -->
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="image">
                                            Banner Image
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input
                                            type="file"
                                            name="image"
                                            id="image"
                                            class="form-control-file @error('image') is-invalid @enderror"
                                            accept="image/jpeg,image/png,image/webp"
                                            required
                                        >

                                        <small class="text-muted d-block mt-1">
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
                                            value="{{ old('sort_order', 0) }}"
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
                                            value="{{ old('start_at') }}"
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
                                            value="{{ old('end_at') }}"
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


                                <!-- Active Status -->
                                <div class="col-md-12 mt-2">

                                    <div class="form-group">

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
                                class="btn btn-primary float-right"
                            >
                                <i class="fas fa-save"></i>
                                Save Slider
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection