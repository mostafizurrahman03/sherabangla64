@extends('layouts.master')

@section('title')
{{ isset($miniFeature) ? 'Edit' : 'Create' }} MiniFeature
@endsection

@section('content')
@include('admin.components.alert')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($miniFeature) ? 'Edit' : 'Create' }} MiniFeature</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">MiniFeature</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ isset($miniFeature) ? 'Edit' : 'Create' }} MiniFeature Section</h3>
          </div>

          <!-- Form Starts -->
          <form
            action="{{ isset($miniFeature) ? route('mini_feature.update', $miniFeature->id) : route('mini_feature.store') }}"
            method="POST" enctype="multipart/form-data">

            @csrf
            @if(isset($miniFeature))
            @method('PUT')
            @endif

            <div class="card-body">
              <div class="form-group">
                <label for="icon">Feature Icon (FontAwesome Class)</label>
                <input type="text" name="icon" class="form-control" id="icon" placeholder="e.g. fa-camera"
                  value="{{ old('icon', $miniFeature->icon ?? '') }}">
                <small class="text-muted">Use FontAwesome icon class name, visit.
                  <code> <a href="https://fontawesome.com/v4/icons/" target="_blank">https://fontawesome.com/v4/icons/</a> </code>.</small>
              </div>

              <div class="form-group">
                <label for="title">Feature Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title"
                  value="{{ old('title', $miniFeature->title ?? '') }}" required>
              </div>

              <div class="form-group">
                <label for="subtitle">Feature Subtitle</label>
                <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Enter subtitle"
                  value="{{ old('subtitle', $miniFeature->subtitle ?? '') }}" required>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  {{ isset($miniFeature) ? 'Update' : 'Create' }}
                </button>
              </div>
            </div>

          </form>
          <!-- Form Ends -->

        </div>
      </div>
    </div>
  </div>
</section>
@endsection