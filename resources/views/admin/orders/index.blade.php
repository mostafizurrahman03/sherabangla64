@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-shopping-cart mr-2"></i>
                    Orders
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Orders
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

                <button
                    type="button"
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

                <button
                    type="button"
                    class="close"
                    data-dismiss="alert">
                    &times;
                </button>

                <i class="fas fa-exclamation-circle mr-1"></i>

                {{ session('error') }}

            </div>

        @endif


        {{-- =====================================================
            STATISTICS
        ====================================================== --}}

        <div class="row">

            {{-- Total Orders --}}
            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-info">

                    <div class="inner">
                        <h3>{{ $totalOrders }}</h3>
                        <p>Total Orders</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>

                </div>

            </div>


            {{-- Pending Orders --}}
            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-warning">

                    <div class="inner">
                        <h3>{{ $pendingOrders }}</h3>
                        <p>Pending Orders</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>

                </div>

            </div>


            {{-- Processing Orders --}}
            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-primary">

                    <div class="inner">
                        <h3>{{ $processingOrders }}</h3>
                        <p>Processing Orders</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-cogs"></i>
                    </div>

                </div>

            </div>


            {{-- Delivered Orders --}}
            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-success">

                    <div class="inner">
                        <h3>{{ $completedOrders }}</h3>
                        <p>Total Delivered</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>

                </div>

            </div>


            {{-- Cancelled Orders --}}
            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-danger">

                    <div class="inner">
                        <h3>{{ $cancelledOrders }}</h3>
                        <p>Total Cancelled</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-times-circle"></i>
                    </div>

                </div>

            </div>


            {{-- Total Revenue --}}
            <div class="col-lg-2 col-md-4 col-6">

                <div class="small-box bg-secondary">

                    <div class="inner">
                        <h3>
                            ৳ {{ number_format((float) $totalRevenue, 2) }}
                        </h3>

                        <p>Total Revenue</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            ORDER CARD
        ====================================================== --}}

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-list mr-1"></i>

                    Order List

                </h3>

                <div class="card-tools">

                    <a
                        href="{{ route('admin.orders.create') }}"
                        class="btn btn-primary btn-sm">

                        <i class="fas fa-plus mr-1"></i>

                        Add Order

                    </a>

                </div>

            </div>


            <div class="card-body">


                {{-- =================================================
                    FILTERS
                ================================================== --}}

                <div class="row mb-4">

                    {{-- Order Status --}}
                    <div class="col-md-3 mb-2">

                        <label for="order_status">
                            Order Status
                        </label>

                        <select
                            id="order_status"
                            class="form-control">

                            <option value="">
                                All Status
                            </option>

                            @foreach(
                                $orderStatuses
                                as $key => $label
                            )

                                <option value="{{ $key }}">
                                    {{ $label }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Payment Status --}}
                    <div class="col-md-3 mb-2">

                        <label for="payment_status">
                            Payment Status
                        </label>

                        <select
                            id="payment_status"
                            class="form-control">

                            <option value="">
                                All Payment Status
                            </option>

                            @foreach(
                                $paymentStatuses
                                as $key => $label
                            )

                                <option value="{{ $key }}">
                                    {{ $label }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Date --}}
                    <div class="col-md-3 mb-2">

                        <label for="date_range">
                            Date Range
                        </label>

                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>

                            <input
                                type="text"
                                id="date_range"
                                class="form-control"
                                placeholder="Select date range"
                                autocomplete="off">

                        </div>

                    </div>


                    {{-- Reset --}}
                    <div class="col-md-3 mb-2">

                        <label>
                            &nbsp;
                        </label>

                        <button
                            type="button"
                            id="resetFilters"
                            class="btn btn-secondary btn-block">

                            <i class="fas fa-sync-alt mr-1"></i>

                            Reset Filters

                        </button>

                    </div>

                </div>


                {{-- =================================================
                    TABLE
                ================================================== --}}

                <div class="table-responsive">

                    <table
                        id="ordersTable"
                        class="table table-bordered table-striped table-hover"
                        width="100%">

                        <thead>

                            <tr>

                                <th width="50">
                                    #
                                </th>

                                <th>
                                    Order Number
                                </th>

                                <th>
                                    Customer
                                </th>

                                <th>
                                    Phone
                                </th>

                                <th>
                                    Products
                                </th>

                                <th>
                                    Total
                                </th>

                                <th>
                                    Payment
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Date
                                </th>

                                <th width="160">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody>
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection


{{-- ============================================================
    CSS
============================================================ --}}

@push('css')

<link
    rel="stylesheet"
    href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">

<link
    rel="stylesheet"
    href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap4.min.css">

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">


<style>

    #ordersTable th,
    #ordersTable td {
        vertical-align: middle;
    }

    #ordersTable .badge {
        font-size: 85%;
        padding: 6px 9px;
    }

    #ordersTable .btn-group .btn {
        margin-right: 2px;
    }

    #ordersTable .btn-group .btn:last-child {
        margin-right: 0;
    }

    .dt-buttons {
        margin-bottom: 10px;
    }

    .dt-buttons .btn {
        margin-right: 3px;
        margin-bottom: 3px;
    }

    .dataTables_filter {
        margin-bottom: 10px;
    }

    .dataTables_filter input {
        margin-left: 5px;
    }

    #date_range {
        background-color: #fff;
        cursor: pointer;
    }

    .dataTables_processing {
        z-index: 1000;
    }

    /* Product items styling */
    .product-items {
        max-width: 200px;
        font-size: 12px;
    }

    .product-items .item {
        padding: 2px 0;
        border-bottom: 1px dashed #e9ecef;
    }

    .product-items .item:last-child {
        border-bottom: none;
    }

    .product-items .item .qty {
        display: inline-block;
        background: #e9ecef;
        padding: 0 6px;
        border-radius: 10px;
        font-size: 10px;
        margin-left: 3px;
    }

</style>

@endpush


{{-- ============================================================
    JAVASCRIPT
============================================================ --}}

@push('js')

{{-- DataTables --}}
<script
    src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js">
</script>

<script
    src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js">
</script>


{{-- Buttons --}}
<script
    src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js">
</script>

<script
    src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap4.min.js">
</script>


{{-- Export --}}
<script
    src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js">
</script>

<script
    src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js">
</script>

<script
    src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js">
</script>


{{-- Excel --}}
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js">
</script>


{{-- PDF --}}
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js">
</script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js">
</script>


{{-- Moment --}}
<script
    src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js">
</script>


{{-- Date Range Picker --}}
<script
    src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js">
</script>


<script>

