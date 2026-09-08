@extends('layouts.app')
@section('title', $product->name . ' | Sera Bangla')

@section('content')
  <main>
    <div class="container">
      <div class="pagehead">Home / {{ $product->category->name }} / <b>{{ $product->name }}</b></div>

      <div class="pd-grid">
        <!-- Product Image -->
        <div class="pd-image">
          @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
              style="width:100%;height:100%;object-fit:cover;border-radius:20px;">
          @else
            🛒
          @endif
        </div>

        <!-- Product Right Info (Clean & Accessible Actions) -->
        <div class="pd-info">
          <h1>{{ $product->name }}</h1>
          <div class="cat">Category: {{ $product->category->name }} &nbsp;</div>
          <div class="pd-stock">{{ $product->stock_quantity ? '✓ In Stock' : '✕ Out of Stock' }}</div>

          <div class="pd-price">
            <span class="price">৳{{ number_format($product->current_price) }}</span>
            @if($product->sale_price && $product->sale_price < $product->regular_price)
              <span class="old-price">৳{{ number_format($product->regular_price) }}</span>
            @endif
          </div>

          <!-- Short Description (Jodi database-e thake) -->
          @if(isset($product->short_desc) && $product->short_desc)
            <p class="pd-short-desc" style="color: #666; font-size: 14px; margin-bottom: 16px;">
              {{ $product->short_desc }}
            </p>
          @endif

          <!-- Add to Cart Form -->
          <form action="{{ route('cart.add', $product) }}" method="POST" class="pd-actions add-to-cart-form">
            @csrf
            <div class="pd-qty">
              <button type="button"
                onclick="this.nextElementSibling.value=Math.max(1,+this.nextElementSibling.value-1)">−</button>
              <input class="qn" type="number" name="quantity" value="1" min="1"
                style="border:none;text-align:center;width:46px;">
              <button type="button"
                onclick="this.previousElementSibling.value=+this.previousElementSibling.value+1">+</button>
            </div>
            <button class="add-btn" type="submit" style="flex:1;" {{ $product->stock_quantity ? '' : 'disabled' }}>
              {{ $product->stock_quantity < 1 ? 'Out of Stock' : '+ Add to Cart' }}
            </button>
          </form>

          <div class="pd-meta">
            <div>🚚 Delivery: 1-2 days within Dhaka, 3-4 days outside Dhaka</div>
            <div>↩️ Returnable within 7 days</div>
            <div>💵 Cash on delivery available</div>
          </div>
        </div>
      </div>

      <!-- Full Description Section (Moved to Bottom for Better Layout) -->
      @if($product->full_desc)
        <div class="section"
          style="margin-top: 40px; background: #fff; padding: 30px; border-radius: 16px; border: 1px solid rgba(0,0,0,0.05);">
          <div class="section-head" style="margin-bottom: 20px;">
            <h2>Product Details</h2>
          </div>
          <div class="pd-full-desc" style="line-height: 1.7; color: #444;">
            {!! $product->full_desc !!}
          </div>
        </div>
      @endif

      <!-- Related Products -->
      @if($related->count())
        <div class="section">
          <div class="section-head">
            <div>
              <div class="eyebrow">You may also like</div>
              <h2>Related Products</h2>
            </div>
          </div>
          <div class="pgrid">
            @foreach($related as $r)
              <x-product-card :product="$r" />
            @endforeach
          </div>
        </div>
      @endif
    </div>
  </main>
@endsection