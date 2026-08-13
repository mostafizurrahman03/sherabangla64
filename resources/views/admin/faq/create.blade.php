@extends('layouts.master')

@section('title')
{{ isset($faq) ? 'Edit' : 'Add' }} FAQ
@endsection

@section('content')
@include('admin.components.alert')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($faq) ? 'Edit' : 'Add' }} FAQ</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">FAQ</li>
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
            <h3 class="card-title">{{ isset($faq) ? 'Edit' : 'Add' }} FAQ</h3>
          </div>

          <form action="{{ isset($faq) ? route('faq.update', $faq->id) : route('faq.store') }}" method="POST">
            @csrf
            @if(isset($faq))
            @method('PUT')
            @endif

            <div class="card-body">
              {{-- Question --}}
              <div class="form-group">
                <label for="question">Question</label>
                <input type="text" name="question" id="question" class="form-control"
                  value="{{ old('question', $faq->question ?? '') }}" required>
              </div>

              {{-- Answer --}}
              <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" id="answer" rows="4" class="form-control"
                  required>{{ old('answer', $faq->answer ?? '') }}</textarea>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">
                {{ isset($faq) ? 'Update' : 'Submit' }}
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection