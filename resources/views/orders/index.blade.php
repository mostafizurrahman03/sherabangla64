@extends('layouts.app')
@section('title', 'My Orders | Sera Bangla')

@section('content')
<main>
  <div class="container">
    <div class="pagehead"><b>My Orders</b></div>
    <div class="cart-table" style="margin:20px 0 40px;">
      <div class="cart-row head"><div>Order No.</div><div>Date</div><div>Total</div><div>Status</div><div></div></div>
      @forelse($orders as $order)
        <div class="cart-row" style="grid-template-columns:1fr 1fr 1fr 1fr 40px;">
          <div>{{ $order->order_number }}</div>
          <div>{{ $order->created_at->format('d M, Y') }}</div>
          <div>৳{{ number_format($order->total) }}</div>
          <div>{{ ucfirst($order->status) }}</div>
          <div></div>
        </div>
      @empty
        <div style="padding:24px;color:var(--ink-soft);">No orders found.</div>
      @endforelse
    </div>
    {{ $orders->links() }}
  </div>
</main>
@endsection
