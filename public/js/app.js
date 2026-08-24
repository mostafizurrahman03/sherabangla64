document.addEventListener("DOMContentLoaded", function () {
    // ===== Hero Slider =====
    const slider = document.getElementById("heroSlider");
    const slides = slider.querySelectorAll(".slide");
    const totalSlides = slides.length;
    let currentIndex = 0;
    let isTransitioning = false;
    let autoSlideInterval;

    // Dots
    let dotsContainer = document.getElementById("sliderDots");
    dotsContainer.innerHTML = "";
    for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement("span");
        dot.className = "dot" + (i === 0 ? " active" : "");
        dot.dataset.index = i;
        dot.addEventListener("click", () => goToSlide(i));
        dotsContainer.appendChild(dot);
    }
    const dots = dotsContainer.querySelectorAll(".dot");

    function goToSlide(index) {
        if (isTransitioning || index === currentIndex) return;
        isTransitioning = true;
        currentIndex = index;
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        dots.forEach((dot, i) => {
            dot.classList.toggle("active", i === currentIndex);
        });
        slides.forEach((slide, i) => {
            slide.classList.toggle("active", i === currentIndex);
        });
        setTimeout(() => {
            isTransitioning = false;
        }, 600);
    }

    function nextSlide() {
        goToSlide((currentIndex + 1) % totalSlides);
    }

    function prevSlide() {
        goToSlide((currentIndex - 1 + totalSlides) % totalSlides);
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 5000);
    }

    function stopAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
            autoSlideInterval = null;
        }
    }

    document.getElementById("prevSlide").addEventListener("click", () => {
        stopAutoSlide();
        prevSlide();
        startAutoSlide();
    });
    document.getElementById("nextSlide").addEventListener("click", () => {
        stopAutoSlide();
        nextSlide();
        startAutoSlide();
    });

    // Touch support
    let touchStartX = 0;
    slider.addEventListener(
        "touchstart",
        (e) => {
            touchStartX = e.changedTouches[0].screenX;
            stopAutoSlide();
        },
        { passive: true },
    );
    slider.addEventListener(
        "touchend",
        (e) => {
            const diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 50) {
                diff > 0 ? nextSlide() : prevSlide();
            }
            startAutoSlide();
        },
        { passive: true },
    );

    const sliderWrapper = slider.closest(".slider-wrapper");
    sliderWrapper.addEventListener("mouseenter", stopAutoSlide);
    sliderWrapper.addEventListener("mouseleave", startAutoSlide);
    startAutoSlide();

    // ===== Category Carousel =====
    const track = document.getElementById("categoryTrack");
    const catCards = track.querySelectorAll(".catcard");
    const totalCats = catCards.length;
    let visibleCats = 8;
    let currentCatIndex = 0;
    let catAutoSlideInterval;

    function getVisibleCount() {
        if (window.innerWidth <= 480) return 2;
        if (window.innerWidth <= 760) return 3;
        if (window.innerWidth <= 900) return 4;
        if (window.innerWidth <= 1100) return 6;
        return 8;
    }

    function updateCarousel() {
        visibleCats = getVisibleCount();
        const cardWidth = catCards[0].offsetWidth + 14;
        const maxIndex = Math.max(0, totalCats - visibleCats);

        if (currentCatIndex > maxIndex) {
            currentCatIndex = maxIndex;
        }

        const translateX = currentCatIndex * cardWidth;
        track.style.transform = `translateX(-${translateX}px)`;

        // Show/hide navigation buttons
        document
            .getElementById("catPrev")
            .classList.toggle("hidden", currentCatIndex === 0);
        document
            .getElementById("catNext")
            .classList.toggle("hidden", currentCatIndex >= maxIndex);
    }

    function nextCategory() {
        const maxIndex = Math.max(0, totalCats - getVisibleCount());
        if (currentCatIndex < maxIndex) {
            currentCatIndex++;
            updateCarousel();
        } else {
            currentCatIndex = 0;
            updateCarousel();
        }
    }

    function prevCategory() {
        if (currentCatIndex > 0) {
            currentCatIndex--;
            updateCarousel();
        } else {
            const maxIndex = Math.max(0, totalCats - getVisibleCount());
            currentCatIndex = maxIndex;
            updateCarousel();
        }
    }

    function startCategoryAutoSlide() {
        catAutoSlideInterval = setInterval(nextCategory, 4000);
    }

    function stopCategoryAutoSlide() {
        if (catAutoSlideInterval) {
            clearInterval(catAutoSlideInterval);
            catAutoSlideInterval = null;
        }
    }

    document.getElementById("catPrev").addEventListener("click", () => {
        stopCategoryAutoSlide();
        prevCategory();
        startCategoryAutoSlide();
    });
    document.getElementById("catNext").addEventListener("click", () => {
        stopCategoryAutoSlide();
        nextCategory();
        startCategoryAutoSlide();
    });

    // Responsive update
    let resizeTimeout;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            updateCarousel();
        }, 200);
    });

    // Hover pause
    const carouselWrapper = document.querySelector(
        ".category-carousel-wrapper",
    );
    carouselWrapper.addEventListener("mouseenter", stopCategoryAutoSlide);
    carouselWrapper.addEventListener("mouseleave", startCategoryAutoSlide);

    // Initial setup
    setTimeout(updateCarousel, 100);
    startCategoryAutoSlide();

    // Cleanup
    window.addEventListener("beforeunload", () => {
        stopAutoSlide();
        stopCategoryAutoSlide();
    });
});

