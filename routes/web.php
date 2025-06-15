<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::prefix('/customer')->group(function() {
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    Route::get('/movies', [\App\Http\Controllers\MovieController::class, 'index'])->name('movies.index');
    Route::get('/movies/{id}', [\App\Http\Controllers\MovieController::class, 'details'])->name('movies.details');
    Route::get('/bookings/create/{showtimes}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/create/', [BookingController::class, 'store'])->name('bookings.store');
});

Route::get('/admin/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/create', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/movies', [\App\Http\Controllers\AdminController::class, 'movies'])->name('admin.movies');
    Route::get('/movies/create', [\App\Http\Controllers\MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies/create', [\App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');
    Route::delete('/movies/{id}', [\App\Http\Controllers\MovieController::class, 'destroy'])->name('movies.destroy');
    Route::get('/movies/edit', [\App\Http\Controllers\MovieController::class, 'edit'])->name('movies.edit');
});

Route::prefix('/admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('auth.login-admin');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return 'Admin dashboard';
        })->name('admin.dashboard');
    });
});




