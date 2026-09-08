<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Sera Bangla | Best of Bangla, Best Products')</title>
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/logo31.png') }}" type="image/x-icon">

  <!-- Meta Tags for AJAX -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="cart-update-url" content="{{ route('cart.update', ['item' => 'PLACEHOLDER']) }}">
  <meta name="cart-remove-url" content="{{ route('cart.remove', ['item' => 'PLACEHOLDER']) }}">
  <meta name="cart-add-url" content="{{ route('cart.add', ['product' => 'PLACEHOLDER']) }}">
  <meta name="cart-items-url" content="{{ route('cart.items') }}">

  @stack('styles')
</head>

<body>


  <!-- ===== HEADER ===== -->
  <header class="main">
    <div class="container">
      <div class="header-row">
        <!-- Hamburger -->
        <button class="hamburger"
          onclick="document.getElementById('mobileMenu').classList.add('show');document.getElementById('mobileMenuOverlay').classList.add('show');"
          aria-label="Menu">
          <span></span>
        </button>

        <!-- Logo -->
        <a href="{{ route('home') }}" class="brand">
          <img src="{{ asset('images/logo31.png') }}" width="150" alt="Sera Bangla Logo">
        </a>

        <!-- Search -->
        <form action="{{ route('shop.index') }}" method="GET" class="search-wrap">
          <input type="text" name="q" value="{{ request('q') }}"
            placeholder="Search products — e.g. rice, oil, eggs...">
          <button type="submit">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
              stroke-linecap="round">
              <circle cx="11" cy="11" r="7"></circle>
              <path d="M21 21l-4.3-4.3"></path>
            </svg>
          </button>
        </form>

        <!-- Track Order Button -->
        <a class="track-btn desktop-track-btn" href="{{ route('orders.track') }}"
          style="display: flex; align-items: center; gap: 6px; padding: 8px 14px; background: #f8f9fa; border: 1px solid #eee; border-radius: 50px; text-decoration: none; color: #333; font-size: 14px; font-weight: 500;">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <rect x="1" y="3" width="15" height="13"></rect>
            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
            <circle cx="5.5" cy="18.5" r="2.5"></circle>
            <circle cx="18.5" cy="18.5" r="2.5"></circle>
          </svg>
          <span>Track Order</span>
        </a>

        <style>
          @media (max-width: 768px) {
            .desktop-track-btn {
              display: none !important;
            }
          }
        </style>

        <!-- Header Actions -->
        <div class="header-actions">
          <a class="cart-btn" href="javascript:void(0)" onclick="toggleCart()">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <circle cx="9" cy="20" r="1"></circle>
              <circle cx="18" cy="20" r="1"></circle>
              <path d="M2.5 3h2l2.6 12.6a2 2 0 0 0 2 1.6h8.4a2 2 0 0 0 2-1.6L21 8H6"></path>
            </svg>
            <span>Cart</span>
            <span class="cart-count" id="headerCartCount">{{ $globalCartCount ?? 0 }}</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Category Navigation -->
    <nav class="catnav">
      <div class="container hscroll">
        <a href="{{ route('shop.index') }}">All Categories</a>
        @foreach(($globalCategories ?? []) as $cat)
          <a href="{{ route('shop.index', ['category' => $cat->slug]) }}">{{ $cat->name }}</a>
        @endforeach
      </div>
    </nav>
  </header>

  <!-- ===== MOBILE MENU ===== -->
  <div class="mobile-menu-overlay" id="mobileMenuOverlay"
    onclick="this.classList.remove('show');document.getElementById('mobileMenu').classList.remove('show');">
  </div>
  <div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-head">
      <strong style="font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;">Menu</strong>
      <button
        onclick="document.getElementById('mobileMenu').classList.remove('show');document.getElementById('mobileMenuOverlay').classList.remove('show');"
        style="font-size:20px;">✕</button>
    </div>
    <div class="mobile-menu-body">
      <a href="{{ route('home') }}">🏠 Home</a>
      <a href="{{ route('shop.index') }}">🛍️ All Products</a>
      <div class="divider"></div>
      @foreach(($globalCategories ?? []) as $cat)
        <a href="{{ route('shop.index', ['category' => $cat->slug]) }}">{{ $cat->icon }} {{ $cat->name }}</a>
      @endforeach
      <div class="divider"></div>
      <a href="{{ route('cart.index') }}">🛒 Cart</a>
      <a href="#">ℹ️ About Us</a>
      <a href="{{ route('orders.track') }}">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <rect x="1" y="3" width="15" height="13"></rect>
          <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
          <circle cx="5.5" cy="18.5" r="2.5"></circle>
          <circle cx="18.5" cy="18.5" r="2.5"></circle>
        </svg>
        <span>Track Order</span></a>
    </div>
  </div>

  <!-- ===== FLASH MESSAGES ===== -->
  @if (session('success'))
    <div class="container" style="margin-top:14px;">
      <div
        style="background:var(--blue-tint);color:var(--blue-deep);padding:12px 18px;border-radius:10px;font-size:14px;font-weight:600;">
        {{ session('success') }}
      </div>
    </div>
  @endif
  @if ($errors->any())
    <div class="container" style="margin-top:14px;">
      <div
        style="background:var(--danger-tint);color:var(--danger);padding:12px 18px;border-radius:10px;font-size:14px;font-weight:600;">
        {{ $errors->first() }}
      </div>
    </div>
  @endif

  <!-- ===== CART PANEL ===== -->
  <div class="cart-overlay" id="cartOverlay" onclick="closeCart()"></div>
  <div class="cart-panel" id="cartPanel">
    <div class="cart-panel-header">
      <h3>
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <circle cx="9" cy="20" r="1"></circle>
          <circle cx="18" cy="20" r="1"></circle>
          <path d="M2.5 3h2l2.6 12.6a2 2 0 0 0 2 1.6h8.4a2 2 0 0 0 2-1.6L21 8H6"></path>
        </svg>
        Your Cart
      </h3>
      <button class="cart-close" onclick="closeCart()">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    <div class="cart-panel-body" id="cartPanelBody">
      @if($cart->items->count() > 0)
        @foreach($cart->items as $item)
          <div class="cart-item" data-id="{{ $item->id }}">
            <div class="cart-item-image">
              @if($item->product && $item->product->image)
                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
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
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
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
    </div>
    <div class="cart-panel-footer" id="cartPanelFooter">
      <div class="cart-summary">
        <div class="cart-subtotal">
          <span>Subtotal</span>
          <span class="cart-total-price" id="cartTotalPrice">৳{{ number_format($cart->subtotal) }}</span>
        </div>
        <div class="cart-shipping">
          <span>Shipping</span>
          <span>Calculated at checkout</span>
        </div>
      </div>
      <div class="cart-actions">
        <a href="{{ route('cart.index') }}" class="btn deepoutline" onclick="closeCart()">View Cart</a>
        <a href="{{ route('checkout.index') }}" class="btn deepblue" onclick="closeCart()">Checkout →</a>
      </div>
    </div>
  </div>

  <!-- ===== MAIN CONTENT ===== -->
  @yield('content')

  <!-- ===== FOOTER ===== -->
  <footer>
    <div class="container foot-grid">
      <div>
        <h4 style="color:#fff;">Sera Bangla</h4>
        <p>Every daily essential your household needs, now within reach — built on honesty and a promise of quality.</p>
      </div>
      <div>
        <h4>Customer Service</h4>
        <ul>
          <li>Contact Us</li>
          <li>FAQs</li>
          <li>Return &amp; Refund Policy</li>
          <li>Delivery Info</li>
        </ul>
      </div>
      <div>
        <h4>Company</h4>
        <ul>
          <li><a href="#">About Us</a></li>
          <li>Careers</li>
          <li>Terms of Service</li>
          <li>Privacy Policy</li>
        </ul>
      </div>
      <div>
        <h4>Contact</h4>
        <ul>
          <li>Hotline: 16345</li>
          <li>Email: support@serabangla.com</li>
          <li>Dhaka, Bangladesh</li>
        </ul>
      </div>
    </div>
    <div class="container foot-bottom">
      <span>© {{ date('Y') }} Sera Bangla. All rights reserved.</span>
      <span>Best of Bangla, Best Products</span>
    </div>
  </footer>

  <!-- ===== FLOATING CART BUTTON ===== -->
  <button class="floating-cart-btn" onclick="toggleCart()" aria-label="Open Cart">
    <div class="cart-icon-box">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
        stroke-linecap="round" stroke-linejoin="round">
        <circle cx="9" cy="21" r="1"></circle>
        <circle cx="20" cy="21" r="1"></circle>
        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
      </svg>
      <span class="badge" id="floatingCartBadge">{{ $globalCartCount ?? 0 }} items</span>
    </div>
    <div class="cart-price-box">
      <span id="floatingCartTotal">৳{{ number_format($globalCartTotal ?? 0, 2) }}</span>
    </div>
  </button>

  <!-- ===== JAVASCRIPT ===== -->
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')

</body>

</html>