@extends('layouts.master')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>
                    <i class="fas fa-file-invoice mr-2"></i>
                    Order Details
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
                        {{ $order->order_number }}
                    </li>

                </ol>

            </div>

        </div>

    </div>

</section>


<section class="content">

    <div class="container-fluid">


        {{-- Success --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                <button type="button"
                        class="close"
                        data-dismiss="alert">
                    &times;
                </button>

                <i class="fas fa-check-circle mr-1"></i>

                {{ session('success') }}

            </div>

        @endif


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


        {{-- =====================================================
            TOP ACTIONS
        ====================================================== --}}

        <div class="row mb-3">

            <div class="col-md-12">

                <a href="{{ route('admin.orders.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left mr-1"></i>
                    Back

                </a>


                @if($order->canUpdate())

                    <a href="{{ route('admin.orders.edit', $order->id) }}"
                       class="btn btn-primary">

                        <i class="fas fa-edit mr-1"></i>
                        Edit

                    </a>

                @endif


                <a href="{{ route('admin.orders.print', $order->id) }}"
                   target="_blank"
                   class="btn btn-dark">

                    <i class="fas fa-print mr-1"></i>
                    Print Invoice

                </a>


                @if($order->canCancel())

                    <button type="button"
                            class="btn btn-danger"
                            id="cancelOrder">

                        <i class="fas fa-times mr-1"></i>
                        Cancel Order

                    </button>

                @endif

            </div>

        </div>


        <div class="row">


            {{-- =====================================================
                ORDER INFORMATION
            ====================================================== --}}

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-shopping-cart mr-1"></i>

                            Order:
                            <strong>
                                {{ $order->order_number }}
                            </strong>

                        </h3>


                        <div class="card-tools">

                            <span class="badge {{ $order->status_badge ?? 'badge-secondary' }}">

                                {{ \App\Models\Order::ORDER_STATUSES[$order->order_status] ?? $order->order_status }}

                            </span>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="row">


                            <div class="col-md-6">

                                <strong>
                                    <i class="fas fa-hashtag mr-1"></i>
                                    Order Number
                                </strong>

                                <p class="text-muted">
                                    {{ $order->order_number }}
                                </p>

                            </div>


                            <div class="col-md-6">

                                <strong>
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    Order Date
                                </strong>

                                <p class="text-muted">
                                    {{ $order->created_at?->format('d M Y, h:i A') }}
                                </p>

                            </div>


                            <div class="col-md-6">

                                <strong>
                                    <i class="fas fa-credit-card mr-1"></i>
                                    Payment Method
                                </strong>

                                <p class="text-muted">

                                    {{ \App\Models\Order::PAYMENT_METHODS[$order->payment_method] ?? $order->payment_method }}

                                </p>

                            </div>


                            <div class="col-md-6">

                                <strong>
                                    <i class="fas fa-money-check-alt mr-1"></i>
                                    Payment Status
                                </strong>

                                <p>

                                    <span class="badge {{ $order->payment_status_badge ?? 'badge-secondary' }}">

                                        {{ \App\Models\Order::PAYMENT_STATUSES[$order->payment_status] ?? $order->payment_status }}

                                    </span>

                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    CUSTOMER (from Customer table)
                ====================================================== --}}

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-user mr-1"></i>
                            Customer Information

                        </h3>

                    </div>


                    <div class="card-body">

                        <div class="row">

                            @if($order->customer)

                                {{-- Customer from Customer table --}}
                                <div class="col-md-6">

                                    <strong>
                                        <i class="fas fa-user mr-1"></i>
                                        Name
                                    </strong>

                                    <p>
                                        {{ $order->customer->name ?? 'N/A' }}
                                    </p>

                                </div>


                                <div class="col-md-6">

                                    <strong>
                                        <i class="fas fa-phone mr-1"></i>
                                        Phone
                                    </strong>

                                    <p>
                                        {{ $order->customer->phone_number ?? $order->customer->phone ?? 'N/A' }}
                                    </p>

                                </div>


                                <div class="col-md-6">

                                    <strong>
                                        <i class="fas fa-envelope mr-1"></i>
                                        Email
                                    </strong>

                                    <p>
                                        {{ $order->customer->email ?? 'N/A' }}
                                    </p>

                                </div>


                                <div class="col-md-6">

                                    <strong>
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        Address
                                    </strong>

                                    <p>
                                        {{ $order->customer->address ?? 'N/A' }}
                                    </p>

                                </div>

                            @else

                                {{-- Guest Customer from order shipping info --}}
                                <div class="col-md-6">

                                    <strong>
                                        <i class="fas fa-user mr-1"></i>
                                        Name
                                    </strong>

                                    <p>
                                        {{ $order->shipping_name ?? 'N/A' }}
                                    </p>

                                </div>


                                <div class="col-md-6">

                                    <strong>
                                        <i class="fas fa-phone mr-1"></i>
                                        Phone
                                    </strong>

                                    <p>
                                        {{ $order->shipping_phone ?? 'N/A' }}
                                    </p>

                                </div>


                                <div class="col-md-6">

                                    <strong>
                                        <i class="fas fa-envelope mr-1"></i>
                                        Email
                                    </strong>

                                    <p>
                                        {{ $order->shipping_email ?? 'N/A' }}
                                    </p>

                                </div>

                            @endif


                            <div class="col-md-12">

                                <strong>
                                    <i class="fas fa-map-pin mr-1"></i>
                                    Shipping Address
                                </strong>

                                <p>
                                    {{ $order->shipping_address ?? 'N/A' }}
                                    @if($order->district_name)
                                        , {{ $order->district_name }}
                                    @endif
                                    @if($order->thana_name)
                                        , {{ $order->thana_name }}
                                    @endif
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    ORDER ITEMS (from OrderItem table)
                ====================================================== --}}

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-boxes mr-1"></i>
                            Order Items

                        </h3>

                        <div class="card-tools">
                            <span class="badge badge-info">
                                Total: {{ $order->items->count() }} items
                            </span>
                        </div>

                    </div>


                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped mb-0">

                                <thead>

                                    <tr>

                                        <th width="50">
                                            #
                                        </th>

                                        <th>
                                            Product
                                        </th>

                                        <th width="120" class="text-right">
                                            Unit Price
                                        </th>

                                        <th width="80" class="text-center">
                                            Qty
                                        </th>

                                        <th width="100" class="text-right">
                                            Discount
                                        </th>

                                        <th width="150" class="text-right">
                                            Total
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse($order->items as $index => $item)

                                        <tr>

                                            <td class="text-center">
                                                {{ $index + 1 }}
                                            </td>

                                            <td>

                                                @if($item->product)

                                                    <strong>
                                                        {{ $item->product->name ?? $item->product_name }}
                                                    </strong>

                                                    @if($item->product->sku)
                                                        <br>
                                                        <small class="text-muted">
                                                            SKU: {{ $item->product->sku }}
                                                        </small>
                                                    @endif

                                                @else

                                                    <strong>
                                                        {{ $item->product_name ?? 'Product Deleted' }}
                                                    </strong>

                                                    @if($item->product_id)
                                                        <br>
                                                        <small class="text-muted text-danger">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                            Product deleted
                                                        </small>
                                                    @endif

                                                @endif

                                            </td>

                                            <td class="text-right">
                                                ৳ {{ number_format($item->unit_price ?? 0, 2) }}
                                            </td>

                                            <td class="text-center">
                                                {{ $item->quantity ?? 0 }}
                                            </td>

                                            <td class="text-right text-danger">
                                                @if($item->discount_amount > 0)
                                                    - ৳ {{ number_format($item->discount_amount, 2) }}
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            <td class="text-right font-weight-bold">

                                                ৳ {{ number_format(
                                                    ($item->unit_price ?? 0) * ($item->quantity ?? 0) - ($item->discount_amount ?? 0),
                                                    2
                                                ) }}

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="6"
                                                class="text-center text-muted py-4">

                                                <i class="fas fa-box-open fa-2x mb-2 d-block"></i>

                                                No order items found.

                                            </td>

                                        </tr>

                                    @endforelse

                                </tbody>

                                <tfoot>

                                    <tr class="bg-light font-weight-bold">

                                        <th colspan="5" class="text-right">
                                            Total Items:
                                        </th>

                                        <th class="text-right">
                                            {{ $order->items->count() }}
                                        </th>

                                    </tr>

                                </tfoot>

                            </table>

                        </div>

                    </div>

                </div>


                {{-- =====================================================
                    NOTE
                ====================================================== --}}

                @if($order->order_note)

                    <div class="card">

                        <div class="card-header">

                            <h3 class="card-title">

                                <i class="fas fa-sticky-note mr-1"></i>
                                Order Note

                            </h3>

                        </div>

                        <div class="card-body">

                            {!! nl2br(e($order->order_note)) !!}

                        </div>

                    </div>

                @endif

            </div>


            {{-- =====================================================
                RIGHT SIDE
            ====================================================== --}}

            <div class="col-md-4">


                {{-- Amount --}}
                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-money-bill-wave mr-1"></i>
                            Order Summary

                        </h3>

                    </div>


                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                Subtotal
                            </span>

                            <strong>
                                ৳ {{ number_format($order->subtotal ?? 0, 2) }}
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                Shipping Fee
                            </span>

                            <strong>
                                ৳ {{ number_format($order->shipping_fee ?? 0, 2) }}
                            </strong>

                        </div>


                        @if(($order->discount_amount ?? 0) > 0)

                            <div class="d-flex justify-content-between mb-2 text-danger">

                                <span>
                                    Discount
                                </span>

                                <strong>
                                    - ৳ {{ number_format($order->discount_amount, 2) }}
                                </strong>

                            </div>

                        @endif


                        @if($order->coupon_code)

                            <div class="mb-2">

                                <small class="text-muted">
                                    Coupon
                                </small>

                                <br>

                                <span class="badge badge-info">
                                    <i class="fas fa-ticket-alt mr-1"></i>
                                    {{ $order->coupon_code }}
                                </span>

                            </div>

                        @endif


                        <hr>


                        <div class="d-flex justify-content-between">

                            <h5>
                                Grand Total
                            </h5>

                            <h5 class="text-success">

                                ৳ {{ number_format($order->grand_total ?? 0, 2) }}

                            </h5>

                        </div>

                    </div>

                </div>


                {{-- Status Update --}}
                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">
                            <i class="fas fa-tasks mr-1"></i>
                            Order Status
                        </h3>

                    </div>


                    <div class="card-body">

                        <div class="form-group">

                            <label>
                                Current Status
                            </label>

                            <select id="orderStatus"
                                    class="form-control">

                                @foreach(\App\Models\Order::ORDER_STATUSES as $key => $label)

                                    <option value="{{ $key }}"
                                        {{ $order->order_status == $key ? 'selected' : '' }}>

                                        {{ $label }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <button type="button"
                                id="updateStatus"
                                class="btn btn-primary btn-block">

                            <i class="fas fa-sync mr-1"></i>
                            Update Status

                        </button>

                    </div>

                </div>


                {{-- Timeline --}}
                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-history mr-1"></i>
                            Order Timeline

                        </h3>

                    </div>


                    <div class="card-body">

                        <ul class="list-unstyled timeline">

                            {{-- Order Placed --}}
                            <li class="mb-3">

                                <i class="fas fa-shopping-cart text-primary mr-2"></i>

                                <strong>
                                    Order Placed
                                </strong>

                                <br>

                                <small class="text-muted ml-4">

                                    <i class="far fa-clock mr-1"></i>
                                    {{ $order->created_at?->format('d M Y, h:i A') }}

                                </small>

                            </li>


                            {{-- Payment --}}
                            @if($order->paid_at)

                                <li class="mb-3">

                                    <i class="fas fa-check-circle text-success mr-2"></i>

                                    <strong>
                                        Payment Received
                                    </strong>

                                    <br>

                                    <small class="text-muted ml-4">

                                        <i class="far fa-clock mr-1"></i>
                                        {{ $order->paid_at->format('d M Y, h:i A') }}

                                    </small>

                                </li>

                            @endif


                            {{-- Shipped --}}
                            @if($order->shipped_at)

                                <li class="mb-3">

                                    <i class="fas fa-shipping-fast text-info mr-2"></i>

                                    <strong>
                                        Order Shipped
                                    </strong>

                                    <br>

                                    <small class="text-muted ml-4">

                                        <i class="far fa-clock mr-1"></i>
                                        {{ $order->shipped_at->format('d M Y, h:i A') }}

                                    </small>

                                </li>

                            @endif


                            {{-- Delivered --}}
                            @if($order->delivered_at)

                                <li class="mb-3">

                                    <i class="fas fa-box-open text-success mr-2"></i>

                                    <strong>
                                        Order Delivered
                                    </strong>

                                    <br>

                                    <small class="text-muted ml-4">

                                        <i class="far fa-clock mr-1"></i>
                                        {{ $order->delivered_at->format('d M Y, h:i A') }}

                                    </small>

                                </li>

                            @endif


                            {{-- Cancelled --}}
                            @if($order->order_status == 'CANCELLED')

                                <li>

                                    <i class="fas fa-times-circle text-danger mr-2"></i>

                                    <strong class="text-danger">
                                        Order Cancelled
                                    </strong>

                                    <br>

                                    <small class="text-muted ml-4">

                                        <i class="far fa-clock mr-1"></i>
                                        {{ $order->updated_at->format('d M Y, h:i A') }}

                                    </small>

                                </li>

                            @endif

                        </ul>

                    </div>

                </div>


                {{-- Additional Information --}}
                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-info-circle mr-1"></i>
                            Additional Information

                        </h3>

                    </div>


                    <div class="card-body">

                        <p>
                            <strong><i class="fas fa-user-cog mr-1"></i> Created By:</strong>

                            {{ $order->user?->name ?? 'System / Guest' }}
                        </p>

                        <p>
                            <strong><i class="fas fa-ip mr-1"></i> IP Address:</strong>

                            {{ $order->ip_address ?? 'N/A' }}
                        </p>

                        <p class="mb-0">
                            <strong><i class="fas fa-clock mr-1"></i> Last Updated:</strong>

                            {{ $order->updated_at?->format('d M Y, h:i A') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection


@push('css')

<style>

    .timeline {
        padding-left: 0;
        list-style: none;
    }

    .timeline li {
        position: relative;
        padding-left: 30px;
        border-left: 2px solid #dee2e6;
        padding-bottom: 10px;
    }

    .timeline li:last-child {
        border-left: 2px solid transparent;
        padding-bottom: 0;
    }

    .timeline li i {
        position: absolute;
        left: -8px;
        top: 2px;
        background: #fff;
        padding: 0 4px;
    }

</style>

@endpush


@push('js')

<script>

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Update Status
    |--------------------------------------------------------------------------
    */

    $('#updateStatus').on('click', function () {

        let status = $('#orderStatus').val();
        let button = $(this);

        button.prop('disabled', true)
              .html('<i class="fas fa-spinner fa-spin mr-1"></i> Updating...');

        $.ajax({

            url: "{{ url('admin/orders/' . $order->id . '/status') }}",

            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                order_status: status

            },

            success: function (response) {

                if (response.success) {

                    toastr.success(response.message, 'Success');

                    setTimeout(function() {
                        location.reload();
                    }, 1500);

                } else {

                    toastr.error(response.message, 'Error');
                    button.prop('disabled', false)
                          .html('<i class="fas fa-sync mr-1"></i> Update Status');

                }

            },

            error: function (xhr) {

                let message = xhr.responseJSON?.message ?? 'Failed to update order status.';
                toastr.error(message, 'Error');
                button.prop('disabled', false)
                      .html('<i class="fas fa-sync mr-1"></i> Update Status');

            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Cancel Order
    |--------------------------------------------------------------------------
    */

    $('#cancelOrder').on('click', function () {

        if (!confirm(
            'Are you sure you want to cancel this order?\n\n' +
            'This action cannot be undone.'
        )) {
            return;
        }

        let button = $(this);
        button.prop('disabled', true)
              .html('<i class="fas fa-spinner fa-spin mr-1"></i> Cancelling...');

        $.ajax({

            url: "{{ url('admin/orders/' . $order->id . '/cancel') }}",

            type: "POST",

            data: {

                _token: "{{ csrf_token() }}"

            },

            success: function (response) {

                if (response.success) {

                    toastr.success(response.message, 'Success');

                    setTimeout(function() {
                        location.reload();
                    }, 1500);

                } else {

                    toastr.error(response.message, 'Error');
                    button.prop('disabled', false)
                          .html('<i class="fas fa-times mr-1"></i> Cancel Order');

                }

            },

            error: function (xhr) {

                let message = xhr.responseJSON?.message ?? 'Failed to cancel order.';
                toastr.error(message, 'Error');
                button.prop('disabled', false)
                      .html('<i class="fas fa-times mr-1"></i> Cancel Order');

            }

        });

    });

});

</script>

@endpush