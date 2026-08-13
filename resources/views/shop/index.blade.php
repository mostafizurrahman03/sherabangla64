@extends('layouts.app')
@section('title', 'All Products | Sera Bangla')

@section('content')
<main>
  <div class="container">
    <div class="pagehead">Home / <b>{{ request('category') ? $categories->firstWhere('slug', request('category'))?->name : 'All Products' }}</b></div>
    <div class="shop-layout">
      <aside class="filter-box">
        <form method="GET" action="{{ route('shop.index') }}">
          <input type="hidden" name="q" value="{{ request('q') }}">
          <h4>Category</h4>
          <label><input type="radio" name="category" value="" onchange="this.form.submit()" {{ !request('category') ? 'checked' : '' }}> All Categories</label>
          @foreach($categories as $cat)
            <label><input type="radio" name="category" value="{{ $cat->slug }}" onchange="this.form.submit()" {{ request('category') === $cat->slug ? 'checked' : '' }}> {{ $cat->icon }} {{ $cat->name }}</label>
          @endforeach
          <h4 style="margin-top:18px;">Price Range</h4>
          <label><input type="radio" name="price" value="" onchange="this.form.submit()"> All</label>
          <label><input type="radio" name="price" value="0-100" onchange="this.form.submit()"> ৳0 - ৳100</label>
          <label><input type="radio" name="price" value="100-300" onchange="this.form.submit()"> ৳100 - ৳300</label>
          <label><input type="radio" name="price" value="300-99999" onchange="this.form.submit()"> ৳300+</label>
        </form>
      </aside>
      <div>
        <div class="shop-toolbar">
          <span>{{ $products->total() }} products found</span>
          <form method="GET">
            <input type="hidden" name="category" value="{{ request('category') }}">
            <select name="sort" onchange="this.form.submit()">
              <option value="">Sort by popularity</option>
              <option value="low_high" {{ request('sort')==='low_high'?'selected':'' }}>Price: Low to High</option>
              <option value="high_low" {{ request('sort')==='high_low'?'selected':'' }}>Price: High to Low</option>
            </select>
          </form>
        </div>
        <div class="pgrid shop">
          @forelse($products as $product)
            <x-product-card :product="$product" />
          @empty
            <p style="color:var(--ink-soft);padding:30px 0;">No products found.</p>
          @endforelse
        </div>
        <div style="margin-top:24px;">{{ $products->links() }}</div>
      </div>
    </div>
  </div>
</main>
@endsection
