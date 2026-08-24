@extends('layouts.master')

@section('title', 'Manage Brands')

@section('content')

@include('admin.components.alert')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Brands</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Brands
                    </li>
                </ol>
            </div>

        </div>
    </div>
</section>


<section class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <div class="card card-primary">

                    {{-- Card Header --}}
                    <div class="card-header">

                        <h3 class="card-title">
                            <i class="fas fa-tags"></i>
                            Brand List
                        </h3>

                        <div class="card-tools">

                            <a href="{{ route('admin.brands.create') }}"
                               class="btn btn-success btn-sm">

                                <i class="fas fa-plus"></i>
                                Add New Brand

                            </a>

                        </div>

                    </div>
                    {{-- /.card-header --}}


                    {{-- Search / Filter --}}
                    <div class="card-body border-bottom">

                        <form method="GET"
                              action="{{ route('admin.brands.index') }}">

                            <div class="row">

                                {{-- Search --}}
                                <div class="col-md-4 mb-2">

                                    <input
                                        type="text"
                                        name="search"
                                        class="form-control"
                                        placeholder="Search brand..."
                                        value="{{ request('search') }}"
                                    >

                                </div>


                                {{-- Status --}}
                                <div class="col-md-3 mb-2">

                                    <select name="status"
                                            class="form-control">

                                        <option value="">
                                            All Status
                                        </option>

                                        <option value="1"
                                            @selected(request('status') == '1')>
                                            Active
                                        </option>

                                        <option value="0"
                                            @selected(request('status') == '0')>
                                            Inactive
                                        </option>

                                    </select>

                                </div>


                                {{-- Sort --}}
                                <div class="col-md-3 mb-2">

                                    <select name="sort_by"
                                            class="form-control">

                                        <option value="created_at"
                                            @selected(request('sort_by', 'created_at') == 'created_at')>
                                            Created Date
                                        </option>

                                        <option value="name"
                                            @selected(request('sort_by') == 'name')>
                                            Name
                                        </option>

                                        <option value="sort_order"
                                            @selected(request('sort_by') == 'sort_order')>
                                            Sort Order
                                        </option>

                                    </select>

                                </div>


                                {{-- Buttons --}}
                                <div class="col-md-2 mb-2">

                                    <button type="submit"
                                            class="btn btn-primary">

                                        <i class="fas fa-search"></i>
                                        Search

                                    </button>

                                    <a href="{{ route('admin.brands.index') }}"
                                       class="btn btn-secondary">

                                        Reset

                                    </a>

                                </div>

                            </div>

                        </form>

                    </div>
                    {{-- /.card-body --}}


                    {{-- Brand Table --}}
                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover text-nowrap">

                            <thead>

                                <tr>

                                    <th style="width: 50px;">
                                        #
                                    </th>

                                    <th style="width: 80px;">
                                        Logo
                                    </th>

                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Slug
                                    </th>

                                    <th style="width: 100px;">
                                        Sort Order
                                    </th>

                                    <th style="width: 100px;">
                                        Products
                                    </th>

                                    <th style="width: 110px;">
                                        Status
                                    </th>

                                    <th style="width: 120px;">
                                        Created
                                    </th>

                                    <th style="width: 140px;">
                                        Actions
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($brands as $brand)

                                    <tr>

                                        {{-- Serial --}}
                                        <td class="text-center">

                                            {{ $brands->firstItem() + $loop->index }}

                                        </td>


                                        {{-- Logo --}}
                                        <td>

                                            @if($brand->logo)

                                                <img
                                                    src="{{ asset('storage/' . $brand->logo) }}"
                                                    alt="{{ $brand->name }}"
                                                    class="brand-logo"
                                                    width="70"
                                                >

                                            @else

                                                <span class="badge badge-secondary">
                                                    No Logo
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Name --}}
                                        <td>

                                            <strong>
                                                {{ $brand->name }}
                                            </strong>

                                            @if($brand->description)

                                                <br>

                                                <small class="text-muted">
                                                    {{ Str::limit($brand->description, 50) }}
                                                </small>

                                            @endif

                                        </td>


                                        {{-- Slug --}}
                                        <td>

                                            <code>
                                                {{ $brand->slug }}
                                            </code>

                                        </td>


                                        {{-- Sort Order --}}
                                        <td class="text-center">

                                            {{ $brand->sort_order ?? 0 }}

                                        </td>


                                        {{-- Products --}}
                                        <td class="text-center">

                                            <span class="badge badge-info">

                                                {{ $brand->products_count ?? 0 }}

                                            </span>

                                        </td>


                                        {{-- Status --}}
                                        <td class="text-center">

                                            @if($brand->is_active)

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


                                        {{-- Created --}}
                                        <td class="text-center">

                                            {{ $brand->created_at?->format('d M Y') }}

                                        </td>


                                        {{-- Actions --}}
                                        <td class="text-center">

                                            <div class="brand-actions">

                                                {{-- Edit --}}
                                                <a
                                                    href="{{ route('admin.brands.edit', $brand->id) }}"
                                                    class="btn btn-warning btn-sm mr-2"
                                                    title="Edit Brand"
                                                >

                                                    <i class="fas fa-edit"></i>

                                                </a>


                                                {{-- Delete --}}
                                                <button
                                                    type="button"
                                                    onclick="confirmDelete(event, {{ $brand->id }})"
                                                    class="btn btn-danger btn-sm"
                                                    title="Delete Brand"
                                                >

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </div>


                                            {{-- Delete Form --}}
                                            <form
                                                id="delete-form-{{ $brand->id }}"
                                                action="{{ route('admin.brands.destroy', $brand->id) }}"
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

                                        <td colspan="9"
                                            class="text-center py-4">

                                            <i class="fas fa-info-circle text-muted"></i>

                                            <span class="text-muted">

                                                No brands found.

                                                Click

                                                <a href="{{ route('admin.brands.create') }}">
                                                    here
                                                </a>

                                                to add your first brand.

                                            </span>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>
                    {{-- /.card-body --}}


                    {{-- Pagination --}}
                    <div class="card-footer clearfix">

                        @if(method_exists($brands, 'hasPages') && $brands->hasPages())

                            <div class="float-right">

                                {{ $brands->withQueryString()->links() }}

                            </div>

                        @endif


                        <div class="float-left">

                            <small class="text-muted">

                                Showing

                                {{ $brands->firstItem() ?? 0 }}

                                to

                                {{ $brands->lastItem() ?? 0 }}

                                of

                                {{ $brands->total() }}

                                brands

                            </small>

                        </div>

                    </div>
                    {{-- /.card-footer --}}

                </div>
                {{-- /.card --}}

            </div>

        </div>

    </div>

