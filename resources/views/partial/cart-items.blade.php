@if($cart->items->count() > 0)
  @foreach($cart->items as $item)
    <div class="cart-item" data-id="{{ $item->id }}">
      <div class="cart-item-image">
        @if($item->product && $item->product->image)
          <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name ?? 'Product' }}"
            style="width:50px;height:50px;object-fit:cover;border-radius:8px;">
        @else
          <span style="font-size:32px;">🛒</span>
        @endif
      </div>
      <div class="cart-item-details">
        <div class="cart-item-name">{{ $item->product->name ?? 'Product' }}</div>
        <div class="cart-item-price">৳{{ number_format($item->unit_price, 2) }}</div>
      </div>
      <div class="cart-item-actions">
        <div class="quantity-control">
          <button type="button" class="qty-btn" onclick="updateQuantity({{ $item->id }}, -1)">−</button>
          <span class="qty-value">{{ $item->quantity }}</span>
          <button type="button" class="qty-btn" onclick="updateQuantity({{ $item->id }}, 1)">+</button>
        </div>
        <button type="button" class="cart-item-remove" onclick="removeItem({{ $item->id }})">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
    </div>
  @endforeach
@else
  <div class="empty-cart">
    <span style="font-size:64px;">🛒</span>
    <h4>Your cart is empty</h4>
    <p>Start shopping to add items to your cart</p>
    <a href="{{ route('shop.index') }}" class="btn deepblue" onclick="closeCart()">Start Shopping</a>
  </div>
@endif