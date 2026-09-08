@props(['product'])
<div class="pcard">
  @if($product->regular_price && $product->regular_price > $product->sale_price)
    <div class="ribbon">Sale</div>
  @elseif($product->created_at->gt(now()->subDays(14)))
    <div class="ribbon new">New</div>
  @endif
  <a href="{{ route('product.show', $product->slug) }}" class="thumb">
    @if($product->image)
      <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
        style="width:100%;height:100%;object-fit:contain;">
    @else
      🛒
    @endif
  </a>
  <div class="info">
    {{-- <div class="cat">{{ $product->category->name }}</div> --}}
    <a href="{{ route('product.show', $product->slug) }}" class="name">{{ $product->name }}</a>
    <div class="unit">{{ $product->unit }}</div>
    <div class="price-row">
      <span class="price">৳{{ number_format($product->current_price) }}</span>
      @if($product->sale_price && $product->sale_price < $product->regular_price)
        <span class="old-price">৳{{ number_format($product->regular_price) }}</span>
      @endif
    </div>
    <div class="addbar">
      <form action="{{ route('cart.add', $product) }}" method="POST" class="add-to-cart-form">
        @csrf
        <button class="add-btn" type="submit" {{ $product->stock_quantity < 1 ? 'disabled' : '' }}>
          {{ $product->stock_quantity < 1 ? 'Out of Stock' : '+ Add to Cart' }}
        </button>
      </form>
    </div>
  </div>
</div>