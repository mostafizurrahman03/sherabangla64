@extends('layouts.app')
@section('title', 'Order Confirmed | Sera Bangla')

@section('content')
<main>
  <div class="container">
    <div class="success-box">
      <div class="ic">✓</div>
      <h2>Thank you! Your order was placed successfully</h2>
      <p>We'll contact you shortly to confirm delivery.</p>
      <div class="order-id">{{ $order->order_number }}</div>
      <p style="font-size:12px;">Questions? Call 16345</p>
      <a class="btn" style="margin-top:16px;" href="{{ route('home') }}">Continue Shopping</a>
    </div>
  </div>
</main>
@endsection
