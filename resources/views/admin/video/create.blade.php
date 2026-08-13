@extends('layouts.master')

@section('title')
{{ isset($video) ? 'Edit' : 'Upload' }} Video
@endsection

@section('content')
@include('admin.components.alert')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($video) ? 'Edit' : 'Upload' }} Video</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Video</li>
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
            <h3 class="card-title">{{ isset($video) ? 'Edit' : 'Upload' }} Video</h3>
          </div>

          <form action="{{ isset($video) ? route('videos.update', $video->id) : route('videos.store') }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            @if(isset($video))
            @method('PUT')
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="poster">Poster Image</label>

                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="poster" accept="image/*" class="custom-file-input" id="poster" {{
                      isset($video) ? '' : 'required' }}>
                    <label class="custom-file-label" for="image">Choose image</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>

                @if(isset($video) && $video->poster)
                <div class="mt-2">
                  <img src="{{ asset($video->poster) }}" alt="Poster" style="max-height: 120px;">
                </div>
                @endif
              </div>

              <div class="form-group mt-3">
                <label for="youtube_link">YouTube Video Link</label>
                <input type="url" name="video" id="youtube_link" class="form-control"
                  placeholder="https://www.youtube.com/watch?v=example"
                  value="{{ isset($video) ? $video->video : '' }}">
              </div>



              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  {{ isset($video) ? 'Update' : 'Upload' }}
                </button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection