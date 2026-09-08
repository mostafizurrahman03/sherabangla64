@extends('layouts.master')

@section('content')

    {{-- Page Header --}}
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Add Thana</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.thanas.index') }}">
                                Thanas
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Add Thana
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    {{-- Main Content --}}
    <section class="content">

        <div class="container-fluid">

            {{-- Validation Errors --}}
            @if($errors->any())

                <div class="alert alert-danger alert-dismissible fade show">

                    <button type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <h5>
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        Please fix the following errors:
                    </h5>

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Card --}}
            <div class="card">

                {{-- Card Header --}}
                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-map-marker-alt mr-1"></i>

                        Add New Thana

                    </h3>

                </div>


                {{-- Form --}}
                <form method="POST"
                      action="{{ route('admin.thanas.store') }}">

                    @csrf

                    <div class="card-body">

                        <div class="row">

                            {{-- District --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="district_id">

                                        District

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <select name="district_id"
                                            id="district_id"
                                            class="form-control @error('district_id') is-invalid @enderror"
                                            required>

                                        <option value="">
                                            Select District
                                        </option>


                                        @foreach($districts as $district)

                                            <option value="{{ $district->id }}"
                                                {{ old('district_id') == $district->id ? 'selected' : '' }}>

                                                {{ $district->name }}

                                                @if($district->code)
                                                    ({{ $district->code }})
                                                @endif

                                            </option>

                                        @endforeach

                                    </select>


                                    @error('district_id')

                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            {{-- Thana Name --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="name">

                                        Thana Name

                                        <span class="text-danger">
                                            *
                                        </span>

                                    </label>


                                    <input type="text"
                                           name="name"
                                           id="name"
                                           value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Enter thana name"
                                           maxlength="100"
                                           required>


                                    @error('name')

                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            {{-- Bengali Name --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="bn_name">
                                        Bengali Name
                                    </label>


                                    <input type="text"
                                           name="bn_name"
                                           id="bn_name"
                                           value="{{ old('bn_name') }}"
                                           class="form-control @error('bn_name') is-invalid @enderror"
                                           placeholder="Enter Bengali name"
                                           maxlength="100">


                                    @error('bn_name')

                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>

                                    @enderror

                                </div>

                            </div>


                            {{-- Code --}}
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="code">
                                        Code
                                    </label>


                                    <input type="text"
                                           name="code"
                                           id="code"
                                           value="{{ old('code') }}"
                                           class="form-control @error('code') is-invalid @enderror"
                                           placeholder="Enter thana code"
                                           maxlength="10">


                                    @error('code')

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


                                    <div class="custom-control custom-switch">

                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="is_active"
                                               name="is_active"
                                               value="1"
                                               {{ old('is_active', true) ? 'checked' : '' }}>


                                        <label class="custom-control-label"
                                               for="is_active">

                                            Active

                                        </label>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Card Footer --}}
                    <div class="card-footer">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fas fa-save mr-1"></i>

                            Save Thana

                        </button>


                        <a href="{{ route('admin.thanas.index') }}"
                           class="btn btn-secondary">

                            <i class="fas fa-arrow-left mr-1"></i>

                            Back

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </section>

@endsection


{{-- =========================================================
     Select2 CSS
========================================================= --}}
@push('css')

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

    <style>

        /*
        |--------------------------------------------------------------------------
        | Prevent Horizontal Overflow
        |--------------------------------------------------------------------------
        */

        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }


        .content-wrapper {
            overflow-x: hidden;
        }


        /*
        |--------------------------------------------------------------------------
        | Select2 Container
        |--------------------------------------------------------------------------
        */

        .select2-container {
            width: 100% !important;
            max-width: 100% !important;
        }


        /*
        |--------------------------------------------------------------------------
        | Select2 Single Select
        |--------------------------------------------------------------------------
        */

        .select2-container--default
        .select2-selection--single {

            width: 100% !important;

            height: 38px !important;

            border: 1px solid #ced4da !important;

            border-radius: 0.25rem !important;

            background-color: #ffffff !important;

        }


        /*
        |--------------------------------------------------------------------------
        | Selected Value
        |--------------------------------------------------------------------------
        */

        .select2-container--default
        .select2-selection--single
        .select2-selection__rendered {

            line-height: 36px !important;

            padding-left: 12px !important;

            padding-right: 35px !important;

            color: #495057 !important;

        }


        /*
        |--------------------------------------------------------------------------
        | Arrow
        |--------------------------------------------------------------------------
        */

        .select2-container--default
        .select2-selection--single
        .select2-selection__arrow {

            height: 36px !important;

            right: 5px !important;

        }


        /*
        |--------------------------------------------------------------------------
        | Dropdown
        |--------------------------------------------------------------------------
        */

        .select2-dropdown {

            box-sizing: border-box !important;

            max-width: 100% !important;

            border: 1px solid #ced4da !important;

        }


        /*
        |--------------------------------------------------------------------------
        | Search Area
        |--------------------------------------------------------------------------
        */

        .select2-search--dropdown {

            padding: 8px !important;

        }


        .select2-search--dropdown
        .select2-search__field {

            width: 100% !important;

            max-width: 100% !important;

            box-sizing: border-box !important;

            padding: 7px 10px !important;

            border: 1px solid #ced4da !important;

            border-radius: 3px !important;

            outline: none !important;

        }


        /*
        |--------------------------------------------------------------------------
        | Result List
        |--------------------------------------------------------------------------
        */

        .select2-results__options {

            max-height: 250px !important;

            overflow-y: auto !important;

            overflow-x: hidden !important;

        }


        /*
        |--------------------------------------------------------------------------
        | Highlighted Option
        |--------------------------------------------------------------------------
        */

        .select2-container--default
        .select2-results__option--highlighted[aria-selected] {

            background-color: #007bff !important;

            color: #ffffff !important;

        }


        /*
        |--------------------------------------------------------------------------
        | Box Sizing
        |--------------------------------------------------------------------------
        */

        .select2-container,
        .select2-container *,
        .select2-dropdown,
        .select2-dropdown * {

            box-sizing: border-box;

        }


        /*
        |--------------------------------------------------------------------------
        | Form Row Fix
        |--------------------------------------------------------------------------
        */

        .row {
            margin-right: -7.5px;
            margin-left: -7.5px;
        }


        .row > [class*="col-"] {
            padding-right: 7.5px;
            padding-left: 7.5px;
        }

    </style>

@endpush


{{-- =========================================================
     Select2 JS
========================================================= --}}
@push('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        $(document).ready(function () {

            $('#district_id').select2({

                placeholder: 'Select District',

                allowClear: true,

                width: '100%',

                dropdownParent: $('#district_id').closest('.form-group'),

                language: {

                    noResults: function () {
                        return 'No district found';
                    }

                }

            });

        });

    </script>

@endpush