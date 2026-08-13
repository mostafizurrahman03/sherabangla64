@extends('layouts.master')

@section('title')
{{ isset($feature) ? 'Edit' : 'Create' }} Feature
@endsection

@section('content')
@include('admin.components.alert')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($feature) ? 'Edit' : 'Create' }} Feature</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Feature</li>
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
            <h3 class="card-title">{{ isset($feature) ? 'Edit' : 'Create' }} Feature</h3>
          </div>

          <!-- Form -->
          <form action="{{ isset($feature) ? route('features.update', $feature->id) : route('features.store') }}"
            method="POST">
            @csrf
            @if(isset($feature))
            @method('PUT')
            @endif
            
            <div class="card-body">
              <div class="form-group">
                <label for="icon">Feature Icon (FontAwesome class)</label>
                <input type="text" name="icon" class="form-control" id="icon" placeholder="e.g., fa-gamepad"
                  value="{{ old('icon', $feature->icon ?? '') }}">
                <small class="text-muted">Use FontAwesome class like <code>fa-gamepad</code>,
                  <code>fa-plug</code></small>
              </div>

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter feature title"
                  value="{{ old('title', $feature->title ?? '') }}" required>
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4"
                  placeholder="Enter feature description"
                  required>{{ old('description', $feature->description ?? '') }}</textarea>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  {{ isset($feature) ? 'Update' : 'Create' }}
                </button>
              </div>
            </div>
          </form>
          <!-- End Form -->

        </div>
      </div>
    </div>
  </div>
</section>
@endsection