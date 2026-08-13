@extends('layouts.master')

@section('content')


@include('admin.components.alert')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Products</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Products
                    </li>

                </ol>

            </div>

        </div>

    </div>
</section>


<!-- Main Content -->
<section class="content">

    <div class="container-fluid">

        <div class="card">

            <!-- Card Header -->
            <div class="card-header">

                <div class="row align-items-center">

                    <div class="col-md-6">

                        <h3 class="card-title">
                            Product List
                        </h3>

                    </div>

                    <div class="col-md-6 text-right">

                        <a href="{{ route('admin.products.create') }}"
                           class="btn btn-primary btn-sm">

                            <i class="fas fa-plus"></i>
                            Add Product

                        </a>

                    </div>

                </div>

            </div>


            <!-- Search / Filter -->
            <div class="card-body border-bottom">

                <form method="GET"
                      action="{{ route('admin.products.index') }}">

                    <div class="row">

                        <!-- Search -->
                        <div class="col-md-4 mb-2">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search product..."
                                value="{{ request('search') }}"
                            >

                        </div>


                        <!-- Category -->
                        <div class="col-md-3 mb-2">

                            <select name="category_id"
                                    class="form-control">

                                <option value="">
                                    All Categories
                                </option>

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        @selected(request('category_id') == $category->id)
                                    >
                                        {{ $category->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <!-- Status -->
                        <div class="col-md-3 mb-2">

                            <select name="status"
                                    class="form-control">

                                <option value="">
                                    All Status
                                </option>

                                <option
                                    value="draft"
                                    @selected(request('status') === 'draft')
                                >
                                    Draft
                                </option>

                                <option
                                    value="published"
                                    @selected(request('status') === 'published')
                                >
                                    Published
                                </option>

                                <option
                                    value="archived"
                                    @selected(request('status') === 'archived')
                                >
                                    Archived
                                </option>

                            </select>

                        </div>


                        <!-- Search Button -->
                        <div class="col-md-2 mb-2">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-search"></i>
                                Search

                            </button>

                            <a href="{{ route('admin.products.index') }}"
                               class="btn btn-secondary">

                                Reset

                            </a>

                        </div>

                    </div>

                </form>

            </div>


            <!-- Product Table -->
            <div class="card-body p-0">

                <div class="table-responsive">

                    <table
                        id="example1"
                        class="table table-bordered table-striped table-hover text-center mb-0"
                    >

                        <thead>

                            <tr>

                                <th width="50">
                                    NO:
                                </th>

                                <th width="90">
                                    Image
                                </th>

                                <th>
                                    Product
                                </th>

                                <th>
                                    SKU
                                </th>

                                <th>
                                    Category
                                </th>

                                <th>
                                    Brand
                                </th>

                                <th>
                                    Price
                                </th>

                                <th>
                                    Stock
                                </th>

                                <th>
                                    Featured
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Created At
                                </th>

                                <th width="120">
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($products as $product)

                                <tr>

                                    <!-- Serial -->
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <!-- Image -->
                                    <td>

                                        @if($product->image)

                                            <img
                                                src="{{ asset('storage/' . $product->image) }}"
                                                alt="{{ $product->name }}"
                                                width="65"
                                                height="65"
                                                class="rounded"
                                                style="object-fit: cover;"
                                            >

                                        @else

                                            <span class="text-muted">
                                                No Image
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Product -->
                                    <td class="text-left">

                                        <strong>
                                            {{ $product->name }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            {{ $product->slug }}
                                        </small>

                                    </td>


                                    <!-- SKU -->
                                    <td>
                                        {{ $product->sku ?? '-' }}
                                    </td>


                                    <!-- Category -->
                                    <td>

                                        {{ $product->category?->name ?? '-' }}

                                        @if($product->subCategory)

                                            <br>

                                            <small class="text-muted">
                                                {{ $product->subCategory->name }}
                                            </small>

                                        @endif

                                    </td>


                                    <!-- Brand -->
                                    <td>
                                        {{ $product->brand?->name ?? '-' }}
                                    </td>


                                    <!-- Price -->
                                    <td>

                                        @if($product->sale_price !== null)

                                            <del class="text-muted">
                                                ${{ number_format($product->regular_price, 2) }}
                                            </del>

                                            <br>

                                            <strong class="text-success">
                                                ${{ number_format($product->sale_price, 2) }}
                                            </strong>

                                            @if($product->discount > 0)

                                                <br>

                                                <small class="text-danger">
                                                    {{ number_format($product->discount, 2) }}% OFF
                                                </small>

                                            @endif

                                        @else

                                            <strong>
                                                ${{ number_format($product->regular_price, 2) }}
                                            </strong>

                                        @endif

                                    </td>


                                    <!-- Stock -->
                                    <td>

                                        {{ $product->stock_quantity }}

                                        @if(
                                            $product->stock_quantity <=
                                            $product->low_stock_threshold
                                        )

                                            <br>

                                            <span class="badge badge-danger">
                                                Low Stock
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Featured -->
                                    <td>

                                        @if($product->is_featured)

                                            <span class="badge badge-warning">
                                                Featured
                                            </span>

                                        @else

                                            <span class="badge badge-secondary">
                                                No
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Status -->
                                    <td>

                                        @if($product->status === 'published')

                                            <span class="badge badge-success">
                                                Published
                                            </span>

                                        @elseif($product->status === 'draft')

                                            <span class="badge badge-warning">
                                                Draft
                                            </span>

                                        @elseif($product->status === 'archived')

                                            <span class="badge badge-secondary">
                                                Archived
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Created At -->
                                    <td>

                                        {{ $product->created_at?->format('d M Y') }}

                                    </td>


                                    <!-- Action -->
                                    <td>

                                        <!-- Edit -->
                                        <a
                                            href="{{ route('admin.products.edit', $product->id) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit"
                                        >

                                            <i class="fas fa-edit"></i>

                                        </a>


                                        <!-- Delete -->
                                        <button
                                            type="button"
                                            onclick="confirmDelete(event, {{ $product->id }})"
                                            class="btn btn-danger btn-sm"
                                            title="Delete"
                                        >

                                            <i class="fas fa-trash"></i>

                                        </button>


                                        <!-- Delete Form -->
                                        <form
                                            id="delete-form-{{ $product->id }}"
                                            action="{{ route('admin.products.destroy', $product->id) }}"
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

                                    <td colspan="12"
                                        class="text-center py-4">

                                        <strong>
                                            No products found.
                                        </strong>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- Pagination -->
            @if(method_exists($products, 'hasPages') && $products->hasPages())

                <div class="card-footer">

                    {{ $products->links() }}

                </div>

            @endif

        </div>

    </div>

</section>


@endsection

@push('js')

<script>

    function confirmDelete(event, productId) {

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
                    .getElementById('delete-form-' + productId)
                    .submit();

            }

        });

    }

</script>

@endpush