// ===== Cart Functions =====
function toggleCart() {
    const overlay = document.getElementById("cartOverlay");
    const panel = document.getElementById("cartPanel");
    overlay.classList.toggle("active");
    panel.classList.toggle("open");
    document.body.style.overflow = panel.classList.contains("open")
        ? "hidden"
        : "";
}

function closeCart() {
    document.getElementById("cartOverlay").classList.remove("active");
    document.getElementById("cartPanel").classList.remove("open");
    document.body.style.overflow = "";
}

// Close cart with Escape key
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
        closeCart();
    }
});

// ===== Cart Item Management =====
function updateQuantity(itemId, change) {
    const itemElement = document.querySelector(
        `.cart-item[data-id="${itemId}"]`,
    );
    if (!itemElement) return;

    const qtySpan = itemElement.querySelector(".qty-value");
    let currentQty = parseInt(qtySpan.textContent);
    let newQty = currentQty + change;

    if (newQty < 1) {
        removeItem(itemId);
        return;
    }

    // Update UI immediately
    qtySpan.textContent = newQty;

    // Send AJAX request to update cart
    fetch('{{ route("cart.update") }}', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify({
            id: itemId,
            quantity: newQty,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                updateCartUI(data);
            } else {
                // Revert on error
                qtySpan.textContent = currentQty;
                showNotification("Error updating cart", "error");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            qtySpan.textContent = currentQty;
            showNotification("Something went wrong", "error");
        });
}

function removeItem(itemId) {
    const itemElement = document.querySelector(
        `.cart-item[data-id="${itemId}"]`,
    );
    if (!itemElement) return;

    // Animate removal
    itemElement.style.transition = "all 0.3s ease";
    itemElement.style.transform = "translateX(100%)";
    itemElement.style.opacity = "0";

    setTimeout(() => {
        fetch('{{ route("cart.remove") }}', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({ id: itemId }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    itemElement.remove();
                    updateCartUI(data);
                    showNotification("Item removed from cart", "success");
                }
            })
            .catch((error) => console.error("Error:", error));
    }, 300);
}

function updateCartUI(data) {
    // Update total price
    const totalPrice = document.getElementById("cartTotalPrice");
    if (totalPrice) {
        totalPrice.textContent = "$" + data.total.toFixed(2);
    }

    // Update cart count badge
    const countBadge = document.querySelector(".cart-count");
    if (countBadge) {
        countBadge.textContent = data.count;
        countBadge.classList.add("pop");
        setTimeout(() => countBadge.classList.remove("pop"), 300);
    }

    // If cart is empty, show empty state
    if (data.count === 0) {
        const body = document.getElementById("cartPanelBody");
        body.innerHTML = `
                <div class="empty-cart">
                    <span style="font-size:64px;">🛒</span>
                    <h4>Your cart is empty</h4>
                    <p>Start shopping to add items to your cart</p>
                    <a href="{{ route('shop.index') }}" class="btn amber" onclick="closeCart()">Start Shopping</a>
                </div>
            `;
    }
}

// ===== Notification System =====
function showNotification(message, type = "info") {
    const notification = document.createElement("div");
    notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 16px 24px;
            background: ${type === "success" ? "#059669" : "#dc2626"};
            color: #fff;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            z-index: 99999;
            transform: translateX(120%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            max-width: 400px;
        `;
    notification.textContent = message;
    document.body.appendChild(notification);

    // Trigger slide in
    setTimeout(() => {
        notification.style.transform = "translateX(0)";
    }, 10);

    // Auto remove
    setTimeout(() => {
        notification.style.transform = "translateX(120%)";
        setTimeout(() => notification.remove(), 400);
    }, 3000);
}
