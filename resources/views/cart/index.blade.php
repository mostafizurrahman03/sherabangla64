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
          <div class="cart-table table-web">
            <div class="cart-row head">
              <div>Image</div>
              <div>Product</div>
              <div>Quantity</div>
              <div>Price</div>
              <div></div>
            </div>
            @foreach($cart->items as $item)
              <div class="cart-row">
                <div class="cart-thumb">
                  @if($item->product->image)
                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                      style="width:100%;height:100%;object-fit:cover;border-radius:20px;">
                  @endif
                </div>
                <div>
                  <div class="cart-pname">{{ $item->product->name }}</div>
                </div>
                <form action="{{ route('cart.update', $item) }}" method="POST" class="qty-box" style="max-width:110px;"
                  onsubmit="event.preventDefault();">
                  @csrf @method('PATCH')
                  <button type="button"
                    onclick="const input = this.nextElementSibling; input.stepDown(); updateQuantity({{ $item->id }}, -1);">−</button>
                  <input class="qn" type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                    style="border:none;width:100%;text-align:center;" onchange="updateQuantity({{ $item->id }}, this.value)">
                  <button type="button"
                    onclick="const input = this.previousElementSibling; input.stepUp(); updateQuantity({{ $item->id }}, 1);">+</button>
                </form>
                <div style="font-weight:800;color:var(--blue-deep);">৳{{ number_format($item->line_total) }}</div>
                <form action="{{ route('cart.remove', $item) }}" method="POST">
                  @csrf @method('DELETE')
                  <button class="cart-remove" type="submit">✕</button>
                </form>
              </div>
            @endforeach
          </div>

          <div class="cart-table table-mobile">
            <div class="cart-row head">
              <div>Image</div>
              <div>Product</div>
              <div>Quantity</div>
              <div>Price</div>
              <div></div>
            </div>

            @foreach($cart->items as $item)
              <div class="cart-row">
                <!-- Thumbnail -->
                <div class="cart-thumb">
                  @if($item->product->image)
                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                      style="width:100%;height:100%;object-fit:cover;border-radius:12px;">
                  @else
                    <span style="font-size:24px;">🛒</span>
                  @endif
                </div>

                <!-- Product Info -->
                <div class="cart-product-info">
                  <div class="cart-pname">{{ $item->product->name }}</div>
                </div>

                <!-- Actions Row (Quantity + Price + Remove) -->
                <div class="cart-actions-row">
                  <!-- Quantity -->
                  <form onsubmit="event.preventDefault();" class="qty-box">
                    @csrf
                    @method('PATCH')
                    <button type="button" class="qty-btn"
                      onclick="this.nextElementSibling.stepDown(); updateQuantity({{ $item->id }}, -1)">−</button>
                    <input class="qn" type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                      onchange="updateQuantity({{ $item->id }}, this.value)">
                    <button type="button" class="qty-btn"
                      onclick="this.previousElementSibling.stepUp(); updateQuantity({{ $item->id }}, 1)">+</button>
                  </form>

                  <!-- Remove Button (if needed) -->
                  <button type="button" class="cart-item-remove" onclick="removeItem({{ $item->id }})">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <line x1="18" y1="6" x2="6" y2="18"></line>
                      <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                  </button>

                  <!-- Price -->
                  <div class="cart-item-price">৳{{ number_format($item->line_total) }}</div>

                  <!-- Remove Button -->
                  <form action="{{ route('cart.remove', $item) }}" method="POST" class="cart-remove-form">
                    @csrf @method('DELETE')
                    <button class="cart-remove" type="submit">✕</button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>


          <div class="summary-box">
            <h3>Order Summary</h3>
            <div class="sum-line"><span>Subtotal</span><span
                id="floatingCartTotal">৳{{ number_format($cart->subtotal) }}</span></div>
            <div class="sum-line"><span>Delivery Fee</span><span>{{ $ship === 0 ? 'Free' : '৳' . $ship }}</span></div>
            <div class="sum-line total"><span>Total</span><span>৳{{ number_format($cart->subtotal + $ship) }}</span></div>
            <a class="btn danger block" style="margin-top:14px;" href="{{ route('checkout.index') }}">Checkout →</a>
          </div>
        </div>
      @endif
    </div>
  </main>
@endsection
<style>
  .table-web {
    display: block;
  }

  .table-mobile {
    display: none;
  }

  /* Cart Table Mobile Styles */
  @media (max-width: 760px) {
    .table-web {
      display: none;
    }

    .table-mobile {
      display: block;
    }

    /* Hide desktop header */
    .cart-row.head {
      display: none !important;
    }

    /* Cart Row - Mobile Layout */
    .cart-row {
      display: grid !important;
      grid-template-columns: 56px 1fr !important;
      grid-template-areas:
        "thumb info"
        "thumb actions" !important;
      gap: 8px 14px !important;
      padding: 14px 16px !important;
      align-items: center !important;
      border-bottom: 1px solid var(--line-soft) !important;
      background: var(--surface) !important;
    }

    .cart-row:last-child {
      border-bottom: none !important;
    }

    /* Thumbnail */
    .cart-thumb {
      grid-area: thumb !important;
      width: 56px !important;
      height: 56px !important;
      align-self: start !important;
      margin-top: 2px !important;
    }

    /* Product Info */
    .cart-product-info {
      grid-area: info !important;
      display: flex !important;
      flex-direction: column !important;
      gap: 2px !important;
    }

    .cart-pname {
      font-size: 13px !important;
      font-weight: 600 !important;
      color: var(--ink) !important;
    }

    /* Actions Row (Quantity + Price + Remove) */
    .cart-actions-row {
      grid-area: actions !important;
      display: flex !important;
      align-items: center !important;
      gap: 10px !important;
      justify-content: space-between !important;
      width: 100% !important;
    }

    /* Quantity Box */
    .qty-box {
      max-width: 96px !important;
      flex-shrink: 0 !important;
      display: flex !important;
      align-items: center !important;
      background: var(--bg-alt) !important;
      border-radius: 999px !important;
      padding: 2px !important;
      border: 1px solid var(--line-soft) !important;
    }

    .qty-box button {
      width: 26px !important;
      height: 26px !important;
      border: none !important;
      background: transparent !important;
      font-size: 16px !important;
      font-weight: 600 !important;
      cursor: pointer !important;
      border-radius: 50% !important;
      color: var(--ink) !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
    }

    .qty-box button:hover {
      background: var(--surface) !important;
      color: var(--blue) !important;
    }

    .qty-box .qn {
      width: 32px !important;
      text-align: center !important;
      font-weight: 600 !important;
      font-size: 13px !important;
      background: transparent !important;
      border: none !important;
      padding: 4px 0 !important;
      color: var(--ink) !important;
    }

    .qty-box .qn:focus {
      outline: none !important;
    }

    /* Price */
    .cart-item-price {
      font-size: 14px !important;
      font-weight: 700 !important;
      color: var(--blue-deep) !important;
      flex-shrink: 0 !important;
      min-width: 60px !important;
      text-align: right !important;
    }

    /* Remove Button */
    .cart-remove-form {
      flex-shrink: 0 !important;
    }

    .cart-remove {
      width: 30px !important;
      height: 30px !important;
      border-radius: 50% !important;
      border: none !important;
      background: transparent !important;
      color: var(--danger) !important;
      font-size: 14px !important;
      cursor: pointer !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      opacity: 0.7 !important;
      transition: all 0.2s ease !important;
    }

    .cart-remove:hover {
      background: var(--danger-tint) !important;
      opacity: 1 !important;
    }

    /* Hide desktop price */
    .cart-desktop-price {
      display: none !important;
    }
  }

  /* Extra Small Mobile */
  @media (max-width: 480px) {
    .cart-row {
      grid-template-columns: 48px 1fr !important;
      gap: 6px 10px !important;
      padding: 12px 14px !important;
    }

    .cart-thumb {
      width: 48px !important;
      height: 48px !important;
    }

    .cart-pname {
      font-size: 12px !important;
    }

    .cart-actions-row {
      gap: 6px !important;
    }

    /* .qty-box {
      max-width: 82px !important;
    } */

    .qty-box button {
      width: 22px !important;
      height: 22px !important;
      font-size: 14px !important;
    }

    .qty-box .qn {
      width: 26px !important;
      font-size: 12px !important;
    }

    .cart-item-price {
      font-size: 13px !important;
      min-width: 50px !important;
    }

    .cart-remove {
      width: 26px !important;
      height: 26px !important;
      font-size: 12px !important;
    }
  }
</style>
