@extends('layouts.master')
@section('content')
@include('admin.components.alert')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>FAQ</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">FAQ</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <div class="flex-grow-1">
              <h3 class="card-title">All FAQs</h3>
            </div>
            <div>
              <a href="{{ route('faq.create') }}" class="btn btn-primary btn-sm">Add New</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>NO:</th>
                  <th>Question</th>
                  <th>Answar</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($faqs as $value)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->question }}</td>
                  <td>{{ $value->answer }}</td>
                  <td>{{ $value->created_at->format('d M Y') }}</td>
                  <td>
                    <a href="{{ route('faq.edit', $value->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <button onclick="confirmDelete(event, {{ $value->id }})" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                    <form id="delete-form-{{ $value->id }}" action="{{ route('faq.destroy', $value->id) }}"
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
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

@endsection
@push('js')
<script>
  function confirmDelete(event, userId) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $("#delete-form-" + userId).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log('User cancelled deletion');
                }
            });
        }
</script>
@endpush