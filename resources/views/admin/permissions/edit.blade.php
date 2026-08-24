@extends('layouts.master')

@section('title', 'Edit Permission')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>Edit Permission</h1>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">

                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>

                    </li>

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.permissions.index') }}">
                            Permissions
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
                            Edit Permission

                        </h3>

                    </div>


                    <form
                        action="{{ route('admin.permissions.update', $permission->id) }}"
                        method="POST"
                    >

                        @csrf

                        @method('PUT')


                        <div class="card-body">

                            {{-- Name --}}
                            <div class="form-group">

                                <label for="name">

                                    Permission Name

                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $permission->name) }}"
                                    placeholder="Example: Create User"
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
                                    Permission Slug
                                </label>

                                <input
                                    type="text"
                                    name="slug"
                                    id="slug"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    value="{{ old('slug', $permission->slug) }}"
                                    placeholder="Example: create-user"
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


                            {{-- Role Count --}}
                            <div class="alert alert-info">

                                <i class="fas fa-user-shield"></i>

                                This permission is currently assigned to

                                <strong>
                                    {{ $permission->roles()->count() }}
                                </strong>

                                role(s).

                            </div>

                        </div>


                        <div class="card-footer">

                            <a
                                href="{{ route('admin.permissions.index') }}"
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
                                Update Permission

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection