@extends('layouts.master')

@section('title', 'Create Slider')

@section('content')

@include('admin.components.alert')

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


<section class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-10">

                <div class="card card-primary">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-plus"></i>
                            Add New Slider

                        </h3>

                    </div>


                    <form
                        action="{{ route('admin.sliders.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf


                        <div class="card-body">

                            <div class="row">

                                {{-- Title --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Title
                                        </label>

                                        <input
                                            type="text"
                                            name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}"
                                            placeholder="Enter slider title"
                                        >

                                        @error('title')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Subtitle --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Subtitle
                                        </label>

                                        <input
                                            type="text"
                                            name="subtitle"
                                            class="form-control @error('subtitle') is-invalid @enderror"
                                            value="{{ old('subtitle') }}"
                                            placeholder="Enter subtitle"
                                        >

                                        @error('subtitle')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Description --}}
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label>
                                            Description
                                        </label>

                                        <textarea
                                            name="description"
                                            rows="4"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Enter slider description"
                                        >{{ old('description') }}</textarea>

                                        @error('description')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Image --}}
                                <div class="col-md-8">

                                    <div class="form-group">

                                        <label>

                                            Slider Image

                                            <span class="text-danger">*</span>

                                        </label>

                                        <input
                                            type="file"
                                            name="image"
                                            class="form-control-file @error('image') is-invalid @enderror"
                                            accept="image/jpeg,image/png,image/webp"
                                            required
                                        >

                                        <small class="text-muted">
                                            JPG, JPEG, PNG or WEBP. Maximum 2MB.
                                        </small>

                                        @error('image')
                                            <br>
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Sort Order --}}
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label>
                                            Sort Order
                                        </label>

                                        <input
                                            type="number"
                                            name="sort_order"
                                            class="form-control @error('sort_order') is-invalid @enderror"
                                            value="{{ old('sort_order', 0) }}"
                                            min="0"
                                        >

                                        @error('sort_order')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Button Text --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Button Text
                                        </label>

                                        <input
                                            type="text"
                                            name="button_text"
                                            class="form-control @error('button_text') is-invalid @enderror"
                                            value="{{ old('button_text') }}"
                                            placeholder="Example: Learn More"
                                        >

                                        @error('button_text')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Button URL --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Button URL
                                        </label>

                                        <input
                                            type="text"
                                            name="button_url"
                                            class="form-control @error('button_url') is-invalid @enderror"
                                            value="{{ old('button_url') }}"
                                            placeholder="https://example.com"
                                        >

                                        @error('button_url')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Start --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Start At
                                        </label>

                                        <input
                                            type="datetime-local"
                                            name="start_at"
                                            class="form-control @error('start_at') is-invalid @enderror"
                                            value="{{ old('start_at') }}"
                                        >

                                        @error('start_at')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- End --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            End At
                                        </label>

                                        <input
                                            type="datetime-local"
                                            name="end_at"
                                            class="form-control @error('end_at') is-invalid @enderror"
                                            value="{{ old('end_at') }}"
                                        >

                                        @error('end_at')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Status --}}
                                <div class="col-md-12">

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
                                class="btn btn-primary"
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