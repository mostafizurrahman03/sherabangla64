<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\HeaderController;


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

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {


/* Admin Management */

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('users', UserController::class);


/*Website Customization*/

Route::resource('menus', MenuController::class);
Route::resource('sliders', SliderController::class);
Route::resource('policies', PolicyController::class);
Route::resource('headers', HeaderController::class);


/*Product Management*/

Route::resource('categories', CategoryController::class);
Route::resource('sub-categories', SubCategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('products', ProductController::class);            








// /*
// |--------------------------------------------------------------------------
// | Admin Management
// |--------------------------------------------------------------------------
// */

// // Roles
// Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
// Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
// Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
// Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
// Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
// Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');


// // Permissions
// Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
// Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
// Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
// Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
// Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
// Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');


// // Users
// Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::get('users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('users', [UserController::class, 'store'])->name('users.store');
// Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


// /*
// |--------------------------------------------------------------------------
// | Website Customization
// |--------------------------------------------------------------------------
// */

// // Menus
// Route::get('menus', [MenuController::class, 'index'])->name('menus.index');
// Route::get('menus/create', [MenuController::class, 'create'])->name('menus.create');
// Route::post('menus', [MenuController::class, 'store'])->name('menus.store');
// Route::get('menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
// Route::put('menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
// Route::delete('menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');


// // Sliders
// Route::get('sliders', [SliderController::class, 'index'])->name('sliders.index');
// Route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');
// Route::post('sliders', [SliderController::class, 'store'])->name('sliders.store');
// Route::get('sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
// Route::put('sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
// Route::delete('sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');


// // Policies
// Route::get('policies', [PolicyController::class, 'index'])->name('policies.index');
// Route::get('policies/create', [PolicyController::class, 'create'])->name('policies.create');
// Route::post('policies', [PolicyController::class, 'store'])->name('policies.store');
// Route::get('policies/{policy}/edit', [PolicyController::class, 'edit'])->name('policies.edit');
// Route::put('policies/{policy}', [PolicyController::class, 'update'])->name('policies.update');
// Route::delete('policies/{policy}', [PolicyController::class, 'destroy'])->name('policies.destroy');


// // Headers
// Route::get('headers', [HeaderController::class, 'index'])->name('headers.index');
// Route::get('headers/create', [HeaderController::class, 'create'])->name('headers.create');
// Route::post('headers', [HeaderController::class, 'store'])->name('headers.store');
// Route::get('headers/{header}/edit', [HeaderController::class, 'edit'])->name('headers.edit');
// Route::put('headers/{header}', [HeaderController::class, 'update'])->name('headers.update');
// Route::delete('headers/{header}', [HeaderController::class, 'destroy'])->name('headers.destroy');


// /*
// |--------------------------------------------------------------------------
// | Product Management
// |--------------------------------------------------------------------------
// */

// // Categories
// Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// // Sub Categories
// Route::get('sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories.index');
// Route::get('sub-categories/create', [SubCategoryController::class, 'create'])->name('sub-categories.create');
// Route::post('sub-categories', [SubCategoryController::class, 'store'])->name('sub-categories.store');
// Route::get('sub-categories/{sub_category}/edit', [SubCategoryController::class, 'edit'])->name('sub-categories.edit');
// Route::put('sub-categories/{sub_category}', [SubCategoryController::class, 'update'])->name('sub-categories.update');
// Route::delete('sub-categories/{sub_category}', [SubCategoryController::class, 'destroy'])->name('sub-categories.destroy');


// // Brands
// Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
// Route::get('brands/create', [BrandController::class, 'create'])->name('brands.create');
// Route::post('brands', [BrandController::class, 'store'])->name('brands.store');
// Route::get('brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
// Route::put('brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
// Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');


// // Products
// Route::get('products', [ProductController::class, 'index'])->name('products.index');
// Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('products', [ProductController::class, 'store'])->name('products.store');
// Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

});