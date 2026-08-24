@extends('layouts.master')

@section('title', 'Edit Policy')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>
                    Edit Policy
                </h1>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.policies.index') }}">
                            Policies
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

        <div class="card card-warning">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-edit"></i>

                    Edit Policy:
                    {{ $policy->title }}

                </h3>

            </div>


            <form
                action="{{ route('admin.policies.update', $policy->id) }}"
                method="POST">

                @csrf

                @method('PUT')


                <div class="card-body">

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <strong>
                                Please fix the following errors:
                            </strong>

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <div class="row">

                        {{-- Title --}}
                        <div class="col-md-8">

                            <div class="form-group">

                                <label>
                                    Policy Title
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $policy->title) }}"
                                    required
                                >

                                @error('title')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>

                        </div>


                        {{-- Sort --}}
                        <div class="col-md-4">

                            <div class="form-group">

                                <label>
                                    Sort Order
                                </label>

                                <input
                                    type="number"
                                    name="sort_order"
                                    class="form-control"
                                    value="{{ old('sort_order', $policy->sort_order) }}"
                                    min="0"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- Slug --}}
                    <div class="form-group">

                        <label>
                            Slug
                        </label>

                        <input
                            type="text"
                            name="slug"
                            class="form-control @error('slug') is-invalid @enderror"
                            value="{{ old('slug', $policy->slug) }}"
                        >

                        @error('slug')

                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- Description --}}
                    <div class="form-group">

                        <label>
                            Description
                            <span class="text-danger">*</span>
                        </label>

                        <textarea
                            name="description"
                            rows="10"
                            class="form-control @error('description') is-invalid @enderror"
                            required
                        >{{ old('description', $policy->description) }}</textarea>

                        @error('description')

                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <div class="row">

                        {{-- Published --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Published At
                                </label>

                                <input
                                    type="datetime-local"
                                    name="published_at"
                                    class="form-control"
                                    value="{{ old(
                                        'published_at',
                                        $policy->published_at
                                            ? $policy->published_at->format('Y-m-d\TH:i')
                                            : ''
                                    ) }}"
                                >

                            </div>

                        </div>


                        {{-- Status --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Status
                                </label>

                                <select
                                    name="is_active"
                                    class="form-control">

                                    <option value="1"
                                        @selected(old('is_active', $policy->is_active ? '1' : '0') == '1')>

                                        Active

                                    </option>

                                    <option value="0"
                                        @selected(old('is_active', $policy->is_active ? '1' : '0') == '0')>

                                        Inactive

                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- SEO --}}
                    <div class="card card-secondary">

                        <div class="card-header">

                            <h3 class="card-title">
                                SEO Information
                            </h3>

                        </div>

                        <div class="card-body">

                            <div class="form-group">

                                <label>
                                    Meta Title
                                </label>

                                <input
                                    type="text"
                                    name="meta_title"
                                    class="form-control"
                                    value="{{ old('meta_title', $policy->meta_title) }}"
                                    placeholder="SEO meta title"
                                >

                            </div>


                            <div class="form-group">

                                <label>
                                    Meta Description
                                </label>

                                <textarea
                                    name="meta_description"
                                    rows="4"
                                    class="form-control"
                                    placeholder="SEO meta description..."
                                >{{ old('meta_description', $policy->meta_description) }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="card-footer">

                    <a
                        href="{{ route('admin.policies.index') }}"
                        class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>
                        Back

                    </a>

                    <button
                        type="submit"
                        class="btn btn-warning">

                        <i class="fas fa-save"></i>
                        Update Policy

                    </button>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection