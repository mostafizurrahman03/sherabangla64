<!DOCTYPE html>
<html lang="bn">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Invoice - {{ $order->order_number }}
    </title>


    <style>

        * {
            box-sizing: border-box;
        }


        @page {
            size: A4;
            margin: 12mm;
        }


        body {
            margin: 0;
            padding: 30px;
            background: #eef1f5;

            font-family:
                Arial,
                "Noto Sans Bengali",
                "SolaimanLipi",
                "Vrinda",
                sans-serif;

            color: #252525;
            font-size: 14px;
        }


        .invoice-wrapper {
            max-width: 900px;
            margin: 0 auto;
        }


        /* =====================================================
           PRINT BUTTON AREA
        ====================================================== */

        .no-print {
            text-align: center;
            margin-bottom: 20px;
        }


        .btn {
            display: inline-block;

            border: 0;

            padding: 11px 22px;

            border-radius: 6px;

            color: #fff;

            font-size: 14px;

            font-weight: 600;

            cursor: pointer;

            text-decoration: none;

            margin: 0 4px;
        }


        .btn-print {
            background: #198754;
        }


        .btn-back {
            background: #6c757d;
        }


        /* =====================================================
           INVOICE CONTAINER
        ====================================================== */

        .invoice-container {

            background: #fff;

            max-width: 900px;

            margin: auto;

            padding: 40px;

            border-radius: 8px;

            box-shadow:
                0 5px 25px rgba(0, 0, 0, .08);
        }


        /* =====================================================
           HEADER
        ====================================================== */

        .invoice-header {

            display: table;

            width: 100%;

            border-bottom: 2px solid #198754;

            padding-bottom: 25px;

            margin-bottom: 28px;
        }


        .header-left,
        .header-right {

            display: table-cell;

            vertical-align: top;

            width: 50%;
        }


        .header-right {
            text-align: right;
        }


        .company-logo {

            max-width: 190px;

            max-height: 75px;

            object-fit: contain;

            display: block;

            margin-bottom: 10px;
        }


        .company-name {

            font-size: 27px;

            font-weight: 700;

            color: #198754;

            margin-bottom: 7px;
        }


        .company-info {

            color: #666;

            line-height: 1.6;

            font-size: 13px;
        }


        .invoice-title {

            font-size: 35px;

            font-weight: 800;

            letter-spacing: 2px;

            color: #222;

            margin-bottom: 8px;
        }


        .invoice-meta {

            line-height: 1.8;

            color: #555;
        }


        .invoice-meta strong {
            color: #222;
        }


        /* =====================================================
           INFORMATION
        ====================================================== */

        .info-wrapper {

            display: table;

            width: 100%;

            margin-bottom: 28px;
        }


        .info-box {

            display: table-cell;

            width: 50%;

            vertical-align: top;

            padding-right: 20px;
        }


        .info-box:last-child {

            padding-right: 0;

            padding-left: 20px;
        }


        .section-title {

            font-size: 13px;

            font-weight: 700;

            color: #198754;

            text-transform: uppercase;

            letter-spacing: .5px;

            border-bottom: 1px solid #ddd;

            padding-bottom: 7px;

            margin-bottom: 10px;
        }


        .customer-name {

            font-size: 16px;

            font-weight: 700;

            margin-bottom: 5px;
        }


        .info-line {

            margin: 4px 0;

            color: #555;

            line-height: 1.5;
        }


        .info-line strong {
            color: #222;
        }


        /* =====================================================
           STATUS
        ====================================================== */

        .status {

            display: inline-block;

            padding: 4px 10px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;
        }


        .status-placed {

            background: #fff3cd;

            color: #856404;
        }


        .status-confirmed {

            background: #d1ecf1;

            color: #0c5460;
        }


        .status-processing {

            background: #cfe2ff;

            color: #084298;
        }


        .status-shipped {

            background: #e2e3e5;

            color: #383d41;
        }


        .status-delivered {

            background: #d1e7dd;

            color: #0f5132;
        }


        .status-cancelled {

            background: #f8d7da;

            color: #842029;
        }


        .status-refunded {

            background: #343a40;

            color: #fff;
        }


        /* =====================================================
           ITEMS TABLE
        ====================================================== */

        .items-table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 15px;
        }


        .items-table thead th {

            background: #198754;

            color: #fff;

            padding: 11px 10px;

            font-size: 12px;

            font-weight: 700;

            text-transform: uppercase;

            border: 1px solid #198754;
        }


        .items-table tbody td {

            padding: 11px 10px;

            border-bottom: 1px solid #e4e4e4;

            vertical-align: middle;

            font-size: 13px;
        }


        .items-table tbody tr:nth-child(even) {

            background: #fafafa;
        }


        .product-name {

            font-weight: 600;

            color: #222;
        }


        .product-sku {

            display: block;

            color: #888;

            font-size: 11px;

            margin-top: 3px;
        }


        .text-center {
            text-align: center;
        }


        .text-right {
            text-align: right;
        }


        /* =====================================================
           SUMMARY
        ====================================================== */

        .bottom-section {

            margin-top: 25px;

            display: table;

            width: 100%;
        }


        .bottom-note,
        .summary-wrapper {

            display: table-cell;

            vertical-align: top;
        }


        .bottom-note {

            width: 55%;

            padding-right: 30px;
        }


        .summary-wrapper {

            width: 45%;
        }


        .summary {

            width: 100%;

            border-collapse: collapse;
        }


        .summary td {

            padding: 7px 0;

            font-size: 14px;
        }


        .summary .label {
            color: #666;
        }


        .summary .amount {

            text-align: right;

            font-weight: 600;
        }


        .grand-total td {

            border-top: 2px solid #198754;

            padding-top: 12px;

            font-size: 19px;

            font-weight: 800;

            color: #198754;
        }


        /* =====================================================
           NOTE
        ====================================================== */

        .note-box {

            background: #f7f9fa;

            border-left: 4px solid #198754;

            padding: 12px 15px;

            margin-top: 5px;

            line-height: 1.6;
        }


        .note-title {

            font-weight: 700;

            margin-bottom: 4px;
        }


        /* =====================================================
           PAYMENT BOX
        ====================================================== */

        .payment-box {

            margin-top: 22px;

            padding: 12px 15px;

            background: #f7f9fa;

            border: 1px solid #e5e5e5;

            border-radius: 5px;
        }


        .payment-box strong {
            color: #198754;
        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .invoice-footer {

            margin-top: 35px;

            padding-top: 18px;

            border-top: 1px solid #ddd;

            text-align: center;

            color: #777;

            font-size: 12px;

            line-height: 1.7;
        }


        .thank-you {

            color: #198754;

            font-size: 16px;

            font-weight: 700;

            margin-bottom: 5px;
        }


        /*
        |--------------------------------------------------------------------------
        | Bengali Brand Footer
        |--------------------------------------------------------------------------
        */

        .brand-footer {

            margin-top: 10px;

            font-family:
                "Noto Sans Bengali",
                "SolaimanLipi",
                "Vrinda",
                Arial,
                sans-serif;

            font-size: 15px;

            font-weight: 600;

            color: #222;

            letter-spacing: 0;

            direction: ltr;
        }


        .brand-footer .brand-hash {

            font-weight: 700;

            color: #198754;
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media screen and (max-width: 700px) {

            body {
                padding: 10px;
            }


            .invoice-container {
                padding: 20px;
            }


            .header-left,
            .header-right,
            .info-box,
            .bottom-note,
            .summary-wrapper {

                display: block;

                width: 100%;
            }


            .header-right {

                text-align: left;

                margin-top: 20px;
            }


            .info-box,
            .info-box:last-child {

                padding: 0;

                margin-bottom: 20px;
            }


            .bottom-note {

                padding-right: 0;

                margin-bottom: 20px;
            }


            .items-table {

                font-size: 12px;
            }


            .items-table thead th,
            .items-table tbody td {

                padding: 7px 5px;
            }


            .invoice-title {

                font-size: 28px;
            }

        }


        /* =====================================================
           PRINT
        ====================================================== */

        @media print {

            body {

                background: #fff;

                padding: 0;

                margin: 0;
            }


            .invoice-wrapper {

                max-width: 100%;
            }


            .invoice-container {

                width: 100%;

                max-width: 100%;

                padding: 10px;

                margin: 0;

                border-radius: 0;

                box-shadow: none;
            }


            .no-print {

                display: none !important;
            }


            .items-table thead th {

                background: #198754 !important;

                color: #fff !important;

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }


            .status {

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }


            .items-table tbody tr:nth-child(even) {

                background: #fafafa !important;

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }


            .brand-footer {

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }

        }

    </style>

</head>


<body>


@php

    /*
    |--------------------------------------------------------------------------
    | SETTINGS
    |--------------------------------------------------------------------------
    */

    $settings = \App\Models\Setting::query()
        ->whereIn('key', [
            'logo',
            'app_name',
            'address',
            'email',
            'phone',
        ])
        ->pluck('value', 'key');


    /*
    |--------------------------------------------------------------------------
    | COMPANY INFORMATION
    |--------------------------------------------------------------------------
    */

    $logo = $settings->get('logo');

    $companyName = $settings->get('app_name')
        ?: config('app.name', 'Your Company');

    $companyAddress = $settings->get('address');

    $companyEmail = $settings->get('email');

    $companyPhone = $settings->get('phone');


    /*
    |--------------------------------------------------------------------------
    | LOGO URL
    |--------------------------------------------------------------------------
    */

    $logoUrl = null;

    if ($logo) {

        if (
            str_starts_with($logo, 'http://') ||
            str_starts_with($logo, 'https://')
        ) {

            $logoUrl = $logo;

        } else {

            $logoUrl = asset(
                'storage/' . ltrim($logo, '/')
            );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | CURRENCY
    |--------------------------------------------------------------------------
    */

    $currency = '৳';


    /*
    |--------------------------------------------------------------------------
    | ORDER STATUS
    |--------------------------------------------------------------------------
    */

    $orderStatus = strtolower(
        $order->order_status ?? ''
    );


    $statusClass = 'status-' . $orderStatus;


    /*
    |--------------------------------------------------------------------------
    | ORDER STATUS LABEL
    |--------------------------------------------------------------------------
    */

    $orderStatusLabel =
        \App\Models\Order::ORDER_STATUSES[$order->order_status]
        ?? ucfirst(
            str_replace(
                '_',
                ' ',
                $order->order_status ?? 'N/A'
            )
        );


    /*
    |--------------------------------------------------------------------------
    | PAYMENT METHOD
    |--------------------------------------------------------------------------
    */

    $paymentMethod =
        \App\Models\Order::PAYMENT_METHODS[$order->payment_method]
        ?? ucfirst(
            str_replace(
                '_',
                ' ',
                $order->payment_method ?? 'N/A'
            )
        );


    /*
    |--------------------------------------------------------------------------
    | PAYMENT STATUS
    |--------------------------------------------------------------------------
    */

    $paymentStatus =
        \App\Models\Order::PAYMENT_STATUSES[$order->payment_status]
        ?? ucfirst(
            str_replace(
                '_',
                ' ',
                $order->payment_status ?? 'N/A'
            )
        );

@endphp



<div class="invoice-wrapper">


    {{-- =====================================================
        PRINT BUTTONS
    ====================================================== --}}

    <div class="no-print">

        <button
            type="button"
            onclick="window.print()"
            class="btn btn-print">

            🖨 Print Invoice

        </button>


        <a
            href="{{ route('admin.orders.show', $order->id) }}"
            class="btn btn-back">

            ← Back to Order

        </a>

    </div>



    {{-- =====================================================
        INVOICE
    ====================================================== --}}

    <div class="invoice-container">


        {{-- =================================================
            HEADER
        ================================================== --}}

        <div class="invoice-header">


            {{-- COMPANY --}}

            <div class="header-left">


                @if($logoUrl)

                    <img
                        src="{{ $logoUrl }}"
                        alt="{{ $companyName }}"
                        class="company-logo">

                @else

                    <div class="company-name">

                        {{ $companyName }}

                    </div>

                @endif



                @if($companyAddress)

                    <div class="company-info">

                        {{ $companyAddress }}

                    </div>

                @endif



                @if($companyPhone)

                    <div class="company-info">

                        Phone:
                        {{ $companyPhone }}

                    </div>

                @endif



                @if($companyEmail)

                    <div class="company-info">

                        Email:
                        {{ $companyEmail }}

                    </div>

                @endif

            </div>



            {{-- INVOICE INFO --}}

            <div class="header-right">


                <div class="invoice-title">

                    INVOICE

                </div>


                <div class="invoice-meta">


                    <strong>
                        Order No:
                    </strong>

                    {{ $order->order_number }}


                    <br>


                    <strong>
                        Invoice Date:
                    </strong>

                    {{ $order->created_at?->format('d M Y') }}


                    <br>


                    <strong>
                        Order Status:
                    </strong>


                    <span class="status {{ $statusClass }}">

                        {{ $orderStatusLabel }}

                    </span>


                </div>

            </div>

        </div>



        {{-- =================================================
            CUSTOMER + PAYMENT (Customer from Customer Table)
        ================================================== --}}

        <div class="info-wrapper">


            {{-- BILL TO (Customer Data) --}}

            <div class="info-box">


                <div class="section-title">

                    Bill To / Ship To

                </div>


                {{-- Customer Name --}}
                @if($order->customer)
                    <div class="customer-name">
                        {{ $order->customer->name ?? $order->shipping_name }}
                    </div>
                @else
                    <div class="customer-name">
                        {{ $order->shipping_name ?? 'Customer' }}
                    </div>
                @endif


                {{-- Customer Phone --}}
                @if($order->customer && ($order->customer->phone_number || $order->customer->phone))
                    <div class="info-line">
                        <strong>Phone:</strong>
                        {{ $order->customer->phone_number ?? $order->customer->phone }}
                    </div>
                @elseif($order->shipping_phone)
                    <div class="info-line">
                        <strong>Phone:</strong>
                        {{ $order->shipping_phone }}
                    </div>
                @endif


                {{-- Customer Email --}}
                @if($order->customer && $order->customer->email)
                    <div class="info-line">
                        <strong>Email:</strong>
                        {{ $order->customer->email }}
                    </div>
                @elseif($order->shipping_email)
                    <div class="info-line">
                        <strong>Email:</strong>
                        {{ $order->shipping_email }}
                    </div>
                @endif


                {{-- Customer Address --}}
                @if($order->customer && $order->customer->address)
                    <div class="info-line">
                        <strong>Address:</strong>
                        {{ $order->customer->address }}
                    </div>
                @elseif($order->shipping_address)
                    <div class="info-line">
                        <strong>Address:</strong>
                        {{ $order->shipping_address }}
                    </div>
                @endif


                {{-- District --}}
                @if($order->district_name)
                    <div class="info-line">
                        <strong>District:</strong>
                        {{ $order->district_name }}
                    </div>
                @endif


                {{-- Thana --}}
                @if($order->thana_name)
                    <div class="info-line">
                        <strong>Thana:</strong>
                        {{ $order->thana_name }}
                    </div>
                @endif

            </div>



            {{-- PAYMENT --}}

            <div class="info-box">


                <div class="section-title">

                    Payment Information

                </div>


                <div class="info-line">

                    <strong>
                        Method:
                    </strong>

                    {{ $paymentMethod }}

                </div>


                <div class="info-line">

                    <strong>
                        Payment Status:
                    </strong>

                    {{ $paymentStatus }}

                </div>



                @if($order->paid_at)

                    <div class="info-line">

                        <strong>
                            Paid At:
                        </strong>

                        {{ $order->paid_at->format('d M Y, h:i A') }}

                    </div>

                @endif



                @if($order->coupon_code)

                    <div class="info-line">

                        <strong>
                            Coupon:
                        </strong>

                        {{ $order->coupon_code }}

                    </div>

                @endif

            </div>

        </div>



        {{-- =================================================
            ORDER ITEMS (from OrderItem table)
        ================================================== --}}

        <div class="section-title">

            Order Items

        </div>



        <table class="items-table">


            <thead>

                <tr>

                    <th width="45">
                        #
                    </th>


                    <th>
                        Product
                    </th>


                    <th width="120">
                        Unit Price
                    </th>


                    <th width="70"
                        class="text-center">

                        Qty

                    </th>


                    <th width="140"
                        class="text-right">

                        Total

                    </th>

                </tr>

            </thead>



            <tbody>


                @forelse($order->items as $index => $item)


                    @php

                        // Get unit price from OrderItem
                        $unitPrice = (float) (
                            $item->unit_price ?? $item->price ?? 0
                        );

                        $quantity = (int) (
                            $item->quantity ?? 0
                        );

                        // Calculate line total
                        $lineTotal = $item->total_price !== null
                            ? (float) $item->total_price
                            : ($unitPrice * $quantity);

                        // Get product name from OrderItem or Product
                        $productName = $item->product_name 
                            ?? $item->product?->name 
                            ?? 'Product';

                        // Get SKU from Product if exists
                        $productSku = $item->product?->sku ?? null;

                    @endphp



                    <tr>


                        <td class="text-center">

                            {{ $index + 1 }}

                        </td>



                        <td>

                            <div class="product-name">

                                {{ $productName }}

                            </div>



                            @if($productSku)

                                <span class="product-sku">

                                    SKU:
                                    {{ $productSku }}

                                </span>

                            @endif



                            {{-- Show if product is deleted --}}
                            @if($item->product_id && !$item->product)
                                <span class="product-sku" style="color: #dc3545;">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Product deleted
                                </span>
                            @endif

                        </td>



                        <td>

                            {{ $currency }}

                            {{ number_format(
                                $unitPrice,
                                2
                            ) }}

                        </td>



                        <td class="text-center">

                            {{ $quantity }}

                        </td>



                        <td class="text-right">

                            {{ $currency }}

                            {{ number_format(
                                $lineTotal,
                                2
                            ) }}

                        </td>

                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="5"
                            class="text-center"
                            style="padding:25px;">

                            No order items found.

                        </td>

                    </tr>


                @endforelse


            </tbody>

        </table>



        {{-- =================================================
            BOTTOM SECTION
        ================================================== --}}

        <div class="bottom-section">


            {{-- NOTE --}}

            <div class="bottom-note">


                @if($order->order_note)


                    <div class="note-box">


                        <div class="note-title">

                            Order Note

                        </div>


                        {!! nl2br(
                            e($order->order_note)
                        ) !!}


                    </div>


                @else


                    <div class="payment-box">


                        <strong>
                            Payment:
                        </strong>


                        {{ $paymentMethod }}


                    </div>


                @endif


            </div>



            {{-- SUMMARY --}}

            <div class="summary-wrapper">


                <table class="summary">


                    {{-- SUBTOTAL --}}

                    <tr>

                        <td class="label">

                            Subtotal

                        </td>


                        <td class="amount">

                            {{ $currency }}

                            {{ number_format(
                                $order->subtotal ?? 0,
                                2
                            ) }}

                        </td>

                    </tr>



                    {{-- SHIPPING --}}

                    <tr>

                        <td class="label">

                            Shipping Fee

                        </td>


                        <td class="amount">

                            {{ $currency }}

                            {{ number_format(
                                $order->shipping_fee ?? 0,
                                2
                            ) }}

                        </td>

                    </tr>



                    {{-- DISCOUNT --}}

                    @if(($order->discount_amount ?? 0) > 0)


                        <tr>

                            <td class="label">

                                Discount

                            </td>


                            <td class="amount">

                                - {{ $currency }}

                                {{ number_format(
                                    $order->discount_amount,
                                    2
                                ) }}

                            </td>

                        </tr>


                    @endif



                    {{-- GRAND TOTAL --}}

                    <tr class="grand-total">


                        <td>

                            Grand Total

                        </td>


                        <td class="amount">

                            {{ $currency }}

                            {{ number_format(
                                $order->grand_total ?? 0,
                                2
                            ) }}

                        </td>


                    </tr>


                </table>

            </div>

        </div>



        {{-- =================================================
            FOOTER
        ================================================== --}}

        <div class="invoice-footer">


            {{-- THANK YOU --}}

            <div class="thank-you">

                Thank You For Your Order!

            </div>



            {{-- BRAND TAGLINE --}}

            <div class="brand-footer">

                সেরা বাংলা ৬৪ -

                <span class="brand-hash">

                    #সেরা বাংলার, সেরা পণ্য

                </span>

            </div>



            {{-- COMPUTER GENERATED --}}

            <div style="margin-top: 6px;">

                This is a computer-generated invoice
                and does not require a signature.

            </div>



            {{-- CONTACT --}}

            @if($companyPhone || $companyEmail)


                <div style="margin-top: 8px;">


                    @if($companyPhone)

                        {{ $companyPhone }}

                    @endif



                    @if($companyPhone && $companyEmail)

                        &nbsp; | &nbsp;

                    @endif



                    @if($companyEmail)

                        {{ $companyEmail }}

                    @endif


                </div>


            @endif


        </div>


    </div>

</div>



</body>

</html>