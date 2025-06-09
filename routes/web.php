<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::prefix('/Customer')->group(function() {
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('Customer.index');
    Route::get('/movies', [\App\Http\Controllers\MovieController::class, 'index'])->name('Movies.index');
});

Route::prefix('/Admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('Admin.dashboard');
    Route::get('/movies', [\App\Http\Controllers\AdminController::class, 'movies'])->name('Admin.movies');
    Route::get('/movies/create', [\App\Http\Controllers\MovieController::class, 'create'])->name('Movies.create');
    Route::delete('/movies/{id}', [\App\Http\Controllers\MovieController::class, 'destroy'])->name('Movies.destroy');
    Route::get('/movies/edit', [\App\Http\Controllers\MovieController::class, 'create'])->name('Movies.edit');
});





