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
    Route::post('/bookings/create/', [\App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');
    Route::get('/logout', [\App\Http\Controllers\CustomerController::class, 'logout'])->name('customers.logout');
});

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
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
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
    Route::post('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
});

Route::prefix('/admin')->group(function() {
    Route::get('/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
    Route::post('/login_process', [\App\Http\Controllers\AdminController::class, 'loginProcess'])->name('admin.loginProcess');
});




