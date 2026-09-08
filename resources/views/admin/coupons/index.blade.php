@extends('layouts.master')

@section('title', 'Manage Coupons')

@section('content')

@include('admin.components.alert')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Coupons</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Coupons
                    </li>

                </ol>
            </div>

        </div>

    </div>
</section>


<!-- Main Content -->
<section class="content">

    <div class="container-fluid">

        <div class="card card-primary">

            <!-- Header -->
            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-ticket-alt"></i>
                    Coupon List
                </h3>

                <div class="card-tools">

                    <a
                        href="{{ route('admin.coupons.create') }}"
                        class="btn btn-success btn-sm"
                    >
                        <i class="fas fa-plus"></i>
                        Add New Coupon
                    </a>

                </div>

            </div>


            <!-- Filters -->
            <div class="card-body border-bottom">

                <form
                    method="GET"
                    action="{{ route('admin.coupons.index') }}"
                >

                    <div class="row">

                        <!-- Search -->
                        <div class="col-md-3 mb-2">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search coupon code..."
                                value="{{ request('search') }}"
                            >

                        </div>


                        <!-- Coupon Type -->
                        <div class="col-md-3 mb-2">

                            <select
                                name="coupon_type"
                                class="form-control"
                            >

                                <option value="">
                                    All Types
                                </option>

                                <option
                                    value="PERCENTAGE"
                                    @selected(request('coupon_type') === 'PERCENTAGE')
                                >
                                    Percentage
                                </option>

                                <option
                                    value="FIXED_AMOUNT"
                                    @selected(request('coupon_type') === 'FIXED_AMOUNT')
                                >
                                    Fixed Amount
                                </option>

                                <option
                                    value="FREE_SHIPPING"
                                    @selected(request('coupon_type') === 'FREE_SHIPPING')
                                >
                                    Free Shipping
                                </option>

                            </select>

                        </div>


                        <!-- Status -->
                        <div class="col-md-2 mb-2">

                            <select
                                name="status"
                                class="form-control"
                            >

                                <option value="">
                                    All Status
                                </option>

                                <option
                                    value="1"
                                    @selected(request('status') === '1')
                                >
                                    Active
                                </option>

                                <option
                                    value="0"
                                    @selected(request('status') === '0')
                                >
                                    Inactive
                                </option>

                            </select>

                        </div>


                        <!-- Sort -->
                        <div class="col-md-2 mb-2">

                            <select
                                name="sort_by"
                                class="form-control"
                            >

                                <option
                                    value="created_at"
                                    @selected(request('sort_by', 'created_at') === 'created_at')
                                >
                                    Created Date
                                </option>

                                <option
                                    value="coupon_code"
                                    @selected(request('sort_by') === 'coupon_code')
                                >
                                    Coupon Code
                                </option>

                                <option
                                    value="coupon_type"
                                    @selected(request('sort_by') === 'coupon_type')
                                >
                                    Coupon Type
                                </option>

                                <option
                                    value="discount_value"
                                    @selected(request('sort_by') === 'discount_value')
                                >
                                    Discount
                                </option>

                                <option
                                    value="valid_from"
                                    @selected(request('sort_by') === 'valid_from')
                                >
                                    Valid From
                                </option>

                                <option
                                    value="valid_to"
                                    @selected(request('sort_by') === 'valid_to')
                                >
                                    Valid To
                                </option>

                            </select>

                        </div>


                        <!-- Buttons -->
                        <div class="col-md-2 mb-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>

                            <a
                                href="{{ route('admin.coupons.index') }}"
                                class="btn btn-secondary"
                            >
                                Reset
                            </a>

                        </div>

                    </div>

                </form>

            </div>


            <!-- Table -->
            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead>

                        <tr>

                            <th style="width: 60px;">
                                #
                            </th>

                            <th>
                                Coupon Code
                            </th>

                            <th>
                                Type
                            </th>

                            <th>
                                Discount
                            </th>

                            <th>
                                Minimum Order
                            </th>

                            <th>
                                Usage
                            </th>

                            <th>
                                Validity
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Created
                            </th>

                            <th style="width: 120px;">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($coupons as $coupon)

                            <tr>

                                <!-- Number -->
                                <td>
                                    {{ $coupons->firstItem() + $loop->index }}
                                </td>


                                <!-- Coupon Code -->
                                <td>

                                    <strong class="text-primary">
                                        {{ $coupon->coupon_code }}
                                    </strong>

                                </td>


                                <!-- Type -->
                                <td>

                                    @if($coupon->coupon_type === 'PERCENTAGE')

                                        <span class="badge badge-info">
                                            Percentage
                                        </span>

                                    @elseif($coupon->coupon_type === 'FIXED_AMOUNT')

                                        <span class="badge badge-primary">
                                            Fixed Amount
                                        </span>

                                    @else

                                        <span class="badge badge-success">
                                            Free Shipping
                                        </span>

                                    @endif

                                </td>


                                <!-- Discount -->
                                <td>

                                    @if($coupon->coupon_type === 'PERCENTAGE')

                                        {{ number_format($coupon->discount_value, 2) }}%

                                        @if($coupon->max_discount_amount)
                                            <br>
                                            <small class="text-muted">
                                                Max:
                                                {{ number_format($coupon->max_discount_amount, 2) }}
                                            </small>
                                        @endif

                                    @elseif($coupon->coupon_type === 'FIXED_AMOUNT')

                                        {{ number_format($coupon->discount_value, 2) }}

                                    @else

                                        <span class="text-muted">
                                            N/A
                                        </span>

                                    @endif

                                </td>


                                <!-- Minimum Order -->
                                <td>

                                    {{ number_format(
                                        $coupon->minimum_order_amount,
                                        2
                                    ) }}

                                </td>


                                <!-- Usage -->
                                <td>

                                    @if($coupon->usage_limit)

                                        <span class="badge badge-light">
                                            {{ $coupon->usage_limit }}
                                        </span>

                                    @else

                                        <span class="badge badge-secondary">
                                            Unlimited
                                        </span>

                                    @endif

                                    <br>

                                    <small class="text-muted">
                                        Per User:
                                        {{ $coupon->per_user_limit }}
                                    </small>

                                </td>


                                <!-- Validity -->
                                <td>

                                    <small>

                                        <strong>
                                            From:
                                        </strong>

                                        {{ $coupon->valid_from?->format('d M Y h:i A') }}

                                        <br>

                                        <strong>
                                            To:
                                        </strong>

                                        {{ $coupon->valid_to?->format('d M Y h:i A') }}

                                    </small>

                                </td>


                                <!-- Status -->
                                <td>

                                    @if($coupon->is_active)

                                        <span class="badge badge-success">
                                            <i class="fas fa-check-circle"></i>
                                            Active
                                        </span>

                                    @else

                                        <span class="badge badge-danger">
                                            <i class="fas fa-times-circle"></i>
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                <!-- Created -->
                                <td>

                                    {{ $coupon->created_at?->format('d M Y') }}

                                </td>


                                <!-- Actions -->
                                <td>

                                    <div class="coupon-actions">

                                        <!-- Edit -->
                                        <a
                                            href="{{ route(
                                                'admin.coupons.edit',
                                                $coupon->coupon_id
                                            ) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </a>


                                        <!-- Delete -->
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $coupon->coupon_id }})"
                                            title="Delete"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </div>


                                    <!-- Delete Form -->
                                    <form
                                        id="delete-form-{{ $coupon->coupon_id }}"
                                        action="{{ route(
                                            'admin.coupons.destroy',
                                            $coupon->coupon_id
                                        ) }}"
                                        method="POST"
                                        style="display: none;"
                                    >

                                        @csrf

                                        @method('DELETE')

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="10"
                                    class="text-center py-4"
                                >

                                    <i class="fas fa-info-circle text-muted"></i>

                                    <span class="text-muted">
                                        No coupons found.
                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- Pagination Footer -->
            <div class="card-footer">

                <div class="row align-items-center">

                    <div class="col-md-6">

                        <small class="text-muted">

                            Showing
                            {{ $coupons->firstItem() ?? 0 }}

                            to
                            {{ $coupons->lastItem() ?? 0 }}

                            of
                            {{ $coupons->total() }}

                            coupons

                        </small>

                    </div>


                    <div class="col-md-6">

                        <div class="float-right">

                            {{ $coupons->links() }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection


@push('styles')

<style>

    .table td {
        vertical-align: middle;
    }

    .coupon-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .coupon-actions .btn {
        min-width: 36px;
    }

    .card-footer .pagination {
        margin-bottom: 0;
    }

</style>

@endpush


@push('js')

<script>

    function confirmDelete(couponId) {

        Swal.fire({

            title: 'Are you sure?',

            text: "You won't be able to revert this!",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            cancelButtonColor: '#3085d6',

            confirmButtonText: 'Yes, delete it!'

        }).then((result) => {

            if (result.isConfirmed) {

                document
                    .getElementById('delete-form-' + couponId)
                    .submit();

            }

        });

    }

</script>

@endpush