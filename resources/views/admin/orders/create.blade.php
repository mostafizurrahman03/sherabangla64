@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-plus-circle mr-2"></i>
                    Create Order
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.orders.index') }}">
                            Orders
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

        {{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button"
                        class="close"
                        data-dismiss="alert">
                    &times;
                </button>

                <i class="fas fa-exclamation-circle mr-1"></i>

                {{ session('error') }}
            </div>
        @endif


        {{-- Validation Errors --}}
        @if($errors->any())

            <div class="alert alert-danger">

                <h5>
                    <i class="fas fa-exclamation-triangle mr-1"></i>
                    Please fix the following errors:
                </h5>

                <ul class="mb-0">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <form action="{{ route('admin.orders.store') }}"
              method="POST">

            @csrf

            <div class="row">

                {{-- =====================================================
                    CUSTOMER INFORMATION
                ====================================================== --}}

                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user mr-1"></i>
                                Customer Information
                            </h3>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- Customer --}}
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="customer_id">
                                            Customer
                                        </label>

                                        <select name="customer_id"
                                                id="customer_id"
                                                class="form-control @error('customer_id') is-invalid @enderror">

                                            <option value="">
                                                -- Guest / Select Customer --
                                            </option>

                                            @foreach($customers as $customer)

                                                <option value="{{ $customer->id }}"
                                                    {{ old('customer_id') == $customer->id ? 'selected' : '' }}>

                                                    {{ $customer->name }}
                                                    -
                                                    {{ $customer->phone_number }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('customer_id')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Shipping Name --}}
                                <!-- <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Shipping Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text"
                                               name="shipping_name"
                                               value="{{ old('shipping_name') }}"
                                               class="form-control @error('shipping_name') is-invalid @enderror"
                                               placeholder="Customer name">

                                        @error('shipping_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div> -->


                                {{-- Phone --}}
                                <!-- <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Shipping Phone
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text"
                                               name="shipping_phone"
                                               value="{{ old('shipping_phone') }}"
                                               class="form-control @error('shipping_phone') is-invalid @enderror"
                                               placeholder="01XXXXXXXXX">

                                        @error('shipping_phone')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div> -->


                                {{-- Email --}}
                                <!-- <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Shipping Email
                                        </label>

                                        <input type="email"
                                               name="shipping_email"
                                               value="{{ old('shipping_email') }}"
                                               class="form-control @error('shipping_email') is-invalid @enderror"
                                               placeholder="customer@example.com">

                                        @error('shipping_email')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div> -->


                                {{-- District --}}
                                <!-- <div class="col-md-3">

                                    <div class="form-group">

                                        <label>
                                            District
                                        </label>

                                        <input type="text"
                                               name="district_name"
                                               value="{{ old('district_name') }}"
                                               class="form-control"
                                               placeholder="District">

                                    </div>

                                </div> -->


                                {{-- Thana --}}
                                <!-- <div class="col-md-3">

                                    <div class="form-group">

                                        <label>
                                            Thana
                                        </label>

                                        <input type="text"
                                               name="thana_name"
                                               value="{{ old('thana_name') }}"
                                               class="form-control"
                                               placeholder="Thana">

                                    </div>

                                </div> -->


                                {{-- Address --}}
                                <!-- <div class="col-md-12">

                                    <div class="form-group">

                                        <label>
                                            Shipping Address
                                            <span class="text-danger">*</span>
                                        </label>

                                        <textarea name="shipping_address"
                                                  rows="3"
                                                  class="form-control @error('shipping_address') is-invalid @enderror"
                                                  placeholder="Full shipping address">{{ old('shipping_address') }}</textarea>

                                        @error('shipping_address')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div> -->

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                        PAYMENT INFORMATION
                    ====================================================== --}}

                    <div class="card">

                        <div class="card-header">

                            <h3 class="card-title">
                                <i class="fas fa-credit-card mr-1"></i>
                                Payment Information
                            </h3>

                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- Payment Method --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Payment Method
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select name="payment_method"
                                                class="form-control @error('payment_method') is-invalid @enderror">

                                            @foreach($paymentMethods as $key => $label)

                                                <option value="{{ $key }}"
                                                    {{ old('payment_method', 'COD') == $key ? 'selected' : '' }}>

                                                    {{ $label }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('payment_method')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Payment Status --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Payment Status
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select name="payment_status"
                                                id="payment_status"
                                                class="form-control">

                                            @foreach($paymentStatuses as $key => $label)

                                                <option value="{{ $key }}"
                                                    {{ old('payment_status', 'PENDING') == $key ? 'selected' : '' }}>

                                                    {{ $label }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>


                                {{-- Paid At --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Paid At
                                        </label>

                                        <input type="datetime-local"
                                               name="paid_at"
                                               value="{{ old('paid_at') }}"
                                               class="form-control">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =====================================================
                        ORDER NOTE
                    ====================================================== --}}

                    <div class="card">

                        <div class="card-header">

                            <h3 class="card-title">
                                <i class="fas fa-sticky-note mr-1"></i>
                                Order Note
                            </h3>

                        </div>

                        <div class="card-body">

                            <textarea name="order_note"
                                      rows="4"
                                      class="form-control"
                                      placeholder="Internal order note...">{{ old('order_note') }}</textarea>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    ORDER SUMMARY
                ====================================================== --}}

                <div class="col-md-4">

                    <div class="card">

                        <div class="card-header">

                            <h3 class="card-title">
                                <i class="fas fa-file-invoice-dollar mr-1"></i>
                                Order Summary
                            </h3>

                        </div>


                        <div class="card-body">

                            {{-- Subtotal --}}
                            <div class="form-group">

                                <label>
                                    Subtotal
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="number"
                                       step="0.0001"
                                       min="0"
                                       name="subtotal"
                                       id="subtotal"
                                       value="{{ old('subtotal', 0) }}"
                                       class="form-control @error('subtotal') is-invalid @enderror">

                                @error('subtotal')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>


                            {{-- Shipping --}}
                            <div class="form-group">

                                <label>
                                    Shipping Fee
                                </label>

                                <input type="number"
                                       step="0.0001"
                                       min="0"
                                       name="shipping_fee"
                                       id="shipping_fee"
                                       value="{{ old('shipping_fee', 0) }}"
                                       class="form-control">

                            </div>


                            {{-- Coupon --}}
                            <div class="form-group">

                                <label>
                                    Coupon
                                </label>

                                <select name="coupon_id"
                                        id="coupon_id"
                                        class="form-control">

                                    <option value="">
                                        -- No Coupon --
                                    </option>

                                    @foreach($coupons as $coupon)

                                        <option value="{{ $coupon->id }}"
                                            data-code="{{ $coupon->code }}"
                                            {{ old('coupon_id') == $coupon->id ? 'selected' : '' }}>

                                            {{ $coupon->code }}

                                            -
                                            {{ $coupon->discount_type == 'percentage'
                                                ? $coupon->discount_value . '%'
                                                : '৳ ' . number_format($coupon->discount_value, 2)
                                            }}

                                        </option>

                                    @endforeach

                                </select>

                                <input type="hidden"
                                       name="coupon_code"
                                       id="coupon_code"
                                       value="{{ old('coupon_code') }}">

                            </div>


                            {{-- Discount --}}
                            <div class="form-group">

                                <label>
                                    Discount Amount
                                </label>

                                <input type="number"
                                       step="0.0001"
                                       min="0"
                                       name="discount_amount"
                                       id="discount_amount"
                                       value="{{ old('discount_amount', 0) }}"
                                       class="form-control">

                            </div>


                            <hr>


                            {{-- Grand Total --}}
                            <div class="form-group">

                                <label class="font-weight-bold">
                                    Grand Total
                                </label>

                                <input type="number"
                                       step="0.0001"
                                       min="0"
                                       name="grand_total"
                                       id="grand_total"
                                       value="{{ old('grand_total', 0) }}"
                                       class="form-control form-control-lg font-weight-bold">

                            </div>


                            {{-- Order Status --}}
                            <div class="form-group">

                                <label>
                                    Order Status
                                    <span class="text-danger">*</span>
                                </label>

                                <select name="order_status"
                                        class="form-control">

                                    @foreach($orderStatuses as $key => $label)

                                        <option value="{{ $key }}"
                                            {{ old('order_status', 'PLACED') == $key ? 'selected' : '' }}>

                                            {{ $label }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="card">

                        <div class="card-body">

                            <button type="submit"
                                    class="btn btn-primary btn-block">

                                <i class="fas fa-save mr-1"></i>
                                Create Order

                            </button>


                            <a href="{{ route('admin.orders.index') }}"
                               class="btn btn-secondary btn-block">

                                <i class="fas fa-arrow-left mr-1"></i>
                                Back to Orders

                            </a>

                        </div>

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
    | Customer Auto Fill
    |--------------------------------------------------------------------------
    */

    $('#customer_id').on('change', function () {

        let selected = $(this).find(':selected');

        let text = selected.text().trim();

        if (!selected.val()) {
            return;
        }

        // Customer information is available in the option text.
        // Additional fields can be populated later through AJAX.

    });


    /*
    |--------------------------------------------------------------------------
    | Coupon Code
    |--------------------------------------------------------------------------
    */

    $('#coupon_id').on('change', function () {

        let code = $(this)
            .find(':selected')
            .data('code');

        $('#coupon_code').val(code || '');

    });


    /*
    |--------------------------------------------------------------------------
    | Calculate Grand Total
    |--------------------------------------------------------------------------
    */

    function calculateGrandTotal() {

        let subtotal =
            parseFloat($('#subtotal').val()) || 0;

        let shipping =
            parseFloat($('#shipping_fee').val()) || 0;

        let discount =
            parseFloat($('#discount_amount').val()) || 0;

        let total =
            subtotal + shipping - discount;

        if (total < 0) {
            total = 0;
        }

        $('#grand_total').val(total.toFixed(4));
    }


    $('#subtotal, #shipping_fee, #discount_amount')
        .on('input', calculateGrandTotal);


    /*
    |--------------------------------------------------------------------------
    | Payment Status
    |--------------------------------------------------------------------------
    */

    $('#payment_status').on('change', function () {

        if ($(this).val() === 'PAID') {

            let now = new Date();

            let year = now.getFullYear();

            let month = String(now.getMonth() + 1)
                .padStart(2, '0');

            let day = String(now.getDate())
                .padStart(2, '0');

            let hours = String(now.getHours())
                .padStart(2, '0');

            let minutes = String(now.getMinutes())
                .padStart(2, '0');

            $('#paid_at').val(
                year + '-' +
                month + '-' +
                day + 'T' +
                hours + ':' +
                minutes
            );

        }

    });

});

</script>

@endpush