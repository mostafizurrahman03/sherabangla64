// ============================================================
//  SERA BANGLA - সম্পূর্ণ JavaScript ফাইল
//  কার্ট ম্যানেজমেন্ট, নোটিফিকেশন, UI আপডেট
// ============================================================

// =========================
// 1. গ্লোবাল কনফিগারেশন
// =========================

const CSRF_TOKEN =
    document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content") || "";

const CART_ROUTES = {
    update:
        document
            .querySelector('meta[name="cart-update-url"]')
            ?.getAttribute("content") || "/cart/update/PLACEHOLDER",
    remove:
        document
            .querySelector('meta[name="cart-remove-url"]')
            ?.getAttribute("content") || "/cart/remove/PLACEHOLDER",
    add:
        document
            .querySelector('meta[name="cart-add-url"]')
            ?.getAttribute("content") || "/cart/add/PLACEHOLDER",
    items:
        document
            .querySelector('meta[name="cart-items-url"]')
            ?.getAttribute("content") || "/cart/items",
};

// =========================
// 2. কার্ট ওপেন / ক্লোজ
// =========================

function toggleCart() {
    const overlay = document.getElementById("cartOverlay");
    const panel = document.getElementById("cartPanel");
    if (!overlay || !panel) return;

    overlay.classList.toggle("active");
    panel.classList.toggle("open");
    document.body.style.overflow = panel.classList.contains("open")
        ? "hidden"
        : "";
}

function closeCart() {
    const overlay = document.getElementById("cartOverlay");
    const panel = document.getElementById("cartPanel");
    if (overlay) overlay.classList.remove("active");
    if (panel) panel.classList.remove("open");
    document.body.style.overflow = "";
}

// Escape key দিয়ে কার্ট বন্ধ
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") closeCart();
});

// =========================
// 3. কোয়ান্টিটি আপডেট (AJAX)
// =========================

function updateQuantity(itemId, change) {
    const itemElement = document.querySelector(
        `.cart-item[data-id="${itemId}"]`,
    );
    if (!itemElement) {
        console.error("Item not found:", itemId);
        return;
    }

    const qtySpan = itemElement.querySelector(".qty-value");
    if (!qtySpan) {
        console.error("Quantity span not found");
        return;
    }

    let currentQty = parseInt(qtySpan.textContent);
    let newQty = currentQty + change;

    if (newQty < 1) {
        removeItem(itemId);
        return;
    }

    // UI আপডেট
    qtySpan.textContent = newQty;

    // বাটন ডিজেবল
    const btns = itemElement.querySelectorAll(".qty-btn");
    btns.forEach((btn) => (btn.disabled = true));

    // URL তৈরি
    const url = CART_ROUTES.update.replace("PLACEHOLDER", itemId);

    // AJAX রিকোয়েস্ট
    fetch(url, {
        method: "patch",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": CSRF_TOKEN,
            "X-Requested-With": "XMLHttpRequest",
            Accept: "application/json",
        },
        body: JSON.stringify({ quantity: newQty }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                updateCartUI(data);
                showNotification("Cart updated!", "success");
            } else {
                qtySpan.textContent = currentQty;
                showNotification(
                    data.message || "Error updating cart",
                    "error",
                );
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            qtySpan.textContent = currentQty;
            showNotification("Something went wrong", "error");
        })
        .finally(() => {
            btns.forEach((btn) => (btn.disabled = false));
        });
}

// =========================
// 4. আইটেম রিমুভ (AJAX)
// =========================

function removeItem(itemId) {
    const itemElement = document.querySelector(
        `.cart-item[data-id="${itemId}"]`,
    );
    if (!itemElement) return;

    // অ্যানিমেশন
    itemElement.style.transition = "all 0.3s ease";
    itemElement.style.transform = "translateX(100%)";
    itemElement.style.opacity = "0";

    setTimeout(() => {
        const url = CART_ROUTES.remove.replace("PLACEHOLDER", itemId);

        fetch(url, {
            method: "Delete",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": CSRF_TOKEN,
                "X-Requested-With": "XMLHttpRequest",
                Accept: "application/json",
            },
            body: JSON.stringify({}),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    itemElement.remove();
                    updateCartUI(data);
                    showNotification("Item removed from cart", "success");

                    // খালি কার্ট
                    if ((data.count || data.items_count || 0) === 0) {
                        const body = document.getElementById("cartPanelBody");
                        if (body) {
                            body.innerHTML = `
                            <div class="empty-cart">
                                <span style="font-size:64px;">🛒</span>
                                <h4>Your cart is empty</h4>
                                <p>Start shopping to add items to your cart</p>
                                <a href="{{ route('shop.index') }}" class="btn deepblue" onclick="closeCart()">Start Shopping</a>
                            </div>
                        `;
                        }
                    }
                }
            })
            .catch((error) => console.error("Error:", error));
    }, 300);
}

// =========================
// 5. কার্ট UI আপডেট
// =========================

function updateCartUI(data) {
    // টোটাল প্রাইস আপডেট
    document
        .querySelectorAll("#cartTotalPrice, #floatingCartTotal")
        .forEach((el) => {
            if (el) {
                const amount = data.total || data.subtotal || 0;
                el.textContent = "৳" + parseFloat(amount).toFixed(2);
            }
        });

    // কাউন্ট আপডেট (হেডার)
    document.querySelectorAll(".cart-count").forEach((badge) => {
        const count = data.count || data.items_count || 0;
        badge.textContent = count;
        badge.classList.add("pop");
        setTimeout(() => badge.classList.remove("pop"), 300);
    });

    // ফ্লোটিং ব্যাজ আপডেট
    const floatingBadge = document.getElementById("floatingCartBadge");
    if (floatingBadge) {
        const count = data.count || data.items_count || 0;
        floatingBadge.textContent = count + (count === 1 ? " item" : " items");
        floatingBadge.classList.add("pop");
        setTimeout(() => floatingBadge.classList.remove("pop"), 300);
    }

    // খালি কার্ট চেক
    if ((data.count || data.items_count || 0) === 0) {
        const body = document.getElementById("cartPanelBody");
        if (body && !body.querySelector(".empty-cart")) {
            body.innerHTML = `
                <div class="empty-cart">
                    <span style="font-size:64px;">🛒</span>
                    <h4>Your cart is empty</h4>
                    <p>Start shopping to add items to your cart</p>
                    <a href="{{ route('shop.index') }}" class="btn deepblue" onclick="closeCart()">Start Shopping</a>
                </div>
            `;
        }
    }
}

// =========================
// 6. অ্যাড টু কার্ট হ্যান্ডলার
// =========================

document.addEventListener("DOMContentLoaded", function () {
    // সব add-to-cart ফর্ম হ্যান্ডেল
    document.querySelectorAll(".add-to-cart-form").forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const form = this;
            const url = form.getAttribute("action");
            const formData = new FormData(form);

            // বাটন ডিজেবল
            const submitBtn = form.querySelector(
                'button[type="submit"], .add-to-cart-btn',
            );
            const originalText =
                submitBtn?.innerHTML || submitBtn?.textContent || "Add to Cart";
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<i class="fas fa-spinner fa-spin"></i> Adding...';
            }

            fetch(url, {
                method: "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    Accept: "application/json",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        updateCartUI(data);
                        showNotification(
                            data.message || "Item added to cart!",
                            "success",
                        );

                        // কার্ট প্যানেল আপডেট (যদি HTML আসে)
                        if (data.cart_html) {
                            const body =
                                document.getElementById("cartPanelBody");
                            if (body) body.innerHTML = data.cart_html;
                        }

                        // মিনি পপআপ
                        showMiniCartPopup(data);
                    } else {
                        showNotification(
                            data.message || "Failed to add item",
                            "error",
                        );
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    showNotification("Something went wrong", "error");
                })
                .finally(() => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }
                });
        });
    });
});

// =========================
// 7. মিনি কার্ট পপআপ
// =========================

function showMiniCartPopup(data) {
    const existing = document.querySelector(".mini-cart-popup");
    if (existing) existing.remove();

    const popup = document.createElement("div");
    popup.className = "mini-cart-popup";
    popup.style.cssText = `
        position: fixed;
        bottom: 80px;
        right: 20px;
        background: #fff;
        border-radius: 16px;
        padding: 20px 24px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        z-index: 99999;
        transform: translateY(120%);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        min-width: 280px;
        max-width: 360px;
        border: 1px solid rgba(0,0,0,0.05);
    `;
    popup.innerHTML = `
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
            <span style="font-size:24px;">✅</span>
            <div>
                <div style="font-weight:600;font-size:16px;color:#1a1a2e;">Added to Cart!</div>
                <div style="font-size:13px;color:#666;">${data.count || 0} items in cart</div>
            </div>
        </div>
        <div style="display:flex;gap:8px;border-top:1px solid #f0f0f0;padding-top:12px;">
            <a href="{{ route('cart.index') }}" style="flex:1;padding:8px 12px;background:#f0f0f0;border-radius:8px;text-align:center;text-decoration:none;color:#333;font-size:14px;font-weight:500;">View Cart</a>
            <a href="{{ route('checkout.index') }}" style="flex:1;padding:8px 12px;background:#0a0a23;border-radius:8px;text-align:center;text-decoration:none;color:#fff;font-size:14px;font-weight:500;">Checkout →</a>
        </div>
    `;
    document.body.appendChild(popup);

    setTimeout(() => (popup.style.transform = "translateY(0)"), 10);
    setTimeout(() => {
        popup.style.transform = "translateY(120%)";
        setTimeout(() => popup.remove(), 400);
    }, 4000);
}

// =========================
// 8. নোটিফিকেশন সিস্টেম
// =========================

function showNotification(message, type = "info") {
    const existing = document.querySelector(".custom-notification");
    if (existing) existing.remove();

    const notification = document.createElement("div");
    notification.className = "custom-notification";

    const colors = {
        success: "#059669",
        error: "#dc2626",
        info: "#3b82f6",
        warning: "#d97706",
    };

    const icons = {
        success: "✅",
        error: "❌",
        info: "ℹ️",
        warning: "⚠️",
    };

    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 16px 24px;
        background: ${colors[type] || colors.info};
        color: #fff;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        z-index: 99999;
        transform: translateX(120%);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        max-width: 400px;
        display: flex;
        align-items: center;
        gap: 12px;
    `;
    notification.innerHTML = `
        <span style="font-size:20px;">${icons[type] || icons.info}</span>
        <span>${message}</span>
    `;
    document.body.appendChild(notification);

    setTimeout(() => (notification.style.transform = "translateX(0)"), 10);
    setTimeout(() => {
        notification.style.transform = "translateX(120%)";
        setTimeout(() => {
            if (notification.parentNode) notification.remove();
        }, 400);
    }, 3000);
}

// =========================
// 9. ক্যাটেগরি ক্যারোসেল (যদি থাকে)
// =========================

document.addEventListener("DOMContentLoaded", function () {
    const categoryTrack = document.getElementById("categoryTrack");
    if (categoryTrack) {
        let currentIndex = 0;
        const slides = categoryTrack.querySelectorAll(".catcard");
        const totalSlides = slides.length;
        let autoSlideInterval;

        function getVisibleCount() {
            const width = window.innerWidth;
            if (width <= 480) return 2;
            if (width <= 760) return 3;
            if (width <= 900) return 4;
            if (width <= 1100) return 6;
            return 8;
        }

        function getCardWidth() {
            if (slides.length === 0) return 120;
            const card = slides[0];
            const width = card.offsetWidth;
            return width + 20;
        }

        function updateCarousel(animate = true) {
            const visibleCats = getVisibleCount();
            const cardWidth = getCardWidth();
            const maxIndex = Math.max(0, totalSlides - visibleCats);

            if (currentIndex > maxIndex) currentIndex = maxIndex;
            if (currentIndex < 0) currentIndex = 0;

            const translateX = currentIndex * cardWidth;

            if (!animate) {
                categoryTrack.style.transition = "none";
            } else {
                categoryTrack.style.transition =
                    "transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)";
            }

            categoryTrack.style.transform = `translateX(-${translateX}px)`;

            if (!animate) {
                categoryTrack.offsetHeight;
                categoryTrack.style.transition =
                    "transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)";
            }

            // নেভিগেশন বাটন আপডেট
            const prevBtn = document.getElementById("catPrev");
            const nextBtn = document.getElementById("catNext");

            if (prevBtn) {
                prevBtn.style.display =
                    maxIndex === 0 || currentIndex === 0 ? "none" : "flex";
            }
            if (nextBtn) {
                nextBtn.style.display =
                    maxIndex === 0 || currentIndex >= maxIndex
                        ? "none"
                        : "flex";
            }
        }

        function nextCategory() {
            const visibleCats = getVisibleCount();
            const maxIndex = Math.max(0, totalSlides - visibleCats);
            if (maxIndex === 0) return;

            currentIndex = currentIndex < maxIndex ? currentIndex + 1 : 0;
            updateCarousel(true);
        }

        function prevCategory() {
            const visibleCats = getVisibleCount();
            const maxIndex = Math.max(0, totalSlides - visibleCats);
            if (maxIndex === 0) return;

            currentIndex = currentIndex > 0 ? currentIndex - 1 : maxIndex;
            updateCarousel(true);
        }

        function startAutoSlide() {
            if (autoSlideInterval) clearInterval(autoSlideInterval);
            const visibleCats = getVisibleCount();
            const maxIndex = Math.max(0, totalSlides - visibleCats);
            if (maxIndex > 0) {
                autoSlideInterval = setInterval(nextCategory, 4000);
            }
        }

        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
                autoSlideInterval = null;
            }
        }

        // বাটন ইভেন্ট
        const prevBtn = document.getElementById("catPrev");
        const nextBtn = document.getElementById("catNext");

        if (prevBtn) {
            prevBtn.addEventListener("click", function (e) {
                e.preventDefault();
                stopAutoSlide();
                prevCategory();
                startAutoSlide();
            });
        }
        if (nextBtn) {
            nextBtn.addEventListener("click", function (e) {
                e.preventDefault();
                stopAutoSlide();
                nextCategory();
                startAutoSlide();
            });
        }

        // রেস্পন্সিভ
        let resizeTimeout;
        window.addEventListener("resize", function () {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function () {
                updateCarousel(false);
                startAutoSlide();
            }, 250);
        });

        // হোভার পজ
        const wrapper = document.querySelector(".category-carousel-wrapper");
        if (wrapper) {
            wrapper.addEventListener("mouseenter", stopAutoSlide);
            wrapper.addEventListener("mouseleave", startAutoSlide);
        }

        // টাচ সাপোর্ট
        let touchStartX = 0;
        let touchStartY = 0;

        categoryTrack.addEventListener(
            "touchstart",
            function (e) {
                touchStartX = e.changedTouches[0].screenX;
                touchStartY = e.changedTouches[0].screenY;
                stopAutoSlide();
            },
            { passive: true },
        );

        categoryTrack.addEventListener(
            "touchend",
            function (e) {
                const diffX = touchStartX - e.changedTouches[0].screenX;
                const diffY = touchStartY - e.changedTouches[0].screenY;

                if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
                    if (diffX > 0) nextCategory();
                    else prevCategory();
                    startAutoSlide();
                }
            },
            { passive: true },
        );

        // ইনিশিয়াল
        setTimeout(function () {
            updateCarousel(false);
            startAutoSlide();
        }, 200);
    }
});

// =========================
// 10. প্রোডাক্ট ডিটেইলস - রিড মোর
// =========================

function toggleDescription() {
    const wrapper = document.getElementById("descWrapper");
    const btn = document.getElementById("readMoreBtn");
    if (!wrapper || !btn) return;

    wrapper.classList.toggle("expanded");

    if (wrapper.classList.contains("expanded")) {
        btn.innerHTML = 'Show Less <i class="fas fa-chevron-up"></i>';
    } else {
        btn.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>';
    }
}

// =========================
// 11. কোয়ান্টিটি কন্ট্রোল (প্রোডাক্ট পেজ)
// =========================

function changeQty(change) {
    const input = document.getElementById("qtyInput");
    if (!input) return;
    let val = parseInt(input.value) || 1;
    const max = parseInt(input.max) || 999;
    val = Math.max(1, Math.min(max, val + change));
    input.value = val;
}

// =========================
// 12. মোবাইল স্টিকি অ্যাড টু কার্ট
// =========================

function mobileAddToCart() {
    const form = document.getElementById("cartForm");
    if (form) {
        const btn = form.querySelector('button[type="submit"]');
        if (btn && !btn.disabled) {
            btn.click();
        }
    }
}

// =========================
// 13. পেজ লোড হলে ক্যাটেগরি সেট করা
// =========================

document.addEventListener("DOMContentLoaded", function () {
    // ক্যাটেগরি ড্রপডাউন
    const categorySelect = document.getElementById("categorySelect");
    if (categorySelect) {
        categorySelect.addEventListener("change", function () {
            const url = this.value;
            if (url) window.location.href = url;
        });
    }

    // আলার্ট অটো ডিসমিস
    const alerts = document.querySelectorAll(".alert-dismissible");
    alerts.forEach((alert) => {
        setTimeout(() => {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
});

console.log("✅ Sera Bangla JavaScript loaded successfully!");
console.log("📦 Cart routes:", CART_ROUTES);
