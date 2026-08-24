@extends('layouts.master')

@section('title', 'Edit Role')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Edit Role</h1>
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

            <div class="col-md-8">

                <div class="card card-warning">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-edit"></i>
                            Edit Role

                        </h3>

                    </div>


                    <form
                        action="{{ route('admin.roles.update', $role->id) }}"
                        method="POST">

                        @csrf

                        @method('PUT')


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
                                    value="{{ old('name', $role->name) }}"
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
                                    value="{{ old('slug', $role->slug) }}"
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
                                >{{ old('description', $role->description) }}</textarea>

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
                                        @checked(old('is_active', $role->is_active))
                                    >

                                    <label
                                        class="custom-control-label"
                                        for="is_active">

                                        Active

                                    </label>

                                </div>

                            </div>


                            {{-- User Count --}}
                            <div class="alert alert-info">

                                <i class="fas fa-users"></i>

                                This role currently has

                                <strong>
                                    {{ $role->users()->count() }}
                                </strong>

                                user(s).

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
                                class="btn btn-warning">

                                <i class="fas fa-save"></i>
                                Update Role

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection