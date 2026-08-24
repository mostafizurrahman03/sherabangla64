@extends('layouts.master')

@section('title', 'Edit Menu')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Edit Menu</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">

                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>

                    </li>

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.menus.index') }}">
                            Menus
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
                            Edit Menu

                        </h3>

                    </div>


                    <form
                        action="{{ route('admin.menus.update', $menu->id) }}"
                        method="POST"
                    >

                        @csrf

                        @method('PUT')


                        <div class="card-body">

                            {{-- Menu Name --}}
                            <div class="form-group">

                                <label for="name">

                                    Menu Name

                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $menu->name) }}"
                                    placeholder="Enter menu name"
                                    required
                                >

                                @error('name')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- Status --}}
                            <div class="form-group">

                                <label for="status">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    id="status"
                                    class="form-control @error('status') is-invalid @enderror"
                                >

                                    <option
                                        value="1"
                                        @selected(old('status', $menu->status) == 1)
                                    >
                                        Active
                                    </option>

                                    <option
                                        value="0"
                                        @selected(old('status', $menu->status) == 0)
                                    >
                                        Inactive
                                    </option>

                                </select>

                                @error('status')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- Created By --}}
                            <div class="form-group">

                                <label>
                                    Created By
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $menu->user?->name ?? 'N/A' }}"
                                    readonly
                                >

                            </div>


                            {{-- Created Date --}}
                            <div class="form-group">

                                <label>
                                    Created At
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $menu->created_at?->format('d M Y h:i A') }}"
                                    readonly
                                >

                            </div>

                        </div>


                        <div class="card-footer">

                            <a
                                href="{{ route('admin.menus.index') }}"
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
                                Update Menu

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection