@props(['product'])
<div class="pcard">
  @if($product->compare_price && $product->compare_price > $product->price)
    <div class="ribbon">Sale</div>
  @elseif($product->created_at->gt(now()->subDays(14)))
    <div class="ribbon new">New</div>
  @endif
  <a href="{{ route('product.show', $product->slug) }}" class="thumb">
    @if($product->thumbnail)
      <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}" style="width:100%;height:100%;object-fit:cover;">
    @else
      🛒
    @endif
  </a>
  <div class="info">
    <div class="cat">{{ $product->category->name }}</div>
    <a href="{{ route('product.show', $product->slug) }}" class="name">{{ $product->name }}</a>
    <div class="unit">{{ $product->unit }}</div>
    <div class="price-row">
      <span class="price">৳{{ number_format($product->price) }}</span>
      @if($product->compare_price)
        <span class="old-price">৳{{ number_format($product->compare_price) }}</span>
      @endif
    </div>
    <div class="addbar">
      <form action="{{ route('cart.add', $product) }}" method="POST">
        @csrf
        <button class="add-btn" type="submit" {{ $product->stock < 1 ? 'disabled' : '' }}>
          {{ $product->stock < 1 ? 'Out of Stock' : '+ Add to Cart' }}
        </button>
      </form>
    </div>
  </div>
</div>
