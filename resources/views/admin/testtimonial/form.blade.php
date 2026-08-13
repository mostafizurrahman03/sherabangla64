@extends('layouts.master')

@section('title')
{{ isset($testimonial) ? 'Edit' : 'Add' }} Testimonial
@endsection

@section('content')
@include('admin.components.alert')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($testimonial) ? 'Edit' : 'Add' }} Testimonial</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Testimonial</li>
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
            <h3 class="card-title">{{ isset($testimonial) ? 'Edit' : 'Add' }} Testimonial</h3>
          </div>

          <form
            action="{{ isset($testimonial) ? route('testimonial.update', $testimonial->id) : route('testimonial.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($testimonial))
            @method('PUT')
            @endif

            <div class="card-body">
              {{-- Name --}}
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                  value="{{ old('name', $testimonial->name ?? '') }}" required>
              </div>

              {{-- Profession --}}
              <div class="form-group">
                <label for="profession">Profession</label>
                <input type="text" name="profession" id="profession" class="form-control"
                  value="{{ old('profession', $testimonial->profession ?? '') }}" required>
              </div>

              {{-- Description --}}
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control"
                  required>{{ old('description', $testimonial->description ?? '') }}</textarea>
              </div>



              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  {{ isset($testimonial) ? 'Update' : 'Submit' }}
                </button>
              </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection