<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/item/{item}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/item/{item}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/items', [CartController::class, 'getItems'])->name('cart.items');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/order/success/{orderNumber}', [OrderController::class, 'success'])->name('orders.success');
Route::get('/order/track', [OrderController::class, 'trackForm'])->name('orders.track');
Route::post('/order/track', [OrderController::class, 'trackResult'])->name('orders.track.result');

Route::middleware('auth')->group(function () {
  Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.mine');
});