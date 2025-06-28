<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\GenreMovieController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(\App\Http\Middleware\loginCustomer::class)->prefix('/customer')->group(function() {
    Route::get('/bookings/create/', [\App\Http\Controllers\BookingController::class, 'create'])->name('bookings.create');
    Route::get('/bookings/history', [\App\Http\Controllers\BookingController::class, 'history'])->name('bookings.history');
    Route::post('/logout', [\App\Http\Controllers\CustomerController::class, 'logout'])->name('customers.logout');
});

Route::get('/vnpay-return', [\App\Http\Controllers\VNPayController::class, 'vnpayReturn'])->name('vnpay.return');
Route::post('/vnpay-create', [\App\Http\Controllers\VNPayController::class, 'createPayment'])->name('vnpay.create');

//Route::post('/vnpay-create', [\App\Http\Controllers\PaymentController::class, 'createPayment'])->name('vnpay.create');
//Route::get('/vnpay-return', [\App\Http\Controllers\PaymentController::class, 'handleReturn'])->name('vnpay.return');

Route::prefix('/customer')->group(function() {
    Route::get('/login', [\App\Http\Controllers\CustomerController::class, 'login'])->name('customers.login');
    Route::post('/login_process', [\App\Http\Controllers\CustomerController::class, 'loginProcess'])->name('customers.loginProcess');
    Route::get('/index', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::get('/movies', [\App\Http\Controllers\MovieController::class, 'index'])->name('movies.index');
    Route::get('/movies/{id}', [\App\Http\Controllers\MovieController::class, 'details'])->name('movies.details');
});

Route::get('/admin/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/create', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');

Route::get('/customer/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
Route::post('/customer/create', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');

Route::middleware(\App\Http\Middleware\loginAdmin::class)->prefix('/admin')->group(function () {
    Route::get('/index', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/movies', [\App\Http\Controllers\AdminController::class, 'movies'])->name('admin.movies');
    Route::get('/movies/create', [\App\Http\Controllers\MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies/create', [\App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');
    Route::delete('/movies/{id}', [\App\Http\Controllers\MovieController::class, 'destroy'])->name('movies.destroy');
    Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::get('/genres', [\App\Http\Controllers\GenreMovieController::class, 'index'])->name('genres.index');
    Route::get('/genres/create', [\App\Http\Controllers\GenreMovieController::class, 'create'])->name('genres.create');
    Route::post('/genres/create', [\App\Http\Controllers\GenreMovieController::class, 'store'])->name('genres.store');
    Route::resource('genre-movies', GenreMovieController::class);
    Route::delete('/genres/{id}', [GenreMovieController::class, 'destroy'])->name('genres.destroy');
    Route::get('/genres/{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/genres/{id}', [GenreController::class, 'update'])->name('genres.update');
    Route::get('/snacks', [\App\Http\Controllers\SnackController::class, 'index'])->name('snacks.index');
    Route::delete('/bookings/{id}', [\App\Http\Controllers\BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/bookings', [\App\Http\Controllers\BookingController::class, 'index'])->name('admin.bookings');
    Route::get('/rooms', [\App\Http\Controllers\RoomController::class, 'index'])->name('admin.rooms');
    Route::get('/rooms/create', [\App\Http\Controllers\RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms/create', [\App\Http\Controllers\RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{id}/edit', [\App\Http\Controllers\RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{id}', [\App\Http\Controllers\RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{id}', [\App\Http\Controllers\RoomController::class, 'destroy'])->name('rooms.destroy');
    Route::get('/showtimes', [\App\Http\Controllers\ShowtimeController::class, 'index'])->name('admin.showtimes');
    Route::post('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
});

Route::prefix('/admin')->group(function() {
    Route::get('/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
    Route::post('/login_process', [\App\Http\Controllers\AdminController::class, 'loginProcess'])->name('admin.loginProcess');
});




