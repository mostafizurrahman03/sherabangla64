@extends('layouts.app')
@section('title', 'Track Order | Sera Bangla')

@section('content')
  <main class="container" style="padding: 40px 0; max-width: 600px; margin: 0 auto; min-height: 50vh;">
    <div style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
      <h2 style="margin-bottom: 20px; text-align: center;">Track Your Order</h2>

      <!-- Tracking Form -->
      <form action="{{ route('orders.track.result') }}" method="POST" style="margin-bottom: 30px;">
        @csrf
        <div style="display: flex; gap: 10px;">
          <input type="text" name="order_number"
            value="{{ request('order_number') ?? (isset($order) ? $order->order_number : '') }}"
            placeholder="Enter Order Number (e.g., SB-XXXXXX)" required
            style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
          <button type="submit"
            style="padding: 10px 20px; background: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Track</button>
        </div>
        @if(session('error'))
          <p style="color: red; margin-top: 10px; font-size: 14px;">{{ session('error') }}</p>
        @endif
      </form>

      <!-- Result Section -->
      @isset($order)
        <div style="border-top: 1px solid #eee; padding-top: 20px;">
          <h3>Order Details</h3>
          <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
          <p><strong>Name:</strong> {{ $order->full_name }}</p>
          <p><strong>Phone:</strong> {{ $order->phone }}</p>
          <p><strong>Shipping Address:</strong> {{ $order->address_line }}, {{ $order->city }}</p>
          <p><strong>Payment Method:</strong> {{ strtoupper($order->payment_method) }}</p>
          <p><strong>Payment Status:</strong> <span
              style="text-transform: uppercase; font-weight: bold;">{{ $order->payment_status }}</span></p>

          <div style="margin: 15px 0; padding: 10px; background: #f8f9fa; border-left: 4px solid #007bff;">
            <strong>Current Status:</strong> <span
              style="text-transform: uppercase; color: #007bff; font-weight: bold;">{{ $order->status }}</span>
          </div>

          <h4>Order Items:</h4>
          <ul style="list-style: none; padding: 0;">
            @foreach($order->items as $item)
              <li style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f1f1f1;">
                <span>{{ $item->product_name }} (x{{ $item->quantity }})</span>
                <span>৳{{ number_format($item->line_total, 2) }}</span>
              </li>
            @endforeach
          </ul>

          <div style="text-align: right; margin-top: 15px; font-size: 16px;">
            <strong>Total Amount: ৳{{ number_format($order->total, 2) }}</strong>
          </div>
        </div>
      @endisset
    </div>
  </main>
@endsection