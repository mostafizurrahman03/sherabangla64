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
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
          <li class="breadcrumb-item active">Order #{{ $order->order_number ?? $order->id }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- Order Info -->
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order #{{ $order->order_number ?? $order->id }}</h3>
            <div class="card-tools">
              <a href="{{ route('admin.orders.invoice', $order) }}" class="btn btn-sm btn-info" target="_blank">
                <i class="fas fa-file-invoice"></i> Invoice
              </a>
              <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
              </a>
            </div>
          </div>
          <div class="card-body">
            <!-- Status Update Form -->
            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mb-4">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-4">
                  <label class="fw-bold">Order Status:</label>
                </div>
                <div class="col-md-5">
                  <select name="status" class="form-control">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-primary btn-block">Update Status</button>
                </div>
              </div>
            </form>

            <!-- Customer Info -->
            <div class="row mb-4">
              <div class="col-md-6">
                <h5>Customer Information</h5>
                <p>
                  <strong>Name:</strong> {{ $order->full_name }}<br>
                  <strong>Phone:</strong> {{ $order->phone }}<br>
                  <strong>Email:</strong> {{ $order->user?->email ?? 'Guest' }}<br>
                  <strong>Address:</strong> {{ $order->address_line }}, {{ $order->area ?? '' }}, {{ $order->city }}
                </p>
              </div>
              <div class="col-md-6">
                <h5>Order Information</h5>
                <p>
                  <strong>Order Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}<br>
                  <strong>Payment Method:</strong> {{ strtoupper($order->payment_method) }}<br>
                  <strong>Payment Status:</strong>
                  <span class="badge 
                    @switch($order->payment_status)
                      @case('paid') bg-success @break
                      @case('pending') bg-warning @break
                      @case('unpaid') bg-secondary @break
                      @case('cancelled') bg-danger @break
                      @default bg-info
                    @endswitch
                  ">
                    {{ ucfirst($order->payment_status) }}
                  </span><br>
                  @if($order->coupon_code)
                    <strong>Coupon:</strong> {{ $order->coupon_code }}<br>
                  @endif
                  @if($order->note)
                    <strong>Note:</strong> {{ $order->note }}
                  @endif
                </p>
              </div>
            </div>

            <!-- Order Items -->
            <h5>Order Items</h5>
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order->items as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->product_name ?? 'Product' }}</td>
                    <td>
                      <form action="{{ route('admin.orders.updateItem', [$order, $item]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width:60px;text-align:center;" class="form-control d-inline">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                      </form>
                    </td>
                    <td>৳{{ number_format($item->unit_price, 2) }}</td>
                    <td>৳{{ number_format($item->line_total, 2) }}</td>
                    <td>
                      <form action="{{ route('admin.orders.removeItem', [$order, $item]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Remove this item?')">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <!-- Order Totals -->
            <div class="text-end mt-4">
              <p><strong>Subtotal:</strong> ৳{{ number_format($order->subtotal, 2) }}</p>
              @if($order->discount > 0)
                <p><strong>Discount:</strong> -৳{{ number_format($order->discount, 2) }}</p>
              @endif
              <p><strong>Shipping:</strong> ৳{{ number_format($order->shipping_fee ?? 0, 2) }}</p>
              <h4><strong>Total:</strong> ৳{{ number_format($order->total, 2) }}</h4>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-md-4">
        <!-- Order Summary -->
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Order Summary</h5>
          </div>
          <div class="card-body">
            <ul class="list-unstyled">
              <li><strong>Status:</strong> {{ ucfirst($order->status) }}</li>
              <li><strong>Payment:</strong> {{ ucfirst($order->payment_method) }} - {{ ucfirst($order->payment_status) }}</li>
              <li><strong>Items:</strong> {{ $order->items->count() }}</li>
              <li><strong>Total:</strong> ৳{{ number_format($order->total, 2) }}</li>
            </ul>
          </div>
        </div>

        <!-- Add Note -->
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Add Note</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.orders.addNote', $order) }}" method="POST">
              @csrf
              <div class="form-group">
                <textarea name="note" class="form-control" rows="3" placeholder="Add a note..."></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Add Note</button>
            </form>
          </div>
        </div>

        <!-- Payment Update -->
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Update Payment</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.orders.updatePayment', $order) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <select name="payment_status" class="form-control">
                  <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                  <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                  <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                  <option value="refunded" {{ $order->payment_status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                  <option value="cancelled" {{ $order->payment_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
              </div>
              <button type="submit" class="btn btn-warning btn-block">Update Payment</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection