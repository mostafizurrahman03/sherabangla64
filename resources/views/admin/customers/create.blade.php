@extends('layouts.master')

@section('content')

@include('admin.components.alert')

<!-- Content Header -->
<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>Create Customer</h1>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">

                        <a href="{{ route('admin.customers.index') }}">
                            Customers
                        </a>

                    </li>

                    <li class="breadcrumb-item active">
                        Create Customer
                    </li>

                </ol>

            </div>

        </div>

    </div>

</section>


<!-- Main Content -->
<section class="content">

    <div class="container-fluid">

        <!-- IMPORTANT:
             Form starts BEFORE the columns
             -->

        <form
            action="{{ route('admin.customers.store') }}"
            method="POST"
        >

            @csrf


            <div class="row">


                <!-- ====================================== -->
                <!-- LEFT COLUMN -->
                <!-- ====================================== -->

                <div class="col-md-8">

                    <div class="card card-primary">


                        <div class="card-header">

                            <h3 class="card-title">

                                <i class="fas fa-user-plus"></i>

                                Create New Customer

                            </h3>

                        </div>


                        <div class="card-body">


                            <!-- Name -->
                            <div class="form-group">

                                <label for="name">

                                    Full Name

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter customer name"
                                    value="{{ old('name') }}"
                                    required
                                >


                                @error('name')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <!-- Email -->
                            <div class="form-group">

                                <label for="email">

                                    Email Address

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter email address"
                                    value="{{ old('email') }}"
                                    required
                                >


                                @error('email')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <!-- Phone -->
                            <div class="form-group">

                                <label for="phone_number">
                                    Phone Number
                                </label>


                                <input
                                    type="text"
                                    name="phone_number"
                                    id="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    placeholder="Enter phone number"
                                    value="{{ old('phone_number') }}"
                                >


                                @error('phone_number')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <!-- Password -->
                            <div class="form-group">

                                <label for="password">

                                    Password

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter password (min 8 characters)"
                                    required
                                >


                                @error('password')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <!-- Confirm Password -->
                            <div class="form-group">

                                <label for="password_confirmation">

                                    Confirm Password

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Confirm password"
                                    required
                                >


                                @error('password_confirmation')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <!-- Address -->
                            <div class="form-group">

                                <label for="address">

                                    Address

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <textarea
                                    name="address"
                                    id="address"
                                    rows="4"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="Enter complete address"
                                    required
                                >{{ old('address') }}</textarea>


                                @error('address')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                        </div>

                    </div>

                </div>


                <!-- ====================================== -->
                <!-- RIGHT COLUMN -->
                <!-- ====================================== -->

                <div class="col-md-4">


                    <div class="card card-secondary">


                        <div class="card-header">

                            <h3 class="card-title">

                                <i class="fas fa-map-marker-alt"></i>

                                Location & Settings

                            </h3>

                        </div>


                        <div class="card-body">


                            <!-- ============================ -->
                            <!-- DISTRICT -->
                            <!-- ============================ -->

                            <div class="form-group">

                                <label for="district_id">

                                    District

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <select
                                    name="district_id"
                                    id="district_id"
                                    class="form-control @error('district_id') is-invalid @enderror"
                                    required
                                >

                                    <option value="">
                                        Select District
                                    </option>


                                    @foreach($districts as $district)

                                        <option
                                            value="{{ $district->id }}"
                                            @selected(
                                                old('district_id') == $district->id
                                            )
                                        >

                                            {{ $district->name }}

                                        </option>

                                    @endforeach

                                </select>


                                @error('district_id')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <!-- ============================ -->
                            <!-- THANA -->
                            <!-- ============================ -->

                            <div class="form-group">

                                <label for="thana_id">

                                    Thana

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <select
                                    name="thana_id"
                                    id="thana_id"
                                    class="form-control @error('thana_id') is-invalid @enderror"
                                    required
                                >

                                    <option value="">
                                        Select Thana
                                    </option>

                                </select>


                                @error('thana_id')

                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            <hr>


                            <!-- ============================ -->
                            <!-- VERIFIED -->
                            <!-- ============================ -->

                            <div class="form-group">

                                <div class="custom-control custom-switch">

                                    <input
                                        type="checkbox"
                                        name="is_verified"
                                        id="is_verified"
                                        class="custom-control-input"
                                        value="1"
                                        @checked(
                                            old('is_verified', false)
                                        )
                                    >


                                    <label
                                        class="custom-control-label"
                                        for="is_verified"
                                    >

                                        <strong>
                                            Verified
                                        </strong>

                                    </label>

                                </div>


                                <small class="text-muted">

                                    Mark this customer as verified.

                                </small>

                            </div>


                            <!-- ============================ -->
                            <!-- ACTIVE -->
                            <!-- ============================ -->

                            <div class="form-group">

                                <div class="custom-control custom-switch">

                                    <input
                                        type="checkbox"
                                        name="is_active"
                                        id="is_active"
                                        class="custom-control-input"
                                        value="1"
                                        @checked(
                                            old('is_active', true)
                                        )
                                    >


                                    <label
                                        class="custom-control-label"
                                        for="is_active"
                                    >

                                        <strong>
                                            Active
                                        </strong>

                                    </label>

                                </div>


                                <small class="text-muted">

                                    Enable to activate this customer.

                                </small>

                            </div>


                        </div>

                    </div>

                </div>


                <!-- ====================================== -->
                <!-- BUTTONS -->
                <!-- ====================================== -->

                <div class="col-12">

                    <div class="card-footer">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i class="fas fa-save"></i>

                            Create Customer

                        </button>


                        <a
                            href="{{ route('admin.customers.index') }}"
                            class="btn btn-secondary"
                        >

                            <i class="fas fa-arrow-left"></i>

                            Cancel

                        </a>

                    </div>

                </div>


            </div>


        </form>

    </div>

</section>

@endsection


@push('js')

<script>

$(document).ready(function () {


    /*
    |--------------------------------------------------------------------------
    | District Change
    |--------------------------------------------------------------------------
    */

    $('#district_id').on('change', function () {

        let districtId = $(this).val();

        let thanaDropdown = $('#thana_id');


        // Reset
        thanaDropdown.html(
            '<option value="">Loading...</option>'
        );


        // No district
        if (!districtId) {

            thanaDropdown.html(
                '<option value="">Select Thana</option>'
            );

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | AJAX
        |--------------------------------------------------------------------------
        */

        $.ajax({

            url: '{{ route("admin.customers.get-thanas") }}',

            type: 'GET',

            data: {
                district_id: districtId
            },


            success: function (data) {

                thanaDropdown.html(
                    '<option value="">Select Thana</option>'
                );


                if (!data.length) {

                    thanaDropdown.html(
                        '<option value="">No Thana Found</option>'
                    );

                    return;
                }


                $.each(data, function (index, thana) {

                    thanaDropdown.append(

                        $('<option>', {

                            value: thana.id,

                            text: thana.name

                        })

                    );

                });

            },


            error: function (xhr) {

                console.log(
                    'Thana AJAX Error:',
                    xhr.responseText
                );


                thanaDropdown.html(
                    '<option value="">Unable to load Thana</option>'
                );

            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Load Old Thana After Validation Error
    |--------------------------------------------------------------------------
    */

    let oldDistrictId =
        '{{ old("district_id") }}';

    let oldThanaId =
        '{{ old("thana_id") }}';


    if (oldDistrictId) {

        $('#district_id').trigger('change');


        // Wait for AJAX response
        $(document).ajaxComplete(function () {

            if (oldThanaId) {

                $('#thana_id').val(
                    oldThanaId
                );

            }

        });

    }


});

</script>

@endpush