$(function () {

    'use strict';


    /*
    |--------------------------------------------------------------------------
    | Orders DataTable
    |--------------------------------------------------------------------------
    */

    const table = $('#ordersTable').DataTable({

        processing: true,

        serverSide: true,

        responsive: true,

        autoWidth: false,

        pageLength: 25,

        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],

        order: [
            [8, 'desc']
        ],


        /*
        |--------------------------------------------------------------------------
        | DOM
        |--------------------------------------------------------------------------
        */

        dom:
            "<'row mb-2'" +
                "<'col-md-6'B>" +
                "<'col-md-6'f>" +
            ">" +

            "<'row'" +
                "<'col-sm-12'tr>" +
            ">" +

            "<'row mt-2'" +
                "<'col-md-5'i>" +
                "<'col-md-7'p>" +
            ">",


        /*
        |--------------------------------------------------------------------------
        | Buttons
        |--------------------------------------------------------------------------
        */

        buttons: [

            {
                extend: 'copy',
                text:
                    '<i class="fas fa-copy"></i> Copy',
                className:
                    'btn btn-secondary btn-sm'
            },

            {
                extend: 'csv',
                text:
                    '<i class="fas fa-file-csv"></i> CSV',
                className:
                    'btn btn-success btn-sm'
            },

            {
                extend: 'excel',
                text:
                    '<i class="fas fa-file-excel"></i> Excel',
                className:
                    'btn btn-success btn-sm'
            },

            {
                extend: 'pdf',
                text:
                    '<i class="fas fa-file-pdf"></i> PDF',
                className:
                    'btn btn-danger btn-sm',

                orientation:
                    'landscape',

                pageSize:
                    'A4',

                title:
                    'Orders List',

                exportOptions: {
                    columns:
                        ':visible:not(:last-child)'
                }
            },

            {
                extend: 'print',
                text:
                    '<i class="fas fa-print"></i> Print',
                className:
                    'btn btn-secondary btn-sm',

                title:
                    'Orders List',

                exportOptions: {
                    columns:
                        ':visible:not(:last-child)'
                }
            },

            {
                extend: 'colvis',
                text:
                    '<i class="fas fa-columns"></i> Columns',
                className:
                    'btn btn-secondary btn-sm'
            }

        ],


        /*
        |--------------------------------------------------------------------------
        | AJAX
        |--------------------------------------------------------------------------
        */

        ajax: {

            url:
                "{{ route('admin.orders.index') }}",

            type:
                "GET",

            data: function (d) {

                d.order_status =
                    $('#order_status').val();

                d.payment_status =
                    $('#payment_status').val();

                d.date_range =
                    $('#date_range').val();

            },

            error: function (xhr) {

                console.error(
                    'Orders DataTable AJAX Error:',
                    xhr.responseText
                );

                let message =
                    'Unable to load orders.';

                if (
                    xhr.responseJSON &&
                    xhr.responseJSON.message
                ) {

                    message =
                        xhr.responseJSON.message;

                }

                console.error(
                    'Server Message:',
                    message
                );

            }

        },


        /*
        |--------------------------------------------------------------------------
        | Columns
        |--------------------------------------------------------------------------
        */

        columns: [

            {
                data:
                    'DT_RowIndex',

                name:
                    'DT_RowIndex',

                orderable:
                    false,

                searchable:
                    false
            },


            {
                data:
                    'order_number',

                name:
                    'order_number',

                defaultContent:
                    '-'
            },


            {
                data:
                    'customer_name',

                name:
                    'customer_name',

                defaultContent:
                    '-'
            },


            {
                data:
                    'customer_phone',

                name:
                    'customer_phone',

                defaultContent:
                    '-'
            },


            {
                data:
                    'products_html',

                name:
                    'products',

                orderable:
                    false,

                searchable:
                    false,

                defaultContent:
                    '-'
            },


            {
                data:
                    'formatted_grand_total',

                name:
                    'grand_total',

                defaultContent:
                    '৳ 0.00'
            },


            {
                data:
                    'payment_status_badge',

                name:
                    'payment_status',

                orderable:
                    false,

                defaultContent:
                    '-'
            },


            {
                data:
                    'status_badge',

                name:
                    'order_status',

                orderable:
                    false,

                defaultContent:
                    '-'
            },


            {
                data:
                    'created_at',

                name:
                    'created_at',

                defaultContent:
                    '-'
            },


            {
                data:
                    'actions',

                name:
                    'actions',

                orderable:
                    false,

                searchable:
                    false,

                defaultContent:
                    ''
            }

        ],


        /*
        |--------------------------------------------------------------------------
        | Language
        |--------------------------------------------------------------------------
        */

        language: {

            processing:
                '<i class="fas fa-spinner fa-spin"></i> Loading...',

            search:
                '',

            searchPlaceholder:
                'Search orders...',

            emptyTable:
                'No orders found',

            zeroRecords:
                'No matching orders found'

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Order Status
    |--------------------------------------------------------------------------
    */

    $('#order_status').on(
        'change',
        function () {

            table.ajax.reload(
                null,
                true
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Payment Status
    |--------------------------------------------------------------------------
    */

    $('#payment_status').on(
        'change',
        function () {

            table.ajax.reload(
                null,
                true
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Date Range Picker
    |--------------------------------------------------------------------------
    */

    $('#date_range').daterangepicker({

        autoUpdateInput:
            false,

        opens:
            'left',

        locale: {

            format:
                'YYYY-MM-DD',

            separator:
                ' - ',

            applyLabel:
                'Apply',

            cancelLabel:
                'Clear'

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Date Apply
    |--------------------------------------------------------------------------
    */

    $('#date_range').on(
        'apply.daterangepicker',
        function (event, picker) {

            $(this).val(

                picker.startDate.format(
                    'YYYY-MM-DD'
                )

                + ' - ' +

                picker.endDate.format(
                    'YYYY-MM-DD'
                )

            );

            table.ajax.reload(
                null,
                true
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Date Clear
    |--------------------------------------------------------------------------
    */

    $('#date_range').on(
        'cancel.daterangepicker',
        function () {

            $(this).val('');

            table.ajax.reload(
                null,
                true
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Reset
    |--------------------------------------------------------------------------
    */

    $('#resetFilters').on(
        'click',
        function () {

            $('#order_status').val('');

            $('#payment_status').val('');

            $('#date_range').val('');

            table.ajax.reload(
                null,
                true
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Cancel Order
    |--------------------------------------------------------------------------
    */

    $(document).on(
        'click',
        '.cancel-order',
        function () {

            const button =
                $(this);

            const orderId =
                button.data('id');


            if (
                !confirm(
                    'Are you sure you want to cancel this order?'
                )
            ) {

                return;

            }


            button
                .prop('disabled', true)
                .html(
                    '<i class="fas fa-spinner fa-spin"></i>'
                );


            $.ajax({

                url:
                    "{{ url('admin/orders') }}/"
                    + orderId
                    + "/cancel",

                type:
                    'POST',

                data: {

                    _token:
                        "{{ csrf_token() }}"

                },


                success:
                    function (response) {

                        if (
                            response.success
                        ) {

                            alert(
                                response.message
                            );

                            table.ajax.reload(
                                null,
                                false
                            );

                        } else {

                            alert(
                                response.message
                                ||
                                'Unable to cancel order.'
                            );

                            button
                                .prop(
                                    'disabled',
                                    false
                                )
                                .html(
                                    '<i class="fas fa-times"></i>'
                                );
                        }

                    },


                error:
                    function (xhr) {

                        console.error(
                            'Cancel Order Error:',
                            xhr.responseText
                        );

                        let message =
                            'Failed to cancel order.';

                        if (
                            xhr.responseJSON &&
                            xhr.responseJSON.message
                        ) {

                            message =
                                xhr.responseJSON.message;

                        }

                        alert(message);

                        button
                            .prop(
                                'disabled',
                                false
                            )
                            .html(
                                '<i class="fas fa-times"></i>'
                            );

                    }

            });

        }
    );

});

</script>

@endpush