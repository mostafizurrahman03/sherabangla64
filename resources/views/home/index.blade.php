@extends('layouts.app')
@section('title', 'Sera Bangla | Best of Bangla, Best Products')

@section('content')
<main>
  <div class="container hero">
    <div class="hero-grid">
      <div class="hero-copy">
        <div class="eyebrow">Trusted quality, honestly delivered</div>
        <h1>Everyday groceries, <em>now</em> just one click away</h1>
        <p>From rice, lentils and cooking oil to fresh vegetables, fish and meat — every product is checked and hand-picked so only the best reaches your kitchen.</p>
        <a class="btn amber" href="{{ route('shop.index') }}">Start Shopping →</a>
      </div>
      <div class="hero-visual">
        <div class="hero-plate">🥬</div>
      </div>
    </div>

    <div class="catgrid">
      @foreach($categories as $cat)
        <a class="catcard" href="{{ route('shop.index', ['category' => $cat->slug]) }}">
          <div class="em">{{ $cat->icon ?? '🛒' }}</div><span>{{ $cat->name }}</span>
        </a>
      @endforeach
    </div>
  </div>

  <div class="container">
    @if($flashSale->count())
    <div class="section">
      <div class="flash-banner">
        <div class="left"><div><b>Flash Sale</b><span>Special discounts for a limited time</span></div></div>
      </div>
      <div class="pgrid">
        @foreach($flashSale as $product)
          <x-product-card :product="$product" />
        @endforeach
      </div>
    </div>
    @endif

    @if($bestSellers->count())
    <div class="section">
      <div class="section-head">
        <div><div class="eyebrow">Customer favourites</div><h2>Best Selling Products</h2></div>
      </div>
      <div class="pgrid">
        @foreach($bestSellers as $product)
          <x-product-card :product="$product" />
        @endforeach
      </div>
    </div>
    @endif

    @if($newArrivals->count())
    <div class="section">
      <div class="section-head">
        <div><div class="eyebrow">Fresh additions</div><h2>New Arrivals</h2></div>
        <a class="link-arrow" href="{{ route('shop.index') }}">View all →</a>
      </div>
      <div class="pgrid">
        @foreach($newArrivals as $product)
          <x-product-card :product="$product" />
        @endforeach
      </div>
    </div>
    @endif

    <div class="trust">
      <div class="item"><div class="ic">🚚</div><div><strong>Fast Delivery</strong><span>90 minutes within Dhaka</span></div></div>
      <div class="item"><div class="ic">✅</div><div><strong>Quality Assured</strong><span>100% original products</span></div></div>
      <div class="item"><div class="ic">↩️</div><div><strong>Easy Returns</strong><span>Within 7 days</span></div></div>
      <div class="item"><div class="ic">💳</div><div><strong>Secure Payment</strong><span>Cash on delivery &amp; online</span></div></div>
    </div>
  </div>
</main>
@endsection
