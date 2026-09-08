@extends('layouts.master')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>
                    <i class="fas fa-edit mr-2"></i>
                    Edit Order
                </h1>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.orders.index') }}">
                            Orders
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

        {{-- Error --}}
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


        <form action="{{ route('admin.orders.update', $order->id) }}"
              method="POST">

            @csrf
            @method('PUT')


            <div class="row">


                {{-- =====================================================
                    LEFT SIDE
                ====================================================== --}}

                <div class="col-md-8">


                    {{-- Customer --}}
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

                                        <label>
                                            Customer
                                        </label>

                                        <select name="customer_id"
                                                id="customer_id"
                                                class="form-control">

                                            <option value="">
                                                -- Guest Customer --
                                            </option>

                                            @foreach($customers as $customer)

                                                <option value="{{ $customer->id }}"
                                                    {{ old('customer_id', $order->customer_id) == $customer->id ? 'selected' : '' }}>

                                                    {{ $customer->name }}
                                                    -
                                                    {{ $customer->phone_number ?? $customer->phone ?? 'N/A' }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>


                                {{-- Name --}}
                                <!-- <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Shipping Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text"
                                               name="shipping_name"
                                               value="{{ old('shipping_name', $order->shipping_name) }}"
                                               class="form-control @error('shipping_name') is-invalid @enderror">

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
                                               value="{{ old('shipping_phone', $order->shipping_phone) }}"
                                               class="form-control @error('shipping_phone') is-invalid @enderror">

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
                                               value="{{ old('shipping_email', $order->shipping_email) }}"
                                               class="form-control">

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
                                                  class="form-control @error('shipping_address') is-invalid @enderror">{{ old('shipping_address', $order->shipping_address) }}</textarea>

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


                    {{-- Order Items --}}
                    <div class="card">

                        <div class="card-header">

                            <h3 class="card-title">
                                <i class="fas fa-boxes mr-1"></i>
                                Order Items
                            </h3>

                            <div class="card-tools">
                                <button type="button"
                                        class="btn btn-success btn-sm"
                                        id="addItem">
                                    <i class="fas fa-plus mr-1"></i>
                                    Add Item
                                </button>
                            </div>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped" id="itemsTable">

                                    <thead>
                                        <tr>
                                            <th width="30">#</th>
                                            <th>Product</th>
                                            <th width="100">Price</th>
                                            <th width="80">Qty</th>
                                            <th width="100">Discount</th>
                                            <th width="110">Total</th>
                                            <th width="40">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="itemsBody">

                                        @php $itemIndex = 0; @endphp

                                        @foreach($order->items as $item)

                                            <tr class="item-row">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    <input type="hidden"
                                                           name="items[{{ $itemIndex }}][id]"
                                                           value="{{ $item->id }}">

                                                    <select name="items[{{ $itemIndex }}][product_id]"
                                                            class="form-control product-select">

                                                        <option value="">Custom Product</option>

                                                        @foreach($products as $product)

                                                            <option value="{{ $product->id }}"
                                                                data-price="{{ $product->price }}"
                                                                {{ $item->product_id == $product->id ? 'selected' : '' }}>

                                                                {{ $product->name }}

                                                            </option>

                                                        @endforeach

                                                    </select>

                                                    <input type="text"
                                                           name="items[{{ $itemIndex }}][product_name]"
                                                           class="form-control mt-1 product-name-input"
                                                           placeholder="Product name"
                                                           value="{{ old("items.{$itemIndex}.product_name", $item->product_name) }}">

                                                </td>
                                                <td>
                                                    <input type="number"
                                                           step="0.0001"
                                                           name="items[{{ $itemIndex }}][unit_price]"
                                                           class="form-control unit-price"
                                                           value="{{ old("items.{$itemIndex}.unit_price", $item->unit_price) }}"
                                                           min="0">
                                                </td>
                                                <td>
                                                    <input type="number"
                                                           name="items[{{ $itemIndex }}][quantity]"
                                                           class="form-control quantity"
                                                           value="{{ old("items.{$itemIndex}.quantity", $item->quantity) }}"
                                                           min="1">
                                                </td>
                                                <td>
                                                    <input type="number"
                                                           step="0.0001"
                                                           name="items[{{ $itemIndex }}][discount_amount]"
                                                           class="form-control item-discount"
                                                           value="{{ old("items.{$itemIndex}.discount_amount", $item->discount_amount) }}"
                                                           min="0">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control item-total"
                                                           value="{{ number_format($item->total_price, 2) }}"
                                                           readonly
                                                           style="font-weight:bold; background:#f8f9fa;">
                                                </td>
                                                <td class="text-center">
                                                    <button type="button"
                                                            class="btn btn-danger btn-sm remove-item">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            @php $itemIndex++; @endphp

                                        @endforeach

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th colspan="5" class="text-right">Total Items:</th>
                                            <th id="totalItemsCount">{{ $order->items->count() }}</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>

                                </table>

                            </div>

                        </div>

                    </div>


                    {{-- Payment --}}
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
                                        </label>

                                        <select name="payment_method"
                                                class="form-control">

                                            @foreach($paymentMethods as $key => $label)

                                                <option value="{{ $key }}"
                                                    {{ old('payment_method', $order->payment_method) == $key ? 'selected' : '' }}>

                                                    {{ $label }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>


                                {{-- Payment Status --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Payment Status
                                        </label>

                                        <select name="payment_status"
                                                class="form-control">

                                            @foreach($paymentStatuses as $key => $label)

                                                <option value="{{ $key }}"
                                                    {{ old('payment_status', $order->payment_status) == $key ? 'selected' : '' }}>

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
                                               value="{{ $order->paid_at ? $order->paid_at->format('Y-m-d\TH:i') : '' }}"
                                               class="form-control">

                                    </div>

                                </div>


                                {{-- Shipped At --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Shipped At
                                        </label>

                                        <input type="datetime-local"
                                               name="shipped_at"
                                               value="{{ $order->shipped_at ? $order->shipped_at->format('Y-m-d\TH:i') : '' }}"
                                               class="form-control">

                                    </div>

                                </div>


                                {{-- Delivered At --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Delivered At
                                        </label>

                                        <input type="datetime-local"
                                               name="delivered_at"
                                               value="{{ $order->delivered_at ? $order->delivered_at->format('Y-m-d\TH:i') : '' }}"
                                               class="form-control">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Order Note --}}
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
                                      placeholder="Internal order note...">{{ old('order_note', $order->order_note) }}</textarea>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    RIGHT SIDE
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


                            {{-- Order Number --}}
                            <div class="form-group">

                                <label>
                                    Order Number
                                </label>

                                <input type="text"
                                       value="{{ $order->order_number }}"
                                       class="form-control"
                                       readonly>

                            </div>


                            {{-- Subtotal --}}
                            <div class="form-group">

                                <label>
                                    Subtotal
                                </label>

                                <input type="number"
                                       step="0.0001"
                                       name="subtotal"
                                       id="subtotal"
                                       value="{{ old('subtotal', $order->subtotal) }}"
                                       class="form-control"
                                       readonly>

                            </div>


                            {{-- Shipping --}}
                            <div class="form-group">

                                <label>
                                    Shipping Fee
                                </label>

                                <input type="number"
                                       step="0.0001"
                                       name="shipping_fee"
                                       id="shipping_fee"
                                       value="{{ old('shipping_fee', $order->shipping_fee) }}"
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
                                            data-code="{{ $coupon->coupon_code }}"
                                            {{ old('coupon_id', $order->coupon_id) == $coupon->id ? 'selected' : '' }}>

                                            {{ $coupon->coupon_code }}

                                            -
                                            {{ $coupon->coupon_type == 'percentage'
                                                ? $coupon->discount_value . '%'
                                                : '৳ ' . number_format($coupon->discount_value, 2)
                                            }}

                                        </option>

                                    @endforeach

                                </select>

                                <input type="hidden"
                                       name="coupon_code"
                                       id="coupon_code"
                                       value="{{ old('coupon_code', $order->coupon_code) }}">

                            </div>


                            {{-- Discount --}}
                            <div class="form-group">

                                <label>
                                    Discount Amount
                                </label>

                                <input type="number"
                                       step="0.0001"
                                       name="discount_amount"
                                       id="discount_amount"
                                       value="{{ old('discount_amount', $order->discount_amount) }}"
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
                                       name="grand_total"
                                       id="grand_total"
                                       value="{{ old('grand_total', $order->grand_total) }}"
                                       class="form-control form-control-lg font-weight-bold"
                                       readonly>

                            </div>


                            {{-- Order Status --}}
                            <div class="form-group">

                                <label>
                                    Order Status
                                </label>

                                <select name="order_status"
                                        class="form-control">

                                    @foreach($orderStatuses as $key => $label)

                                        <option value="{{ $key }}"
                                            {{ old('order_status', $order->order_status) == $key ? 'selected' : '' }}>

                                            {{ $label }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- Buttons --}}
                    <div class="card">

                        <div class="card-body">

                            <button type="submit"
                                    class="btn btn-primary btn-block">

                                <i class="fas fa-save mr-1"></i>
                                Update Order

                            </button>


                            <a href="{{ route('admin.orders.show', $order->id) }}"
                               class="btn btn-info btn-block">

                                <i class="fas fa-eye mr-1"></i>
                                View Order

                            </a>


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

    let itemIndex = {{ count($order->items) }};

    /*
    |--------------------------------------------------------------------------
    | Add Item
    |--------------------------------------------------------------------------
    */
    $('#addItem').on('click', function () {

        const row = `
            <tr class="item-row">
                <td class="text-center">${itemIndex + 1}</td>
                <td>
                    <select name="items[${itemIndex}][product_id]"
                            class="form-control product-select">

                        <option value="">Custom Product</option>

                        @foreach($products as $product)
                            <option value="{{ $product->id }}"
                                    data-price="{{ $product->price }}">
                                {{ $product->name }}
                            </option>
                        @endforeach

                    </select>

                    <input type="text"
                           name="items[${itemIndex}][product_name]"
                           class="form-control mt-1 product-name-input"
                           placeholder="Product name">
                </td>
                <td>
                    <input type="number"
                           step="0.0001"
                           name="items[${itemIndex}][unit_price]"
                           class="form-control unit-price"
                           value="0"
                           min="0">
                </td>
                <td>
                    <input type="number"
                           name="items[${itemIndex}][quantity]"
                           class="form-control quantity"
                           value="1"
                           min="1">
                </td>
                <td>
                    <input type="number"
                           step="0.0001"
                           name="items[${itemIndex}][discount_amount]"
                           class="form-control item-discount"
                           value="0"
                           min="0">
                </td>
                <td>
                    <input type="text"
                           class="form-control item-total"
                           value="0.00"
                           readonly
                           style="font-weight:bold; background:#f8f9fa;">
                </td>
                <td class="text-center">
                    <button type="button"
                            class="btn btn-danger btn-sm remove-item">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;

        $('#itemsBody').append(row);
        itemIndex++;
        updateRowNumbers();
        updateTotalItems();
    });


    /*
    |--------------------------------------------------------------------------
    | Remove Item
    |--------------------------------------------------------------------------
    */
    $(document).on('click', '.remove-item', function () {

        if ($('.item-row').length <= 1) {
            alert('At least one item is required.');
            return;
        }

        if (confirm('Are you sure you want to remove this item?')) {
            $(this).closest('tr').remove();
            updateRowNumbers();
            updateTotalItems();
            calculateGrandTotal();
        }
    });


    /*
    |--------------------------------------------------------------------------
    | Product Select Change - Auto fill name and price
    |--------------------------------------------------------------------------
    */
    $(document).on('change', '.product-select', function () {

        const selectedOption = $(this).find(':selected');
        const price = selectedOption.data('price') || 0;
        const row = $(this).closest('tr');

        const productName = selectedOption.text().trim();
        if (selectedOption.val() !== '') {
            row.find('.product-name-input').val(productName);
        } else {
            row.find('.product-name-input').val('');
        }

        row.find('.unit-price').val(price);
        calculateItemTotal(row);
        calculateGrandTotal();
    });


    /*
    |--------------------------------------------------------------------------
    | Calculate Item Total
    |--------------------------------------------------------------------------
    */
    $(document).on('input', '.unit-price, .quantity, .item-discount', function () {

        const row = $(this).closest('tr');
        calculateItemTotal(row);
        calculateGrandTotal();
        updateTotalItems();
    });


    function calculateItemTotal(row) {

        const unitPrice = parseFloat(row.find('.unit-price').val()) || 0;
        const quantity = parseInt(row.find('.quantity').val()) || 1;
        const discount = parseFloat(row.find('.item-discount').val()) || 0;

        const total = (unitPrice * quantity) - discount;
        const finalTotal = total < 0 ? 0 : total;

        row.find('.item-total').val(finalTotal.toFixed(2));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Row Numbers
    |--------------------------------------------------------------------------
    */
    function updateRowNumbers() {

        $('.item-row').each(function (index) {
            $(this).find('td:first').text(index + 1);
        });
    }


    /*
    |--------------------------------------------------------------------------
    | Update Total Items
    |--------------------------------------------------------------------------
    */
    function updateTotalItems() {

        const count = $('.item-row').length;
        $('#totalItemsCount').text(count);
    }


    /*
    |--------------------------------------------------------------------------
    | Calculate Grand Total
    |--------------------------------------------------------------------------
    */
    function calculateGrandTotal() {

        let subtotal = 0;

        $('.item-row').each(function () {

            const total = parseFloat($(this).find('.item-total').val()) || 0;
            subtotal += total;
        });

        const shipping = parseFloat($('#shipping_fee').val()) || 0;
        const discount = parseFloat($('#discount_amount').val()) || 0;

        let grandTotal = subtotal + shipping - discount;
        grandTotal = grandTotal < 0 ? 0 : grandTotal;

        $('#subtotal').val(subtotal.toFixed(4));
        $('#grand_total').val(grandTotal.toFixed(4));
    }


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
    | On Load - Calculate Totals
    |--------------------------------------------------------------------------
    */
    $('.item-row').each(function () {
        calculateItemTotal($(this));
    });

    calculateGrandTotal();
    updateTotalItems();

});

</script>

@endpush