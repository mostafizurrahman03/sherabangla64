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

        // Share cart and categories with layouts.app
        View::composer('layouts.app', function ($view) {
            $cart = app(CartController::class)->currentCartPublic();

            $view->with([
                'globalCategories' => Category::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get(),
                'globalCartCount' => $cart->total_quantity,
            ]);
        });
    }
}