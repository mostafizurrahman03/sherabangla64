@extends('layouts.master')

@section('title', 'Edit User')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Edit User</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">

                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>

                    </li>

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.users.index') }}">
                            Users
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

                            <i class="fas fa-user-edit"></i>

                            Edit User

                        </h3>

                    </div>


                    <form
                        action="{{ route('admin.users.update', $user->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


                        <div class="card-body">

                            {{-- Name --}}
                            <div class="form-group">

                                <label for="name">

                                    Name

                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}"
                                    placeholder="Enter full name"
                                    required
                                >

                                @error('name')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <div class="row">

                                {{-- Email --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="email">

                                            Email

                                            <span class="text-danger">*</span>

                                        </label>

                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $user->email) }}"
                                            required
                                        >

                                        @error('email')

                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>

                                        @enderror

                                    </div>

                                </div>


                                {{-- Phone --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="phone_no">
                                            Phone Number
                                        </label>

                                        <input
                                            type="text"
                                            name="phone_no"
                                            id="phone_no"
                                            class="form-control @error('phone_no') is-invalid @enderror"
                                            value="{{ old('phone_no', $user->phone_no) }}"
                                            placeholder="01XXXXXXXXX"
                                        >

                                        @error('phone_no')

                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>

                                        @enderror

                                    </div>

                                </div>

                            </div>


                            <div class="row">

                                {{-- Role --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="role_id">

                                            Role

                                            <span class="text-danger">*</span>

                                        </label>

                                        <select
                                            name="role_id"
                                            id="role_id"
                                            class="form-control @error('role_id') is-invalid @enderror"
                                            required
                                        >

                                            <option value="">
                                                -- Select Role --
                                            </option>

                                            @foreach($roles as $role)

                                                <option
                                                    value="{{ $role->id }}"
                                                    @selected(
                                                        old(
                                                            'role_id',
                                                            $user->role_id
                                                        ) == $role->id
                                                    )
                                                >

                                                    {{ $role->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('role_id')

                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>

                                        @enderror

                                    </div>

                                </div>


                                {{-- Status --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Status
                                        </label>

                                        <div class="custom-control custom-switch mt-2">

                                            <input
                                                type="checkbox"
                                                name="is_active"
                                                value="1"
                                                class="custom-control-input"
                                                id="is_active"
                                                @checked(
                                                    old(
                                                        'is_active',
                                                        $user->is_active
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

                                </div>

                            </div>


                            {{-- Password --}}
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="password">

                                            New Password

                                        </label>

                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Leave empty to keep current password"
                                        >

                                        <small class="text-muted">

                                            Leave empty if you don't want
                                            to change the password.

                                        </small>

                                        @error('password')

                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>

                                        @enderror

                                    </div>

                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="password_confirmation">

                                            Confirm New Password

                                        </label>

                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            id="password_confirmation"
                                            class="form-control"
                                            placeholder="Confirm new password"
                                        >

                                    </div>

                                </div>

                            </div>


                            {{-- Image --}}
                            <div class="form-group">

                                <label>
                                    Profile Image
                                </label>


                                @if($user->image)

                                    <div class="mb-3">

                                        <label class="d-block">
                                            Current Image
                                        </label>

                                        <img
                                            src="{{ asset('storage/' . $user->image) }}"
                                            alt="{{ $user->name }}"
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
                                        for="image"
                                        id="image-label"
                                    >
                                        Choose new image
                                    </label>

                                </div>

                                <small class="text-muted">

                                    Leave empty to keep current image.

                                    JPG, JPEG, PNG or WEBP.
                                    Maximum 2MB.

                                </small>


                                <div class="mt-3">

                                    <img
                                        id="image-preview"
                                        src="#"
                                        class="image-preview"
                                        style="display:none;"
                                    >

                                </div>

                                @error('image')

                                    <span class="text-danger d-block">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>

                        </div>


                        <div class="card-footer">

                            <a
                                href="{{ route('admin.users.index') }}"
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

                                Update User

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

        object-fit: cover;

        border-radius: 50%;

        border: 1px solid #ddd;

        padding: 4px;

        background: #f8f9fa;

    }


    .image-preview {

        width: 120px !important;

        height: 120px !important;

        max-width: 120px !important;

        max-height: 120px !important;

        object-fit: cover;

        border-radius: 50%;

        border: 1px solid #ddd;

        padding: 4px;

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

</script>

@endpush