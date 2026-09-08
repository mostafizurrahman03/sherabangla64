@extends('layouts.master')

@section('title', 'Edit Coupon')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>Edit Coupon</h1>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.coupons.index') }}">
                            Coupons
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

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-edit"></i>

                    Edit Coupon:
                    {{ $coupon->coupon_code }}

                </h3>

            </div>


            <form
                action="{{ route(
                    'admin.coupons.update',
                    $coupon->coupon_id
                ) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <div class="card-body">

                    <div class="row">

                        <!-- Coupon Code -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Coupon Code
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="coupon_code"
                                    class="form-control @error('coupon_code') is-invalid @enderror"
                                    value="{{ old(
                                        'coupon_code',
                                        $coupon->coupon_code
                                    ) }}"
                                    maxlength="50"
                                    required
                                >

                                @error('coupon_code')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Coupon Type -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Coupon Type
                                    <span class="text-danger">*</span>
                                </label>

                                <select
                                    name="coupon_type"
                                    class="form-control @error('coupon_type') is-invalid @enderror"
                                    required
                                >

                                    <option value="">
                                        Select Coupon Type
                                    </option>

                                    <option
                                        value="PERCENTAGE"
                                        @selected(
                                            old(
                                                'coupon_type',
                                                $coupon->coupon_type
                                            ) === 'PERCENTAGE'
                                        )
                                    >
                                        Percentage
                                    </option>

                                    <option
                                        value="FIXED_AMOUNT"
                                        @selected(
                                            old(
                                                'coupon_type',
                                                $coupon->coupon_type
                                            ) === 'FIXED_AMOUNT'
                                        )
                                    >
                                        Fixed Amount
                                    </option>

                                    <option
                                        value="FREE_SHIPPING"
                                        @selected(
                                            old(
                                                'coupon_type',
                                                $coupon->coupon_type
                                            ) === 'FREE_SHIPPING'
                                        )
                                    >
                                        Free Shipping
                                    </option>

                                </select>

                                @error('coupon_type')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Discount Value -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Discount Value
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="discount_value"
                                    class="form-control @error('discount_value') is-invalid @enderror"
                                    value="{{ old(
                                        'discount_value',
                                        $coupon->discount_value
                                    ) }}"
                                    min="0"
                                    step="0.0001"
                                    required
                                >

                                @error('discount_value')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Maximum Discount -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Maximum Discount Amount
                                </label>

                                <input
                                    type="number"
                                    name="max_discount_amount"
                                    class="form-control @error('max_discount_amount') is-invalid @enderror"
                                    value="{{ old(
                                        'max_discount_amount',
                                        $coupon->max_discount_amount
                                    ) }}"
                                    min="0"
                                    step="0.0001"
                                >

                                @error('max_discount_amount')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Minimum Order -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Minimum Order Amount
                                </label>

                                <input
                                    type="number"
                                    name="minimum_order_amount"
                                    class="form-control @error('minimum_order_amount') is-invalid @enderror"
                                    value="{{ old(
                                        'minimum_order_amount',
                                        $coupon->minimum_order_amount
                                    ) }}"
                                    min="0"
                                    step="0.0001"
                                >

                                @error('minimum_order_amount')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Usage Limit -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Total Usage Limit
                                </label>

                                <input
                                    type="number"
                                    name="usage_limit"
                                    class="form-control @error('usage_limit') is-invalid @enderror"
                                    value="{{ old(
                                        'usage_limit',
                                        $coupon->usage_limit
                                    ) }}"
                                    min="1"
                                >

                                <small class="text-muted">
                                    Leave empty for unlimited.
                                </small>

                                @error('usage_limit')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Per User Limit -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Per User Limit
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="per_user_limit"
                                    class="form-control @error('per_user_limit') is-invalid @enderror"
                                    value="{{ old(
                                        'per_user_limit',
                                        $coupon->per_user_limit
                                    ) }}"
                                    min="1"
                                    required
                                >

                                @error('per_user_limit')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Valid From -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Valid From
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="datetime-local"
                                    name="valid_from"
                                    class="form-control @error('valid_from') is-invalid @enderror"
                                    value="{{ old(
                                        'valid_from',
                                        $coupon->valid_from?->format('Y-m-d\TH:i')
                                    ) }}"
                                    required
                                >

                                @error('valid_from')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Valid To -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Valid To
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="datetime-local"
                                    name="valid_to"
                                    class="form-control @error('valid_to') is-invalid @enderror"
                                    value="{{ old(
                                        'valid_to',
                                        $coupon->valid_to?->format('Y-m-d\TH:i')
                                    ) }}"
                                    required
                                >

                                @error('valid_to')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <!-- Status -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <div class="custom-control custom-switch">

                                    <input
                                        type="checkbox"
                                        name="is_active"
                                        value="1"
                                        class="custom-control-input"
                                        id="is_active"
                                        @checked(old(
                                            'is_active',
                                            $coupon->is_active
                                        ))
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

                </div>


                <div class="card-footer">

                    <a
                        href="{{ route('admin.coupons.index') }}"
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
                        Update Coupon
                    </button>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection