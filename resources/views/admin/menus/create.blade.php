@extends('layouts.master')

@section('title', 'Create Menu')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Create Menu</h1>
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

                            <i class="fas fa-plus"></i>
                            Add New Menu

                        </h3>

                    </div>


                    <form
                        action="{{ route('admin.menus.store') }}"
                        method="POST"
                    >

                        @csrf


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
                                    value="{{ old('name') }}"
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
                                        @selected(old('status', 1) == 1)
                                    >
                                        Active
                                    </option>

                                    <option
                                        value="0"
                                        @selected(old('status') === '0')
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
                                class="btn btn-primary"
                            >

                                <i class="fas fa-save"></i>
                                Save Menu

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection