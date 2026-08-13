# Sera Bangla — Laravel E-commerce

Grocery / daily-essentials e-commerce codebase built on Laravel 11, English-
language storefront with a white-background blue theme — laid out the way
ghorerbazar.com is: category browse, product detail, cart, checkout with
COD/bKash/card, and order confirmation.

## What's included
- `app/Models` — Category, Product, ProductImage, Cart, CartItem, Order,
  OrderItem, Address, Coupon
- `app/Http/Controllers` — Home, Product (listing + filters + search),
  Cart (add/update/remove), Checkout (order placement + coupon), Order
- `database/migrations` — full schema for the above
- `database/seeders/DatabaseSeeder.php` — seeds the same 8 categories and
  16 starter products used in the front-end demo
- `resources/views` — Blade templates (home, shop, product, cart, checkout,
  order success/history) sharing one layout and `public/css/app.css`
- `routes/web.php` — all storefront routes; `routes/auth.php` is a stub for
  Laravel Breeze

This is a real, runnable Laravel app skeleton — not a mockup — but it needs
PHP/Composer/MySQL to actually run, which isn't available in this chat
sandbox. That's why the standalone `sera-bangla-demo.html` file is included
alongside it: open that one directly in a browser to click through the exact
same design and cart/checkout flow right now, no server needed.

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate

# point DB_* in .env at a MySQL database, then:
php artisan migrate --seed

# add authentication (login/register/profile), optional but recommended:
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run build

php artisan serve
```

Visit `http://localhost:8000`.

## Notes / next steps for production
- **Product images**: `thumbnail` is a nullable path under `storage/app/public`;
  run `php artisan storage:link` and wire up an admin uploader (or use
  Filament/Nova) to manage products day to day.
- **Payments**: `payment_method` supports `cod`, `bkash`, `card`. COD needs
  no integration. For bKash, use their Merchant/Checkout API; for cards,
  SSLCommerz is the standard gateway for Bangladesh — placeholder `.env`
  keys are already there.
- **Admin panel**: none is scaffolded here. Filament (`composer require
  filament/filament`) is the fastest way to get product/order/category CRUD
  on top of the models already defined.
- **Cart persistence**: guest carts are tracked via a `cart_session_id` in
  session; merge guest cart into user cart on login if you want that.
- **Search**: currently a simple `LIKE` query; swap in Laravel Scout +
  Meilisearch/Typesense if the catalog grows large.
- **Delivery/shipping rule**: flat ৳60, free at ৳500+, hardcoded in
  `CheckoutController` and `CartController`'s views — move to a settings
  table if it needs to be editable without a deploy.
