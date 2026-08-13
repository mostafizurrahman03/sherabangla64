@extends('layouts.master')

@section('title')
{{ isset($install) ? 'Edit' : 'Create' }} Install Step
@endsection

@section('content')
@include('admin.components.alert')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($install) ? 'Edit' : 'Create' }} Install Step</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Install</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ isset($install) ? 'Edit' : 'Create' }} Install Step</h3>
          </div>

          <!-- Form -->
          <form action="{{ isset($install) ? route('installs.update', $install->id) : route('installs.store') }}"
            method="POST">
            @csrf
            @if(isset($install))
            @method('PUT')
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="icon">Step Icon (FontAwesome class)</label>
                <input type="text" name="icon" class="form-control" id="icon" placeholder="e.g., fa-cogs"
                  value="{{ old('icon', $install->icon ?? '') }}">
                <small class="text-muted">Use a FontAwesome class (e.g. <code>fa-cogs</code>,
                  <code>fa-wrench</code>).</small>
              </div>

              <div class="form-group">
                <label for="title">Step Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter step title"
                  value="{{ old('title', $install->title ?? '') }}" required>
              </div>

              <div class="form-group">
                <label for="description">Step Description</label>
                <textarea name="description" class="form-control" id="description" rows="4"
                  placeholder="Enter step description"
                  required>{{ old('description', $install->description ?? '') }}</textarea>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  {{ isset($install) ? 'Update' : 'Create' }}
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