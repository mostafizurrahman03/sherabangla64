@extends('layouts.master')

@section('content')
@include('admin.components.alert')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Orders</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Orders</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">All Orders</h3>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th>#</th>
              <th>Order ID</th>
              <th>Customer</th>
              <th>Total</th>
              <th>Status</th>
              <th>Ordered At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>#{{ $order->id }}</td>
              <td>{{ $order->customer_name }}<br><small>{{ $order->customer_phone }}</small></td>
              <td>${{ number_format($order->total_amount, 2) }}</td>
              <td>
                <span class="badge 
                    @switch($order->status)
                      @case('pending') bg-secondary @break
                      @case('processing') bg-warning text-dark @break
                      @case('shipped') bg-primary @break
                      @case('delivered') bg-success @break
                      @case('cancelled') bg-danger @break
                      @default bg-info
                    @endswitch
                  ">
                  {{ ucfirst($order->status) }}
                </span>
              </td>

              <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
              <td>
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary"><i
                    class="fa fa-eye"></i></a>
                <button onclick="confirmDelete(event, {{ $order->id }})" class="btn btn-sm btn-danger">
                  <i class="fa fa-trash"></i>
                </button>
                <form id="delete-form-{{ $order->id }}" action="{{ route('orders.destroy', $order->id) }}" method="POST"
                  style="display: none;">
                  @csrf
                  @method('DELETE')
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="mt-3">
          {{ $orders->links() }}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('js')
<script>
  function confirmDelete(event, orderId) {
    event.preventDefault();

    Swal.fire({
      title: 'Delete this order?',
      text: "This action cannot be undone.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        document.getElementById('delete-form-' + orderId).submit();
      }
    });
  }
</script>
@endpush