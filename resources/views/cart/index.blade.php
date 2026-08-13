@extends('layouts.app')
@section('title', 'Your Cart | Sera Bangla')

@section('content')
<main>
  <div class="container">
    <div class="pagehead"><b>Your Cart</b></div>

    @if($cart->items->isEmpty())
      <div class="empty-state">
        <div class="em">🛒</div>
        <h3>Your cart is empty</h3>
        <p>Haven't added anything yet? Browse our fresh products to get started.</p>
        <a class="btn" href="{{ route('shop.index') }}">Start Shopping</a>
      </div>
    @else
      @php $ship = $cart->subtotal >= 500 ? 0 : 60; @endphp
      <div class="cart-layout">
        <div class="cart-table">
          <div class="cart-row head"><div>Image</div><div>Product</div><div>Quantity</div><div>Price</div><div></div></div>
          @foreach($cart->items as $item)
            <div class="cart-row">
              <div class="cart-thumb">🛒</div>
              <div><div class="cart-pname">{{ $item->product->name }}</div><div class="cart-unit">{{ $item->product->unit }}</div></div>
              <form action="{{ route('cart.update', $item) }}" method="POST" class="qty-box" style="max-width:110px;">
                @csrf @method('PATCH')
                <button type="button" onclick="this.nextElementSibling.stepDown();this.form.submit()">−</button>
                <input class="qn" type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="border:none;width:100%;text-align:center;" onchange="this.form.submit()">
                <button type="button" onclick="this.previousElementSibling.stepUp();this.form.submit()">+</button>
              </form>
              <div style="font-weight:800;color:var(--blue-deep);">৳{{ number_format($item->line_total) }}</div>
              <form action="{{ route('cart.remove', $item) }}" method="POST">
                @csrf @method('DELETE')
                <button class="cart-remove" type="submit">✕</button>
              </form>
            </div>
          @endforeach
        </div>
        <div class="summary-box">
          <h3>Order Summary</h3>
          <div class="sum-line"><span>Subtotal</span><span>৳{{ number_format($cart->subtotal) }}</span></div>
          <div class="sum-line"><span>Delivery Fee</span><span>{{ $ship === 0 ? 'Free' : '৳' . $ship }}</span></div>
          <div class="sum-line total"><span>Total</span><span>৳{{ number_format($cart->subtotal + $ship) }}</span></div>
          <a class="btn danger block" style="margin-top:14px;" href="{{ route('checkout.index') }}">Checkout →</a>
        </div>
      </div>
    @endif
  </div>
</main>
@endsection
