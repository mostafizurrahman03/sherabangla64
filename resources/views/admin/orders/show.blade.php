@extends('layouts.master')

@section('content')
@include('admin.components.alert')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Order Details</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
          <li class="breadcrumb-item active">Order #{{ $order->id }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Order #{{ $order->id }} — {{ $order->customer_name }}</h3>
      </div>
      <div class="card-body">
        <div class="mb-4">
          <h5>Customer Info</h5>
          <p>
            <strong>Name:</strong> {{ $order->customer_name }} <br>
            <strong>Email:</strong> {{ $order->customer_email }} <br>
            <strong>Phone:</strong> {{ $order->customer_phone }} <br>
            <strong>Address:</strong> {{ $order->customer_address }}
          </p>
        </div>

        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="mb-4">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-4">
              <label for="status" class="form-label fw-bold">Order Status:</label>
            </div>
            <div class="col-md-6">
              <select name="status" id="status" class="form-select mb-2">
                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
              </select>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary btn-sm">Update</button>
            </div>
          </div>
        </form>


        <div class="mb-4">
          <h5>Order Summary</h5>
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order->items as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>${{ number_format($item->subtotal, 2) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="text-end">
          <p><strong>Subtotal:</strong> ${{ number_format($order->subtotal, 2) }}</p>
          <p><strong>Delivery ({{ ucfirst($order->delivery_method) }}):</strong> ${{
            number_format($order->delivery_charge, 2) }}</p>
          <h5><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</h5>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection