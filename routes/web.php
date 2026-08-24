<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;





Route::get('/project-details', function () {
    return view('home.project-details');
});

// Route::get('/about', HomeController::class, 'about');
// Route::get('/contact', HomeController::class, 'contact');
// Route::get('/portfolio', HomeController::class, 'portfolio');
// Route::get('/services', HomeController::class, 'services');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('skill', SkillController::class);


});

require __DIR__ . '/mustafiz.php';
require __DIR__ . '/asif.php';