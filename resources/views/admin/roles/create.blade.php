@extends('layouts.master')

@section('title', 'Create Role')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Create Role</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.roles.index') }}">
                            Roles
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

            <div class="col-md-8">

                <div class="card card-primary">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-user-shield"></i>
                            Add New Role

                        </h3>

                    </div>


                    <form
                        action="{{ route('admin.roles.store') }}"
                        method="POST">

                        @csrf

                        <div class="card-body">

                            {{-- Name --}}
                            <div class="form-group">

                                <label for="name">
                                    Role Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    placeholder="Enter role name"
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
                                    placeholder="admin, manager, editor"
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
                                    placeholder="Enter role description"
                                >{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Status --}}
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
                                        for="is_active">

                                        Active

                                    </label>

                                </div>

                            </div>

                        </div>


                        <div class="card-footer">

                            <a
                                href="{{ route('admin.roles.index') }}"
                                class="btn btn-secondary">

                                <i class="fas fa-arrow-left"></i>
                                Back

                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary">

                                <i class="fas fa-save"></i>
                                Save Role

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection