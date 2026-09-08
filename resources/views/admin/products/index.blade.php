@extends('layouts.master')

@push('css')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

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
            <div class="card-header d-flex align-items-center">
                <div class="flex-grow-1">
                    <h3 class="card-title">Product List</h3>
                </div>
                <div>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
            </div>


            <div class="card-body border-bottom">

                <form method="GET"
                    action="{{ route('admin.products.index') }}"
                    id="filterForm">

                    <div class="row">

                        {{-- Search --}}
                        <div class="col-md-4 mb-2">
                            <label for="search" class="sr-only">
                                Search Products
                            </label>

                            <div class="input-group">
                                <input
                                    type="text"
                                    name="search"
                                    id="search"
                                    class="form-control"
                                    value="{{ request('search') }}"
                                    placeholder="Search by product name, SKU or slug..."
                                    autocomplete="off"
                                >

                                @if(request('search'))
                                    <div class="input-group-append">
                                        <a
                                            href="{{ route('admin.products.index', request()->except('search')) }}"
                                            class="btn btn-outline-secondary"
                                            title="Clear search"
                                        >
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Category --}}
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
                                            (string) request('category_id')
                                            ===
                                            (string) $category->id
                                        )
                                    >
                                        {{ $category->name }}
                                    </option>

                                @endforeach
                            </select>

                        </div>

                        {{-- Status --}}
                        <div class="col-md-3 mb-2">

                            <select
                                name="status"
                                class="form-control"
                            >
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

                        {{-- Buttons --}}
                        <div class="col-md-2 mb-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <i class="fas fa-search"></i>
                                Search
                            </button>

                            <a
                                href="{{ route('admin.products.index') }}"
                                class="btn btn-secondary"
                            >
                                <i class="fas fa-sync-alt"></i>
                                Reset
                            </a>

                        </div>

                    </div>

                </form>

            </div>


            <!-- Product Table -->
            <div class="card-body">

                <div class="table-responsive">

                    <table
                        id="productTable"
                        class="table table-bordered table-striped table-hover text-center"
                    >

                        <thead>

                            <tr>

                                <th width="50">NO:</th>
                                <th width="90">Image</th>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Featured</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th width="120">Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($products as $product)

                                <tr>

                                    <!-- Serial -->
                                    <td>
                                        {{ $products->firstItem() + $loop->index }}
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
                                                width="70"
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
                                                ৳{{ number_format($product->regular_price, 2) }}
                                            </del>

                                            <br>

                                            <strong class="text-success">
                                                ৳{{ number_format($product->sale_price, 2) }}
                                            </strong>

                                            @if($product->discount > 0)

                                                <br>

                                                <small class="text-danger">
                                                    {{ number_format($product->discount, 2) }}% OFF
                                                </small>

                                            @endif

                                        @else

                                            <strong>
                                                ৳{{ number_format($product->regular_price, 2) }}
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
                                            class="btn btn-warning btn-sm mr-2"
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


            <!-- Bottom Pagination -->
            @if($products->hasPages())

                <div class="card-footer">

                    <div class="row align-items-center">

                        <!-- Pagination Information -->
                        <div class="col-md-6">

                            <div class="text-muted">

                                Showing
                                <strong>{{ $products->firstItem() }}</strong>
                                to
                                <strong>{{ $products->lastItem() }}</strong>
                                of
                                <strong>{{ $products->total() }}</strong>
                                products

                            </div>

                        </div>


                        <!-- Pagination Links -->
                        <div class="col-md-6">

                            <div class="float-right">

                                {{ $products->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}

                            </div>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>
</section>

@endsection


@push('js')

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        // Initialize DataTable with all features
        var table = $('#productTable').DataTable({
            // Disable DataTable's default pagination
            "paging": false,
            "info": false,
            "ordering": true,
            "searching": false, // We use our own search
            "lengthChange": false,
            "pageLength": 25,
            "order": [],
            "columnDefs": [
                { "orderable": false, "targets": [0, 1, 8, 9, 10, 11] }, // Disable sorting on action columns
                { "orderable": true, "targets": [2, 3, 4, 5, 6, 7] } // Enable sorting on data columns
            ],
            "dom": 'lBfrtip',
            "buttons": [
                {
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copy',
                    className: 'btn btn-sm btn-secondary',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv"></i> CSV',
                    className: 'btn btn-sm btn-success',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-sm btn-success',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-sm btn-danger',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Print',
                    className: 'btn btn-sm btn-secondary',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns"></i> Column visibility',
                    className: 'btn btn-sm btn-primary',
                    columns: ':not(:last-child)' // Hide column visibility toggle for action column
                }
            ]
        });

        // Add custom "Show entries" dropdown
        $('#productTable_length').addClass('d-inline-block mr-2');
        $('.dataTables_length').addClass('d-inline-block');

        // Move the "Show entries" to the left side
        $('.dataTables_length').css('float', 'left');

        // Style the buttons container
        $('.dt-buttons').addClass('float-right');

        // Make buttons smaller
        $('.dt-buttons .btn').addClass('btn-sm');

        // Handle filter form submit with DataTable
        $('#filterForm').on('submit', function(e) {
            // DataTable will handle the filtering via server-side
            // This is just for the form submission
        });

    });

    // Delete confirmation with SweetAlert2
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