@extends('layouts.master')
@push('css')
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
        <h1>Skills</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Skills</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <div class="flex-grow-1">
              <h3 class="card-title">All Skills</h3>
            </div>
            <div>
              <a href="{{ route('skill.create') }}" class="btn btn-primary btn-sm">Add New</a>
            </div>
          </div>

          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>No:</th>
                  <th>Icon</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($skills as $skill)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><i class=" {{ $skill->icon }}" style="font-size: 1.5rem;"></i></td>
                  <td>{{ $skill->name }}</td>
                  <td>{{ Str::limit($skill->description, 50) }}</td>
                  <td>{{ $skill->created_at->format('d M Y') }}</td>
                  <td>
                    <a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <button onclick="confirmDelete(event, {{ $skill->id }})" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $skill->id }}" action="{{ route('skill.destroy', $skill->id) }}"
                      method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection