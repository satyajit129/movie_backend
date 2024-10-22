<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

Route::get('admin/auth',[AdminAuthController::class,'adminAuth'])->name('adminAuth')->middleware(RedirectIfAuthenticated::class);
Route::post('admin/auth/login-request',[AdminAuthController::class,'adminLoginRequest'])->name('adminLoginRequest');

Route::group(['guard' => 'web', 'prefix' => 'admin', 'middleware' => RedirectIfNotAuthenticated::class], function () {
    Route::get('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
    Route::get('/dashboard', [AdminDashboardController::class, 'adminDashboard'])->name('adminDashboard');

    Route::group(['prefix' => 'type'], function () {
        Route::get('/list', [TypeController::class, 'typeList'])->name('typeList');
        Route::get('/create-or-update/{id?}', [TypeController::class, 'typeCreateorUpdate'])->name('typeCreateorUpdate');
        Route::post('/save/{id?}', [TypeController::class, 'typeSave'])->name('typeSave');
    });
    Route::group(['prefix' => 'movie'], function () {
        Route::get('/list', [MovieController::class, 'movieList'])->name('movieList');
        Route::get('/create-or-update/{id?}', [MovieController::class, 'movieCreateorUpdate'])->name('movieCreateorUpdate');
        Route::post('/save/{id?}', [MovieController::class, 'movieSave'])->name('movieSave');
        Route::post('generate-slug', [MovieController::class, 'generateSlug'])->name('generateSlug');
    });

    Route::group(['prefix' => 'slider'], function () {
        Route::get('/list', [SliderController::class, 'sliderList'])->name('sliderList');
        Route::get('/create-or-update/{id?}', [SliderController::class, 'sliderCreateorUpdate'])->name('sliderCreateorUpdate');
        Route::post('/save/{id?}', [SliderController::class, 'sliderSave'])->name('sliderSave');
    });
});