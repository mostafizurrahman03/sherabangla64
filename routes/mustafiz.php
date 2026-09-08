<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    RoleController,
    PermissionController,
    UserController,
    MenuController,
    SliderController,
    PolicyController,
    CategoryController,
    SubCategoryController,
    BrandController,
    ProductController,
    SettingController,
    CouponController,
    CustomerController,
    HeaderController,
    DistrictController,
    ThanaController,
    OrderController
};

/*
|--------------------------------------------------------------------------
| Test Route
|--------------------------------------------------------------------------
*/
Route::get('good', function () {
    return "mustafiz vai";
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth']) 
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /* Admin Management */
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users', UserController::class);

        /* Website Customization */
        Route::resource('menus', MenuController::class);
        Route::resource('sliders', SliderController::class);
        Route::resource('policies', PolicyController::class);
        // Route::resource('headers', HeaderController::class);

        /* Product Management */
        Route::resource('categories', CategoryController::class);
        Route::resource('sub-categories', SubCategoryController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('products', ProductController::class);


        Route::put('settings/update-all', [SettingController::class, 'updateAll'])
            ->name('settings.update-all');

        // General Settings
        Route::get('settings/general', [SettingController::class, 'general'])
            ->name('settings.general');

        // Social Settings
        Route::get('settings/social', [SettingController::class, 'social'])
            ->name('settings.social');

        // Mail Settings
        Route::get('settings/mail', [SettingController::class, 'mail'])
            ->name('settings.mail');

        // Integration Settings
        Route::get('settings/integration', [SettingController::class, 'integration'])
            ->name('settings.integration');

        Route::resource('settings', SettingController::class);

        Route::resource('coupons', CouponController::class);

        
        // Add this route for AJAX thana loading
        Route::get('/customers/get-thanas', [CustomerController::class, 'getThanas'])
            ->name('customers.get-thanas');


        // Toggle Status Route
        Route::post('customers/{id}/toggle-status', [CustomerController::class, 'toggleStatus'])
            ->name('customers.toggle-status');

        // Toggle Verification Route
        Route::post('customers/{id}/toggle-verification', [CustomerController::class, 'toggleVerification'])
            ->name('customers.toggle-verification');

        Route::resource('customers', CustomerController::class);

           

        // District Routes

        Route::post('districts/{id}/toggle-status', [DistrictController::class, 'toggleStatus'])
            ->name('districts.toggle-status');
        Route::get('districts/get-districts', [DistrictController::class, 'getDistricts'])
            ->name('districts.get-districts');

        Route::resource('districts', DistrictController::class);

        // Thana Routes
    
        Route::post('thanas/{id}/toggle-status', [ThanaController::class, 'toggleStatus'])
            ->name('thanas.toggle-status');
        Route::get('thanas/get-by-district', [ThanaController::class, 'getThanasByDistrict'])
            ->name('thanas.get-by-district');

        Route::resource('thanas', ThanaController::class);


        // Orders
        Route::resource('orders', OrderController::class);

        Route::post('orders/{id}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.update-status');

        Route::post('orders/{id}/cancel', [OrderController::class, 'cancel'])
            ->name('orders.cancel');

        Route::get('orders/{id}/print', [OrderController::class, 'print'])
            ->name('orders.print');

        
        

    });