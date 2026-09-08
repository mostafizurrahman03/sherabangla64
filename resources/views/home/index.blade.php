@extends('layouts.app')
@section('title', 'Sera Bangla | Best of Bangla, Best Products')

@section('content')
  <main>

    <style>
      /* ----- Hero Section Styles ----- */
      .hero {
        padding: 12px 0;
      }

      .hero .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 12px;
        box-sizing: border-box;
      }

      .hero-grid-new {
        display: grid;
        grid-template-columns: 1.3fr 0.7fr;
        gap: 20px;
        margin-bottom: 12px;
        align-items: stretch;
      }

      /* Left Slider Styles */
      .hero-slider-wrapper {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        background: #0f172a;
        height: 380px;
      }

      .hero-slider-container {
        display: flex;
        width: 100%;
        height: 100%;
        transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: transform;
      }

      .hero-slider-container .slide {
        flex: 0 0 100%;
        height: 100%;
        position: relative;
      }

      .hero-slider-container .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
      }

      /* Slider Controls */
      .hero-slider-wrapper .slider-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.85);
        border: none;
        border-radius: 50%;
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.25s ease;
        z-index: 10;
        color: #0f172a;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }

      .hero-slider-wrapper .slider-btn.prev {
        left: 12px;
      }

      .hero-slider-wrapper .slider-btn.next {
        right: 12px;
      }

      .hero-slider-wrapper .slider-dots {
        position: absolute;
        bottom: 12px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 6px;
        z-index: 10;
        background: rgba(0, 0, 0, 0.3);
        padding: 5px 10px;
        border-radius: 20px;
        backdrop-filter: blur(4px);
      }

      .hero-slider-wrapper .dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .hero-slider-wrapper .dot.active {
        background: #ffffff;
        width: 18px;
        border-radius: 3px;
      }

      /* Right 2 Stacked Grid Styles */
      .hero-grid-images {
        display: grid;
        grid-template-rows: 1fr 1fr;
        gap: 16px;
        height: 380px;
      }

      .grid-item {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
        position: relative;
        height: 100%;
      }

      .grid-image-product {
        width: 100%;
        height: 100%;
        display: block;
        position: relative;
        overflow: hidden;
        background: #1e293b;
      }

      .grid-image-product img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform 0.4s ease;
      }

      .grid-item:hover .grid-image-product img {
        transform: scale(1.04);
      }

      /* ----- Category Strip Styles ----- */
      .catstrip {
        margin-top: 12px;
        position: relative;
      }

      .category-carousel-wrapper {
        position: relative;
        overflow: hidden;
        padding: 0 36px;
      }

      .category-carousel-container {
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .category-carousel-track {
        display: flex;
        gap: 14px;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform;
        padding: 6px 2px;
      }

      .catcard {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: inherit;
        flex: 0 0 90px;
      }

      .catcard .em {
        width: 100px;
        height: 100px;
        border-radius: 12px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 6px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      }

      .catcard .em img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .catcard span {
        font-size: 13px;
        font-weight: 600;
        color: #1e293b;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100%;
      }

      /* Category Navigation Buttons */
      .category-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid #cbd5e1;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #1e293b;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
      }

      .category-nav.prev {
        left: 0;
      }

      .category-nav.next {
        right: 0;
      }

      .category-nav.hidden,
      .category-nav:disabled {
        opacity: 0.2;
        cursor: not-allowed;
      }

      /* ===== Responsive Breakpoints for Mobile & Tablet ===== */
      @media(max-width: 1024px) {
        .hero-grid-new {
          grid-template-columns: 1fr;
          gap: 14px;
        }

        .hero-slider-wrapper {
          height: 300px;
        }

        .hero-grid-images {
          grid-template-columns: 1fr 1fr;
          grid-template-rows: 1fr;
          height: 150px;
          gap: 12px;
        }
      }

      @media(max-width: 640px) {
        .hero {
          padding: 8px 0;
        }

        .hero .container {
          padding: 0 8px;
        }

        .hero-slider-wrapper {
          height: 200px;
          /* মোবাইলে স্লাইডার সুন্দর দেখানোর জন্য নিখুঁত উচ্চতা */
          border-radius: 12px;
        }

        .hero-grid-images {
          height: auto;
          gap: 10px;
        }

        .grid-item {
          border-radius: 12px;
        }

        /* ক্যাটাগরি সেকশন মোবাইল ফ্রেন্ডলি */
        .category-carousel-wrapper {
          padding: 0 28px;
        }

        .catcard {
          flex: 0 0 72px;
        }

        .catcard .em {
          width: 60px;
          height: 60px;
          border-radius: 10px;
        }

        .catcard span {
          font-size: 11px;
        }

        .category-nav {
          width: 26px;
          height: 26px;
        }

        .category-nav svg {
          width: 14px;
          height: 14px;
        }
      }
    </style>

    {{-- Hero Section with Left Slider + Right Image Grid --}}
    <div class="hero">
      <div class="container">
        <div class="hero-grid-new">

          {{-- Left: Big Slider --}}
          <div class="hero-slider-wrapper">
            <div class="hero-slider-container" id="heroSlider">
              @foreach($sliders as $key => $slider)
                <div class="slide {{ $key === 0 ? 'active' : '' }}">
                  <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Banner">
                </div>
              @endforeach
            </div>

            {{-- Slider controls --}}
            <button class="slider-btn prev" id="prevSlide" aria-label="Previous">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
              </svg>
            </button>
            <button class="slider-btn next" id="nextSlide" aria-label="Next">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 6 15 12 9 18"></polyline>
              </svg>
            </button>
            <div class="slider-dots" id="sliderDots"></div>
          </div>

          {{-- Right: 2 Stacked Dynamic Product Images Grid --}}
          <div class="hero-grid-images">
            @if(isset($slide_top))
              <div class="grid-item">
                <a href="{{ $slide_top->link_url ?? "#" }}" class="grid-image-product">
                  <img src="{{ asset('storage/' . $slide_top->image) }}" alt="img">
                </a>
              </div>
            @endif

            @if(isset($slide_bottom))
              <div class="grid-item">
                <a href="{{ $slide_bottom->link_url ?? "#" }}" class="grid-image-product">
                  <img src="{{ asset('storage/' . $slide_bottom->image) }}" alt="img">
                </a>
              </div>
            @endif
          </div>

        </div>

        {{-- Category Carousel Strip --}}
        <div class="catstrip">
          <div class="category-carousel-wrapper">
            <button class="category-nav prev" id="catPrev" aria-label="Previous categories">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
              </svg>
            </button>

            <div class="category-carousel-container">
              <div class="category-carousel-track" id="categoryTrack">
                @foreach($categories as $cat)
                  <a class="catcard" href="{{ route('shop.index', ['category' => $cat->slug]) }}">
                    <div class="em">
                      <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->name }}">
                    </div>
                    <span>{{ $cat->name }}</span>
                  </a>
                @endforeach
              </div>
            </div>

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

    {{-- JavaScript for Hero Slider and Functional Category Carousel --}}
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // --- 1. Hero Slider Logic ---
        const heroSlider = document.getElementById('heroSlider');
        if (heroSlider) {
          const slides = heroSlider.querySelectorAll('.slide');
          const prevBtn = document.getElementById('prevSlide');
          const nextBtn = document.getElementById('nextSlide');
          const dotsContainer = document.getElementById('sliderDots');
          let currentSlide = 0;
          let slideInterval;

          // Create dots
          slides.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
              goToSlide(index);
              resetInterval();
            });
            dotsContainer.appendChild(dot);
          });

          const dots = dotsContainer.querySelectorAll('.dot');

          function updateSlider() {
            heroSlider.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((dot, index) => {
              dot.classList.toggle('active', index === currentSlide);
            });
          }

          function goToSlide(index) {
            currentSlide = (index + slides.length) % slides.length;
            updateSlider();
          }

          function nextSlide() {
            goToSlide(currentSlide + 1);
          }

          function prevSlide() {
            goToSlide(currentSlide - 1);
          }

          if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetInterval(); });
          if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetInterval(); });

          function startInterval() {
            slideInterval = setInterval(nextSlide, 5000);
          }

          function resetInterval() {
            clearInterval(slideInterval);
            startInterval();
          }

          startInterval();
        }

        // --- 2. Category Carousel Logic ---
        const track = document.getElementById('categoryTrack');
        const prevBtn = document.getElementById('catPrev');
        const nextBtn = document.getElementById('catNext');
        const container = document.querySelector('.category-carousel-container');

        if (track && prevBtn && nextBtn && container) {
          let currentIndex = 0;

          function getVisibleCount() {
            const containerWidth = container.offsetWidth;
            const firstCard = track.querySelector('.catcard');
            if (!firstCard) return 4;
            const cardWidth = firstCard.offsetWidth;
            const gap = 20; // Match CSS gap
            return Math.max(1, Math.floor((containerWidth + gap) / (cardWidth + gap)));
          }

          function updateCarousel() {
            const cards = track.querySelectorAll('.catcard');
            const totalCards = cards.length;
            const visibleCount = getVisibleCount();
            const maxIndex = Math.max(0, totalCards - visibleCount);

            if (currentIndex > maxIndex) {
              currentIndex = maxIndex;
            }
            if (currentIndex < 0) {
              currentIndex = 0;
            }

            const firstCard = cards[0];
            if (firstCard) {
              const cardWidth = firstCard.offsetWidth;
              const gap = 20;
              const moveAmount = currentIndex * (cardWidth + gap);
              track.style.transform = `translateX(-${moveAmount}px)`;
            }

            // Button visibility states
            prevBtn.disabled = currentIndex === 0;
            prevBtn.classList.toggle('hidden', currentIndex === 0);

            nextBtn.disabled = currentIndex >= maxIndex;
            nextBtn.classList.toggle('hidden', currentIndex >= maxIndex);
          }

          nextBtn.addEventListener('click', function () {
            const cards = track.querySelectorAll('.catcard');
            const visibleCount = getVisibleCount();
            const maxIndex = Math.max(0, cards.length - visibleCount);
            if (currentIndex < maxIndex) {
              currentIndex++;
              updateCarousel();
            }
          });

          prevBtn.addEventListener('click', function () {
            if (currentIndex > 0) {
              currentIndex--;
              updateCarousel();
            }
          });

          // Recalculate on window resize
          window.addEventListener('resize', () => {
            updateCarousel();
          });

          // Initial check
          updateCarousel();
        }
      });
    </script>



    <div class="container">
      @if($flashSale->count())
        <div class="section">
          <div class="section-head">
            <div>
              <div class="eyebrow">Discount limited time</div>
              <h2>Flash Sale</h2>
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