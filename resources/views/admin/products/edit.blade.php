@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')

    @include('admin.components.alert')

    {{-- Content Header --}}
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.products.index') }}">
                                Products
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Edit Product
                        </li>

                    </ol>
                </div>

            </div>

        </div>
    </section>


    {{-- Main Content --}}
    <section class="content">

        <div class="container-fluid">

            <form
                action="{{ route('admin.products.update', $product->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="row">

                    {{-- =========================================================
                        LEFT COLUMN
                    ========================================================== --}}
                    <div class="col-md-8">


                        {{-- Basic Information --}}
                        <div class="card card-primary">

                            <div class="card-header">

                                <h3 class="card-title">
                                    <i class="fas fa-box"></i>
                                    Basic Information
                                </h3>

                            </div>

                            <div class="card-body">

                                {{-- Product Name --}}
                                <div class="form-group">

                                    <label for="name">
                                        Product Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $product->name) }}"
                                        placeholder="Enter product name"
                                        required
                                    >

                                    @error('name')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Slug + SKU --}}
                                <div class="row">

                                    {{-- Slug --}}
                                    <div class="col-md-6 form-group">

                                        <label for="slug">
                                            Slug
                                        </label>

                                        <input
                                            type="text"
                                            name="slug"
                                            id="slug"
                                            class="form-control @error('slug') is-invalid @enderror"
                                            value="{{ old('slug', $product->slug) }}"
                                            placeholder="product-slug"
                                        >

                                        @error('slug')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>


                                    {{-- SKU --}}
                                    <div class="col-md-6 form-group">

                                        <label for="sku">
                                            SKU
                                        </label>

                                        <input
                                            type="text"
                                            name="sku"
                                            id="sku"
                                            class="form-control @error('sku') is-invalid @enderror"
                                            value="{{ old('sku', $product->sku) }}"
                                            placeholder="e.g. PROD-1001"
                                        >

                                        @error('sku')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Short Description --}}
                                <div class="form-group">

                                    <label for="short_desc">
                                        Short Description
                                    </label>

                                    <textarea
                                        name="short_desc"
                                        id="short_desc"
                                        rows="3"
                                        class="form-control @error('short_desc') is-invalid @enderror"
                                        placeholder="Brief overview of the product"
                                    >{{ old('short_desc', $product->short_desc) }}</textarea>

                                    @error('short_desc')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Full Description --}}
                                <div class="form-group">

                                    <label for="full_desc">
                                        Full Description
                                    </label>

                                    <textarea
                                        name="full_desc"
                                        id="full_desc"
                                        rows="7"
                                        class="form-control @error('full_desc') is-invalid @enderror"
                                        placeholder="Detailed product specification"
                                    >{{ old('full_desc', $product->full_desc) }}</textarea>

                                    @error('full_desc')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- Pricing & Inventory --}}
                        <div class="card card-secondary">

                            <div class="card-header">

                                <h3 class="card-title">
                                    <i class="fas fa-dollar-sign"></i>
                                    Pricing & Inventory
                                </h3>

                            </div>

                            <div class="card-body">

                                <div class="row">

                                    {{-- Regular Price --}}
                                    <div class="col-md-4 form-group">

                                        <label for="regular_price">
                                            Regular Price
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input
                                            type="number"
                                            step="0.01"
                                            name="regular_price"
                                            id="regular_price"
                                            class="form-control @error('regular_price') is-invalid @enderror"
                                            value="{{ old('regular_price', $product->regular_price) }}"
                                            placeholder="0.00"
                                            required
                                        >

                                        @error('regular_price')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>


                                    {{-- Sale Price --}}
                                    <div class="col-md-4 form-group">

                                        <label for="sale_price">
                                            Sale Price
                                        </label>

                                        <input
                                            type="number"
                                            step="0.01"
                                            name="sale_price"
                                            id="sale_price"
                                            class="form-control @error('sale_price') is-invalid @enderror"
                                            value="{{ old('sale_price', $product->sale_price) }}"
                                            placeholder="0.00"
                                        >

                                        @error('sale_price')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>


                                    {{-- Discount --}}
                                    <div class="col-md-4 form-group">

                                        <label for="discount">
                                            Discount Amount / %
                                        </label>

                                        <input
                                            type="number"
                                            step="0.01"
                                            name="discount"
                                            id="discount"
                                            class="form-control @error('discount') is-invalid @enderror"
                                            value="{{ old('discount', $product->discount ?? 0) }}"
                                            placeholder="0"
                                        >

                                        @error('discount')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>


                                    {{-- Stock Quantity --}}
                                    <div class="col-md-6 form-group">

                                        <label for="stock_quantity">
                                            Stock Quantity
                                        </label>

                                        <input
                                            type="number"
                                            name="stock_quantity"
                                            id="stock_quantity"
                                            min="0"
                                            class="form-control @error('stock_quantity') is-invalid @enderror"
                                            value="{{ old('stock_quantity', $product->stock_quantity ?? 0) }}"
                                        >

                                        @error('stock_quantity')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>


                                    {{-- Low Stock Threshold --}}
                                    <div class="col-md-6 form-group">

                                        <label for="low_stock_threshold">
                                            Low Stock Threshold
                                        </label>

                                        <input
                                            type="number"
                                            name="low_stock_threshold"
                                            id="low_stock_threshold"
                                            min="0"
                                            class="form-control @error('low_stock_threshold') is-invalid @enderror"
                                            value="{{ old('low_stock_threshold', $product->low_stock_threshold ?? 5) }}"
                                        >

                                        @error('low_stock_threshold')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- SEO --}}
                        <div class="card card-info">

                            <div class="card-header">

                                <h3 class="card-title">
                                    <i class="fas fa-search"></i>
                                    SEO Optimization
                                </h3>

                            </div>

                            <div class="card-body">

                                {{-- Meta Title --}}
                                <div class="form-group">

                                    <label for="meta_title">
                                        Meta Title
                                    </label>

                                    <input
                                        type="text"
                                        name="meta_title"
                                        id="meta_title"
                                        class="form-control @error('meta_title') is-invalid @enderror"
                                        value="{{ old('meta_title', $product->meta_title) }}"
                                        placeholder="Search engine title"
                                    >

                                    @error('meta_title')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Meta Description --}}
                                <div class="form-group">

                                    <label for="meta_description">
                                        Meta Description
                                    </label>

                                    <textarea
                                        name="meta_description"
                                        id="meta_description"
                                        rows="4"
                                        class="form-control @error('meta_description') is-invalid @enderror"
                                        placeholder="Search engine description"
                                    >{{ old('meta_description', $product->meta_description) }}</textarea>

                                    @error('meta_description')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =========================================================
                        RIGHT COLUMN
                    ========================================================== --}}
                    <div class="col-md-4">


                        {{-- Organization --}}
                        <div class="card card-secondary">

                            <div class="card-header">

                                <h3 class="card-title">
                                    <i class="fas fa-sitemap"></i>
                                    Organization
                                </h3>

                            </div>

                            <div class="card-body">


                                {{-- Category --}}
                                <div class="form-group">

                                    <label for="category_id">
                                        Category
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select
                                        name="category_id"
                                        id="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror"
                                        required
                                    >

                                        <option value="">
                                            Select Category
                                        </option>

                                        @foreach($categories as $category)

                                            <option
                                                value="{{ $category->id }}"
                                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                                            >
                                                {{ $category->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Sub Category --}}
                                <div class="form-group">

                                    <label for="sub_category_id">
                                        Sub Category
                                    </label>

                                    <select
                                        name="sub_category_id"
                                        id="sub_category_id"
                                        class="form-control @error('sub_category_id') is-invalid @enderror"
                                    >

                                        <option value="">
                                            Select Sub Category
                                        </option>

                                        @foreach($subCategories ?? [] as $subCategory)

                                            <option
                                                value="{{ $subCategory->id }}"
                                                {{ old('sub_category_id', $product->sub_category_id) == $subCategory->id ? 'selected' : '' }}
                                            >
                                                {{ $subCategory->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('sub_category_id')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Brand --}}
                                <div class="form-group">

                                    <label for="brand_id">
                                        Brand
                                    </label>

                                    <select
                                        name="brand_id"
                                        id="brand_id"
                                        class="form-control @error('brand_id') is-invalid @enderror"
                                    >

                                        <option value="">
                                            Select Brand
                                        </option>

                                        @foreach($brands ?? [] as $brand)

                                            <option
                                                value="{{ $brand->id }}"
                                                {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}
                                            >
                                                {{ $brand->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                    @error('brand_id')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- Product Image --}}
                        <div class="card card-secondary">

                            <div class="card-header">

                                <h3 class="card-title">
                                    <i class="fas fa-image"></i>
                                    Product Image
                                </h3>

                            </div>

                            <div class="card-body">


                                {{-- Current Image --}}
                                @if($product->image)

                                    <div class="text-center mb-3">

                                        <p class="text-muted mb-2">
                                            Current Image
                                        </p>

                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="product-current-image"
                                            width="70"
                                        >

                                    </div>

                                @endif


                                {{-- New Image --}}
                                <div class="form-group">

                                    <label for="image">
                                        {{ $product->image ? 'Change Image' : 'Product Image' }}
                                    </label>

                                    <div class="custom-file">

                                        <input
                                            type="file"
                                            name="image"
                                            id="image"
                                            accept="image/*"
                                            class="custom-file-input @error('image') is-invalid @enderror"
                                        >

                                        <label
                                            class="custom-file-label"
                                            for="image"
                                        >
                                            Choose new image
                                        </label>

                                    </div>

                                    @error('image')
                                        <span class="text-danger small">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- Publish Options --}}
                        <div class="card card-success">

                            <div class="card-header">

                                <h3 class="card-title">
                                    <i class="fas fa-cog"></i>
                                    Publish Options
                                </h3>

                            </div>

                            <div class="card-body">


                                {{-- Status --}}
                                <div class="form-group">

                                    <label for="status">
                                        Status
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select
                                        name="status"
                                        id="status"
                                        class="form-control @error('status') is-invalid @enderror"
                                        required
                                    >

                                        <option
                                            value="draft"
                                            {{ old('status', $product->status) === 'draft' ? 'selected' : '' }}
                                        >
                                            Draft
                                        </option>

                                        <option
                                            value="published"
                                            {{ old('status', $product->status) === 'published' ? 'selected' : '' }}
                                        >
                                            Published
                                        </option>

                                        <option
                                            value="archived"
                                            {{ old('status', $product->status) === 'archived' ? 'selected' : '' }}
                                        >
                                            Archived
                                        </option>

                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Sort Order --}}
                                <div class="form-group">

                                    <label for="sort_order">
                                        Sort Order
                                    </label>

                                    <input
                                        type="number"
                                        name="sort_order"
                                        id="sort_order"
                                        min="0"
                                        class="form-control @error('sort_order') is-invalid @enderror"
                                        value="{{ old('sort_order', $product->sort_order ?? 0) }}"
                                    >

                                    @error('sort_order')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>


                                {{-- Featured --}}
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            name="is_featured"
                                            class="custom-control-input"
                                            id="is_featured"
                                            value="1"
                                            {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                                        >
                                        <label
                                            class="custom-control-label"
                                            for="is_featured"
                                        >
                                            Featured Product
                                        </label>
                                    </div>
                                </div>

                                {{-- Flash --}}
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            name="is_flash"
                                            class="custom-control-input"
                                            id="is_flash"
                                            value="1"
                                            {{ old('is_flash', $product->is_flash) ? 'checked' : '' }}
                                        >
                                        <label
                                            class="custom-control-label"
                                            for="is_flash"
                                        >
                                            Flash Product
                                        </label>
                                    </div>
                                </div>

                                {{-- Best Selling --}}
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            name="is_best"
                                            class="custom-control-input"
                                            id="is_best"
                                            value="1"
                                            {{ old('is_best', $product->is_best) ? 'checked' : '' }}
                                        >
                                        <label
                                            class="custom-control-label"
                                            for="is_best"
                                        >
                                            Best Selling
                                        </label>
                                    </div>
                                </div>


                                <hr>


                                {{-- Update --}}
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    <i class="fas fa-save"></i>
                                    Update Product
                                </button>


                                {{-- Cancel --}}
                                <a
                                    href="{{ route('admin.products.index') }}"
                                    class="btn btn-secondary btn-block"
                                >
                                    <i class="fas fa-arrow-left"></i>
                                    Cancel
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </section>

@endsection


@push('styles')

<style>

    .product-current-image {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 4px;
        background: #fff;
    }

    .card {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: 600;
    }

    textarea {
        resize: vertical;
    }

</style>

@endpush


@push('js')

<script>

    // Show selected filename
    document.getElementById('image')?.addEventListener('change', function (event) {

        const fileName = event.target.files[0]?.name;

        if (fileName) {

            const label = document.querySelector(
                'label[for="image"]'
            );

            const customFileLabel = document.querySelector(
                '.custom-file-label'
            );

            if (customFileLabel) {
                customFileLabel.textContent = fileName;
            }

        }

    });

</script>

@endpush