</section>

@endsection


{{-- ========================================================= --}}
{{-- CSS --}}
{{-- ========================================================= --}}

@push('styles')

<style>

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    */

    .table td {
        vertical-align: middle;
    }


    /*
    |--------------------------------------------------------------------------
    | Brand Logo
    |--------------------------------------------------------------------------
    */

    .brand-logo {
        width: 40px !important;
        height: 40px !important;

        max-width: 40px !important;
        max-height: 40px !important;

        object-fit: contain;

        display: block;

        border-radius: 50%;

        background-color: #f8f9fa;

        border: 1px solid #dee2e6;

        padding: 2px;
    }


    /*
    |--------------------------------------------------------------------------
    | Action Buttons
    |--------------------------------------------------------------------------
    */

    .brand-actions {
        display: inline-flex;

        align-items: center;

        gap: 6px;
    }


    .brand-actions .btn {
        margin: 0 !important;

        width: 34px;
        height: 32px;

        display: inline-flex;

        align-items: center;
        justify-content: center;
    }


    /*
    |--------------------------------------------------------------------------
    | Badge
    |--------------------------------------------------------------------------
    */

    .badge {
        font-size: 12px;

        padding: 5px 10px;
    }


    /*
    |--------------------------------------------------------------------------
    | Slug Code
    |--------------------------------------------------------------------------
    */

    code {
        font-size: 12px;

        background: #f4f4f4;

        padding: 2px 6px;

        border-radius: 3px;
    }


    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    */

    .pagination {
        margin-bottom: 0;
    }


    /*
    |--------------------------------------------------------------------------
    | Table Action Column
    |--------------------------------------------------------------------------
    */

    .table th:last-child,
    .table td:last-child {
        white-space: nowrap;
    }

</style>

@endpush


{{-- ========================================================= --}}
{{-- JavaScript --}}
{{-- ========================================================= --}}

@push('js')

<script>

    function confirmDelete(event, brandId) {

        event.preventDefault();

        Swal.fire({

            title: 'Are you sure?',

            text: "You won't be able to revert this!",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#d33',

            cancelButtonColor: '#3085d6',

            confirmButtonText: 'Yes, delete it!',

            cancelButtonText: 'Cancel'

        }).then((result) => {

            if (result.isConfirmed) {

                document
                    .getElementById('delete-form-' + brandId)
                    .submit();

            }

        });

    }

</script>

@endpush