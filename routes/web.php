<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/Customer')->group(function() {
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('Customer.home');
});

Route::prefix('/Admin')->group(function () {
   Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('Admin.home');
});
