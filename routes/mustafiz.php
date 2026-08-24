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
    HeaderController
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
Route::middleware(['auth']) // প্রয়োজনে আপনার পছন্দমত মিডলওয়্যার যোগ করতে পারেন
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
        Route::resource('headers', HeaderController::class);

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

    });