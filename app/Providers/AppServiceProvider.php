<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share settings with ALL views
        View::composer('*', function ($view) {
            $settings = Setting::all()->keyBy('key');

            $view->with([
                'settings' => $settings,
                'logo' => isset($settings['logo']) && $settings['logo']->value
                    ? asset('storage/' . $settings['logo']->value)
                    : asset('admin/dist/img/logo31.png'),
                'appName' => isset($settings['app_name'])
                    ? $settings['app_name']->value
                    : 'Sherabangla64',
                'favicon' => isset($settings['favicon']) && $settings['favicon']->value
                    ? asset('storage/' . $settings['favicon']->value)
                    : asset('admin/dist/img/favicon.ico'),
                'copyrightText' => isset($settings['copyright_text'])
                    ? $settings['copyright_text']->value
                    : 'All rights reserved.',
            ]);
        });

        // View::composer('layouts.app', function ($view) {
        //     $cart = app(CartController::class)->currentCartPublic();

        //     if ($cart) {
        //         $cart->load('items.product');
        //     }

        //     // Safely calculate total price and items count to avoid errors if cart is null
        //     $cartTotalPrice = 0;
        //     $globalCartCount = 0;

        //     if ($cart && $cart->items) {
        //         $cartTotalPrice = $cart->items->sum(function ($item) {
        //             // Fallback to product current_price if unit_price is missing
        //             $price = $item->unit_price ?? ($item->product->current_price ?? 0);
        //             return $item->quantity * $price;
        //         });

        //         $globalCartCount = $cart->items->sum('quantity');
        //     }

        //     $view->with([
        //         'globalCategories' => Category::where('is_active', true)
        //             ->orderBy('sort_order')
        //             ->get(),

        //         'globalCartCount' => $globalCartCount,

        //         'globalCartTotal' => $cartTotalPrice,

        //         // Global cart
        //         'cart' => $cart,
        //     ]);
        // });

        // গ্লোবাল ভিউ ভেরিয়েবল
        View::composer('*', function ($view) {
            $globalCategories = Category::where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->get();

            try {
                $cartController = app(CartController::class);
                $cart = $cartController->currentCartPublic();
                $globalCartCount = $cart->items->sum('quantity');
                $globalCartTotal = $cart->items->sum(function ($item) {
                    return $item->unit_price * $item->quantity;
                });
            } catch (\Exception $e) {
                $cart = null;
                $globalCartCount = 0;
                $globalCartTotal = 0;
            }

            $view->with(compact(
                'globalCategories',
                'cart',
                'globalCartCount',
                'globalCartTotal'
            ));
        });
    }
}