@extends('layouts.master')

@section('title', 'Manage Categories')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>Categories</h1>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Categories
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

                            <i class="fas fa-list"></i>

                            Category List

                        </h3>


                        <div class="card-tools">

                            <a href="{{ route('admin.categories.create') }}"
                               class="btn btn-success btn-sm">

                                <i class="fas fa-plus"></i>

                                Add New Category

                            </a>

                        </div>

                    </div>


                    {{-- Search / Filter --}}
                    <div class="card-body border-bottom">

                        <form method="GET"
                              action="{{ route('admin.categories.index') }}">

                            <div class="row">

                                {{-- Search --}}
                                <div class="col-md-4 mb-2">

                                    <input
                                        type="text"
                                        name="search"
                                        class="form-control"
                                        placeholder="Search category..."
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


                                    <a href="{{ route('admin.categories.index') }}"
                                       class="btn btn-secondary">

                                        Reset

                                    </a>

                                </div>

                            </div>

                        </form>

                    </div>


                    {{-- Table --}}
                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover text-nowrap category-table">

                            <thead>

                                <tr>

                                    <th style="width: 50px;">
                                        #
                                    </th>

                                    <th style="width: 70px;">
                                        Image
                                    </th>

                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Slug
                                    </th>

                                    <th style="width: 100px;">
                                        Sub Categories
                                    </th>

                                    <th style="width: 90px;">
                                        Products
                                    </th>

                                    <th style="width: 90px;">
                                        Sort
                                    </th>

                                    <th style="width: 110px;">
                                        Status
                                    </th>

                                    <th style="width: 120px;">
                                        Created
                                    </th>

                                    <th style="width: 130px;">
                                        Actions
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($categories as $category)

                                    <tr>

                                        {{-- Serial --}}
                                        <td class="text-center">

                                            {{ $categories->firstItem() + $loop->index }}

                                        </td>


                                        {{-- Image --}}
                                        <td>

                                            @if($category->image)

                                                <div class="category-image-wrapper">

                                                    <img
                                                        src="{{ asset('storage/' . $category->image) }}"
                                                        alt="{{ $category->name }}"
                                                        class="category-image"
                                                        width="70"
                                                    >

                                                </div>

                                            @else

                                                <div class="category-no-image">

                                                    <i class="fas fa-image"></i>

                                                </div>

                                            @endif

                                        </td>


                                        {{-- Name --}}
                                        <td>

                                            <strong>
                                                {{ $category->name }}
                                            </strong>

                                            @if($category->description)

                                                <br>

                                                <small class="text-muted">

                                                    {{ Str::limit($category->description, 50) }}

                                                </small>

                                            @endif

                                        </td>


                                        {{-- Slug --}}
                                        <td>

                                            <code>
                                                {{ $category->slug }}
                                            </code>

                                        </td>


                                        {{-- Sub Categories --}}
                                        <td class="text-center">

                                            <span class="badge badge-secondary">

                                                {{ $category->subCategories()->count() }}

                                            </span>

                                        </td>


                                        {{-- Products --}}
                                        <td class="text-center">

                                            <span class="badge badge-info">

                                                {{ $category->products_count ?? 0 }}

                                            </span>

                                        </td>


                                        {{-- Sort --}}
                                        <td class="text-center">

                                            {{ $category->sort_order ?? 0 }}

                                        </td>


                                        {{-- Status --}}
                                        <td class="text-center">

                                            @if($category->is_active)

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

                                            {{ $category->created_at?->format('d M Y') }}

                                        </td>


                                        {{-- Actions --}}
                                        <td class="text-center">

                                            <div class="category-actions">

                                                {{-- Edit --}}
                                                <a
                                                    href="{{ route('admin.categories.edit', $category->id) }}"
                                                    class="btn btn-warning btn-sm mr-2"
                                                    title="Edit"
                                                >

                                                    <i class="fas fa-edit"></i>

                                                </a>


                                                {{-- Delete --}}
                                                <button
                                                    type="button"
                                                    onclick="confirmDelete(event, {{ $category->id }})"
                                                    class="btn btn-danger btn-sm"
                                                    title="Delete"
                                                >

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </div>


                                            {{-- Delete Form --}}
                                            <form
                                                id="delete-form-{{ $category->id }}"
                                                action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="POST"
                                                style="display:none;"
                                            >

                                                @csrf

                                                @method('DELETE')

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="10"
                                            class="text-center py-4">

                                            <i class="fas fa-info-circle text-muted"></i>

                                            <span class="text-muted">

                                                No categories found.

                                                <a href="{{ route('admin.categories.create') }}">
                                                    Add your first category
                                                </a>

                                            </span>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Pagination --}}
                    <div class="card-footer clearfix">

                        @if($categories->hasPages())

                            <div class="float-right">

                                {{ $categories->withQueryString()->links() }}

                            </div>

                        @endif


                        <div class="float-left">

                            <small class="text-muted">

                                Showing

                                {{ $categories->firstItem() ?? 0 }}

                                to

                                {{ $categories->lastItem() ?? 0 }}

                                of

                                {{ $categories->total() }}

                                categories

                            </small>

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

    .category-table td {
        vertical-align: middle !important;
    }


    .category-image-wrapper {

        width: 40px !important;
        height: 40px !important;

        min-width: 40px !important;
        max-width: 40px !important;

        overflow: hidden;

        border-radius: 50%;

        border: 1px solid #dee2e6;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #f8f9fa;

    }


    .category-image {

        width: 40px !important;
        height: 40px !important;

        max-width: 40px !important;
        max-height: 40px !important;

        object-fit: contain !important;

        border-radius: 50%;

        padding: 2px;

    }


    .category-no-image {

        width: 40px;
        height: 40px;

        border-radius: 50%;

        background: #f1f1f1;

        border: 1px solid #ddd;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #999;

    }


    .category-actions {

        display: inline-flex;

        align-items: center;

        gap: 8px;

    }


    .category-actions .btn {

        width: 34px;
        height: 32px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        padding: 0;

    }


    .category-table code {

        font-size: 12px;

        background: #f4f4f4;

        padding: 2px 6px;

        border-radius: 3px;

    }


    .category-table .badge {

        font-size: 12px;

        padding: 5px 9px;

    }


    .pagination {
        margin-bottom: 0;
    }

</style>

@endpush


@push('js')

<script>

function confirmDelete(event, categoryId)
{
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
                .getElementById('delete-form-' + categoryId)
                .submit();

        }

    });
}

</script>

@endpush