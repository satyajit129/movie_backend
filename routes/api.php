<?php

use App\Http\Controllers\MovieAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/movies-list',[MovieAPIController::class,'moviesList']);
Route::get('/movie-details/{id}',[MovieAPIController::class,'movieDetails']);
Route::get('/slider-image',[MovieAPIController::class,'sliderImage']);
Route::get('/search-movies/{searchInput}',[MovieAPIController::class,'searchMovies']);




