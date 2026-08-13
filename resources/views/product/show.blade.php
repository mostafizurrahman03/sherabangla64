@extends('layouts.app')
@section('title', $product->name . ' | Sera Bangla')

@section('content')
<main>
  <div class="container">
    <div class="pagehead">Home / {{ $product->category->name }} / <b>{{ $product->name }}</b></div>
    <div class="pd-grid">
      <div class="pd-image">
        @if($product->thumbnail)
          <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}" style="width:100%;height:100%;object-fit:cover;border-radius:20px;">
        @else
          🛒
        @endif
      </div>
      <div class="pd-info">
        <h1>{{ $product->name }}</h1>
        <div class="cat">Category: {{ $product->category->name }} &nbsp;•&nbsp; Unit: {{ $product->unit }}</div>
        <div class="pd-stock">{{ $product->in_stock ? '✓ In Stock' : '✕ Out of Stock' }}</div>
        <div class="pd-price">
          <span class="price">৳{{ number_format($product->price) }}</span>
          @if($product->compare_price)
            <span class="old-price">৳{{ number_format($product->compare_price) }}</span>
          @endif
        </div>
        <p class="pd-desc">{{ $product->description ?? 'Sourced from trusted, reliable suppliers — fresh, high-quality product.' }}</p>
        <form action="{{ route('cart.add', $product) }}" method="POST" class="pd-actions">
          @csrf
          <div class="pd-qty">
            <button type="button" onclick="this.nextElementSibling.value=Math.max(1,+this.nextElementSibling.value-1)">−</button>
            <input class="qn" type="number" name="quantity" value="1" min="1" style="border:none;text-align:center;width:46px;">
            <button type="button" onclick="this.previousElementSibling.value=+this.previousElementSibling.value+1">+</button>
          </div>
          <button class="btn danger" type="submit" style="flex:1;" {{ $product->in_stock ? '' : 'disabled' }}>Add to Cart</button>
        </form>
        <div class="pd-meta">
          <div>🚚 Delivery: same-day within Dhaka, 1-2 days outside Dhaka</div>
          <div>↩️ Returnable within 7 days</div>
          <div>💵 Cash on delivery available</div>
        </div>
      </div>
    </div>

    @if($related->count())
    <div class="section">
      <div class="section-head"><div><div class="eyebrow">You may also like</div><h2>Related Products</h2></div></div>
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
