<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use Illuminate\Support\Facades\Route;



Route::get('admin/auth',[AdminAuthController::class,'adminAuth'])->name('adminAuth')->middleware(RedirectIfAuthenticated::class);
Route::post('admin/auth/login-request',[AdminAuthController::class,'adminLoginRequest'])->name('adminLoginRequest');

Route::group(['guard' => 'web', 'prefix' => 'admin', 'middleware' => RedirectIfNotAuthenticated::class], function () {
    Route::get('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
    Route::get('/dashboard', [AdminDashboardController::class, 'adminDashboard'])->name('adminDashboard');

    Route::group(['prefix' => 'movie-type'], function () {
        Route::get('/list', [MovieTypeController::class, 'movieTypeList'])->name('movieTypeList');
        Route::get('/create-or-update/{id?}', [MovieTypeController::class, 'movieTypeCreateorUpdate'])->name('movieTypeCreateorUpdate');
        Route::post('/save/{id?}', [MovieTypeController::class, 'movieTypeSave'])->name('movieTypeSave');
    });
    Route::group(['prefix' => 'movie'], function () {
        Route::get('/list', [MovieController::class, 'movieList'])->name('movieList');
        Route::get('/create-or-update/{id?}', [MovieController::class, 'movieCreateorUpdate'])->name('movieCreateorUpdate');
        Route::post('/save/{id?}', [MovieController::class, 'movieSave'])->name('movieSave');
    });
});