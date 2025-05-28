<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/Customer')->group(function() {
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('Customer.index');
    Route::get('/movies', [\App\Http\Controllers\MovieController::class, 'index'])->name('Movies.index');
});

Route::prefix('/Admin')->group(function () {
   Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('Admin.index');
   Route::get('/movies', [\App\Http\Controllers\AdminController::class, 'movies'])->name('Admin.movies');
   Route::get('/movies/create', [\App\Http\Controllers\MovieController::class, 'create'])->name('Movies.create');
});
