@extends('layouts.master')

@section('title')
{{ isset($product) ? 'Edit' : 'Add' }} Product
@endsection

@section('content')
@include('admin.components.alert')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($product) ? 'Edit' : 'Add' }} Product</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ isset($product) ? 'Edit' : 'Add' }} Product</h3>
          </div>

          <form action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}"
            method="POST" enctype="multipart/form-data">

            @csrf
            @if(isset($product))
            @method('PUT')
            @endif

            <div class="card-body">

              {{-- Name --}}
              <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}"
                  required>
              </div>

              {{-- Feature --}}
              <div class="form-group">
                <label for="feature">Feature</label>
                <input type="text" name="feature" class="form-control"
                  value="{{ old('feature', $product->feature ?? '') }}" required>
              </div>

              {{-- Price --}}
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" class="form-control"
                  value="{{ old('price', $product->price ?? '') }}" required>
              </div>

              {{-- Discount Price --}}
              <div class="form-group">
                <label for="discount_price">Discount Price</label>
                <input type="number" step="0.01" name="discount_price" class="form-control"
                  value="{{ old('discount_price', $product->discount_price ?? '') }}" required>
              </div>

              {{-- Image --}}
              <div class="form-group">
                <label for="image">Product Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image" accept="image/*" {{
                      isset($product) ? '' : 'required' }}>
                    <label class="custom-file-label" for="image">Choose image</label>
                  </div>
                </div>

                @if(isset($product) && $product->image)
                <div class="mt-2">
                  <img src="{{ asset($product->image) }}" alt="Product Image" style="max-height: 120px;">
                </div>
                @endif
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">
                {{ isset($product) ? 'Update' : 'Create' }}
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection