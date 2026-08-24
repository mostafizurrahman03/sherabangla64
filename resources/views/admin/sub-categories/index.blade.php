@extends('layouts.master')

@section('title', 'Manage Sub Categories')

@section('content')

@include('admin.components.alert')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Sub Categories</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Sub Categories
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

                    {{-- Header --}}
                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-sitemap"></i>

                            Sub Category List

                        </h3>


                        <div class="card-tools">

                            <a
                                href="{{ route('admin.sub-categories.create') }}"
                                class="btn btn-success btn-sm"
                            >

                                <i class="fas fa-plus"></i>

                                Add New Sub Category

                            </a>

                        </div>

                    </div>


                    {{-- Search --}}
                    <div class="card-body border-bottom">

                        <form
                            method="GET"
                            action="{{ route('admin.sub-categories.index') }}"
                        >

                            <div class="row">

                                <div class="col-md-3 mb-2">

                                    <input
                                        type="text"
                                        name="search"
                                        class="form-control"
                                        placeholder="Search sub-category..."
                                        value="{{ request('search') }}"
                                    >

                                </div>


                                <div class="col-md-3 mb-2">

                                    <select
                                        name="category_id"
                                        class="form-control"
                                    >

                                        <option value="">
                                            All Categories
                                        </option>

                                        @foreach($categories as $category)

                                            <option
                                                value="{{ $category->id }}"
                                                @selected(
                                                    request('category_id') == $category->id
                                                )
                                            >
                                                {{ $category->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


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


                                <div class="col-md-2 mb-2">

                                    <select
                                        name="sort_by"
                                        class="form-control"
                                    >

                                        <option
                                            value="created_at"
                                            @selected(
                                                request('sort_by', 'created_at') === 'created_at'
                                            )
                                        >
                                            Created Date
                                        </option>

                                        <option
                                            value="name"
                                            @selected(
                                                request('sort_by') === 'name'
                                            )
                                        >
                                            Name
                                        </option>

                                        <option
                                            value="sort_order"
                                            @selected(
                                                request('sort_by') === 'sort_order'
                                            )
                                        >
                                            Sort Order
                                        </option>

                                    </select>

                                </div>


                                <div class="col-md-2 mb-2">

                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >

                                        <i class="fas fa-search"></i>

                                        Search

                                    </button>


                                    <a
                                        href="{{ route('admin.sub-categories.index') }}"
                                        class="btn btn-secondary"
                                    >

                                        Reset

                                    </a>

                                </div>

                            </div>

                        </form>

                    </div>


                    {{-- Table --}}
                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover text-nowrap">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Image</th>

                                    <th>Name</th>

                                    <th>Category</th>

                                    <th>Slug</th>

                                    <th>Sort Order</th>

                                    <th>Products</th>

                                    <th>Status</th>

                                    <th>Created</th>

                                    <th>Actions</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($subCategories as $subCategory)

                                    <tr>

                                        {{-- # --}}
                                        <td>

                                            {{ $subCategories->firstItem() + $loop->index }}

                                        </td>


                                        {{-- Image --}}
                                        <td>

                                            @if($subCategory->image)

                                                <img
                                                    src="{{ asset('storage/' . $subCategory->image) }}"
                                                    alt="{{ $subCategory->name }}"
                                                    class="subcategory-image"
                                                    width="70"
                                                >

                                            @else

                                                <div class="no-image">

                                                    <i class="fas fa-image"></i>

                                                </div>

                                            @endif

                                        </td>


                                        {{-- Name --}}
                                        <td>

                                            <strong>
                                                {{ $subCategory->name }}
                                            </strong>

                                            @if($subCategory->description)

                                                <br>

                                                <small class="text-muted">

                                                    {{ Str::limit($subCategory->description, 50) }}

                                                </small>

                                            @endif

                                        </td>


                                        {{-- Category --}}
                                        <td>

                                            @if($subCategory->category)

                                                <span class="badge badge-primary">

                                                    {{ $subCategory->category->name }}

                                                </span>

                                            @else

                                                <span class="badge badge-secondary">
                                                    N/A
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Slug --}}
                                        <td>

                                            <code>
                                                {{ $subCategory->slug }}
                                            </code>

                                        </td>


                                        {{-- Sort --}}
                                        <td class="text-center">

                                            {{ $subCategory->sort_order ?? 0 }}

                                        </td>


                                        {{-- Products --}}
                                        <td class="text-center">

                                            <span class="badge badge-info">

                                                {{ $subCategory->products_count }}

                                            </span>

                                        </td>


                                        {{-- Status --}}
                                        <td>

                                            @if($subCategory->is_active)

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
                                        <td>

                                            {{ $subCategory->created_at?->format('d M Y') }}

                                        </td>


                                        {{-- Actions --}}
                                        <td>

                                            <div class="action-buttons">

                                                <a
                                                    href="{{ route('admin.sub-categories.edit', $subCategory->id) }}"
                                                    class="btn btn-warning btn-sm mr-2"
                                                    title="Edit"
                                                >

                                                    <i class="fas fa-edit"></i>

                                                </a>


                                                <button
                                                    type="button"
                                                    onclick="confirmDelete(
                                                        event,
                                                        {{ $subCategory->id }}
                                                    )"
                                                    class="btn btn-danger btn-sm"
                                                    title="Delete"
                                                >

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </div>


                                            <form
                                                id="delete-form-{{ $subCategory->id }}"
                                                action="{{ route('admin.sub-categories.destroy', $subCategory->id) }}"
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

                                        <td
                                            colspan="10"
                                            class="text-center py-4"
                                        >

                                            <i class="fas fa-info-circle text-muted"></i>

                                            <span class="text-muted">

                                                No sub-categories found.

                                                <a
                                                    href="{{ route('admin.sub-categories.create') }}"
                                                >
                                                    Add your first sub-category
                                                </a>

                                            </span>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Footer --}}
                    <div class="card-footer clearfix">

                        <div class="float-right">

                            {{ $subCategories->links() }}

                        </div>

                        <div class="float-left">

                            <small class="text-muted">

                                Showing
                                {{ $subCategories->firstItem() ?? 0 }}

                                to

                                {{ $subCategories->lastItem() ?? 0 }}

                                of

                                {{ $subCategories->total() }}

                                sub-categories

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

    .table td {
        vertical-align: middle;
    }

    .subcategory-image {

        width: 45px !important;

        height: 45px !important;

        max-width: 45px !important;

        max-height: 45px !important;

        object-fit: contain;

        border-radius: 6px;

        border: 1px solid #ddd;

        padding: 2px;

        background: #fff;

    }

    .no-image {

        width: 45px;

        height: 45px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #f4f4f4;

        border: 1px solid #ddd;

        border-radius: 6px;

        color: #999;

    }

    .badge {

        font-size: 12px;

        padding: 5px 9px;

    }

    .action-buttons {

        display: flex;

        align-items: center;

        gap: 8px;

    }

    .action-buttons .btn {

        margin: 0 !important;

    }

    code {

        font-size: 12px;

        background: #f4f4f4;

        padding: 2px 6px;

        border-radius: 3px;

    }

    .pagination {

        margin-bottom: 0;
    }

</style>

@endpush


@push('js')

<script>

function confirmDelete(event, subCategoryId)
{
    event.preventDefault();

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
                .getElementById(
                    'delete-form-' + subCategoryId
                )
                .submit();

        }

    });
}

</script>

@endpush