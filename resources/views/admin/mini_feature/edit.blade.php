@extends('layouts.master')

@section('title')
Update Header
@endsection

@section('content')
@include('admin.components.alert')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Header</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Update Header</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Header Section</h3>
          </div>

          <form action="{{ route('header.update', $header->id ?? 1) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
              <div class="form-group">
                <label for="title">Header Title<span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" id="title"
                  value="{{ old('title', $header->title ?? '') }}" placeholder="Enter main title, e.g. 'View The World'"
                  required>
              </div>

              <div class="form-group">
                <label for="highlight">Highlight Text<span class="text-danger">*</span></label>
                <input type="text" name="highlight" class="form-control" id="highlight"
                  value="{{ old('highlight', $header->highlight ?? '') }}"
                  placeholder="Enter highlight text, e.g. 'With Drones'" required>
              </div>

              <div class="form-group">
                <label for="description">Short Description<span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control" rows="3" required
                  placeholder="Enter description...">{{ old('description', $header->description ?? '') }}</textarea>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="button_text">Button Text<span class="text-danger">*</span></label>
                    <input type="text" name="button_text" class="form-control" id="button_text"
                      value="{{ old('button_text', $header->button_text ?? '') }}" placeholder="e.g. 'Shop Now'">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="button_link">Button Link</label>
                    <input type="url" name="button_link" class="form-control" id="button_link"
                      value="{{ old('button_link', $header->button_link ?? '') }}"
                      placeholder="e.g. https://yourdomain.com/shop">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="image">Header Image<span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image">
                    <label class="custom-file-label" for="image">Choose image</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @if(!empty($header->image))
                <div class="mt-3">
                  <img src="{{ asset('uploads/header/'.$header->image) }}" alt="Header Image" width="200"
                    class="img-thumbnail rounded">
                </div>
                @endif
              </div>
            </div>

            <div class="card-footer ">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-1"></i> Save Changes
              </button>
            </div>
          </form>
        </div>
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection