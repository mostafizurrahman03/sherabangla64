@extends('layouts.app')
@section('title', 'Sera Bangla | Best of Bangla, Best Products')

@section('content')
  <main>

    <div class="hero">
      <div class="container">
        {{-- Hero Slider --}}
        <div class="hero-grid">
          <div class="hero-copy">
            <div class="eyebrow">Trusted quality, honestly delivered</div>
            <h1>Everyday groceries, <em>now</em> just one click away</h1>
            <p>From rice, lentils and cooking oil to fresh vegetables, fish and meat — every product is checked and
              hand-picked so only the best reaches your kitchen.</p>
            <div class="hero-actions">
              <a class="btn amber" href="{{ route('shop.index') }}">Start Shopping →</a>
            </div>
          </div>

          {{-- Slider Section --}}
          <div class="hero-visual">
            <div class="slider-wrapper">
              <div class="slider-container" id="heroSlider">
                {{-- Slide 1 --}}
                <div class="slide active">
                  <div class="slide-content"
                    style="background-image: url('{{ asset('images/combo1.jpg') }}'); background-size: cover; background-position: center;">
                    {{-- <span class="slide-emoji">🥬</span>
                    <div class="slide-label">Fresh Vegetables</div> --}}
                  </div>
                </div>

                {{-- Slide 2 --}}
                <div class="slide">
                  <div class="slide-content"
                    style="background-image: url('{{ asset('images/combo2.jpg') }}'); background-size: cover; background-position: center;">
                    {{-- <span class="slide-emoji">🐟</span>
                    <div class="slide-label">Fresh Fish & Meat</div> --}}
                  </div>
                </div>

                {{-- Slide 3 --}}
                <div class="slide">
                  <div class="slide-content"
                    style="background-image: url('{{ asset('images/combo3.jpg') }}'); background-size: cover; background-position: center;">
                    {{-- <span class="slide-emoji">🍚</span>
                    <div class="slide-label">Rice & Lentils</div> --}}
                  </div>
                </div>
              </div>

              {{-- Slider Controls --}}
              <button class="slider-btn prev" id="prevSlide" aria-label="Previous slide">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
              </button>
              <button class="slider-btn next" id="nextSlide" aria-label="Next slide">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="9 6 15 12 9 18"></polyline>
                </svg>
              </button>

              {{-- Dots --}}
              <div class="slider-dots" id="sliderDots">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
                <span class="dot" data-index="3"></span>
              </div>
            </div>
          </div>
        </div>

        {{-- Category Carousel --}}
        <div class="catstrip">
          <div class="category-carousel-wrapper">
            <div class="category-carousel-container" id="categoryCarousel">
              <div class="category-carousel-track" id="categoryTrack">
                @foreach($categories as $cat)
                  <a class="catcard" href="{{ route('shop.index', ['category' => $cat->slug]) }}">
                    <div class="em">
                      <img src="{{ asset('storage/' . $cat->image) }}" alt="img">
                    </div>
                    <span>{{ $cat->name }}</span>
                  </a>
                @endforeach
              </div>
            </div>

            {{-- Category Navigation Buttons --}}
            <button class="category-nav prev" id="catPrev" aria-label="Previous categories">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
              </svg>
            </button>
            <button class="category-nav next" id="catNext" aria-label="Next categories">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 6 15 12 9 18"></polyline>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      @if($flashSale->count())
        <div class="section">
          <div class="flash-banner">
            <div class="left">
              <div><b>Flash Sale</b><span>Special discounts for a limited time</span></div>
            </div>
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
            <div>
              <div class="eyebrow">Customer favourites</div>
              <h2>Best Selling Products</h2>
            </div>
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
            <div>
              <div class="eyebrow"> Fresh additions</div>
              <h2>New Arrivals</h2>
            </div>
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
        <div class="item">
          <div class="ic">🚚</div>
          <div><strong>Fast Delivery</strong><span>90 minutes within Dhaka</span></div>
        </div>
        <div class="item">
          <div class="ic">✅</div>
          <div><strong>Quality Assured</strong><span>100% original products</span></div>
        </div>
        <div class="item">
          <div class="ic">↩️</div>
          <div><strong>Easy Returns</strong><span>Within 7 days</span></div>
        </div>
        <div class="item">
          <div class="ic">💳</div>
          <div><strong>Secure Payment</strong><span>Cash on delivery &amp; online</span></div>
        </div>
      </div>
    </div>
  </main>
@endsection