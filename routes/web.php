<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GenreMovieController;
use App\Http\Controllers\MovieController;
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
    Route::get('/bookings/create/', [BookingController::class, 'create'])->name('bookings.create');
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
    Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::get('/genres', [\App\Http\Controllers\GenreMovieController::class, 'index'])->name('genres.index');
    Route::get('/genres/create', [\App\Http\Controllers\GenreMovieController::class, 'create'])->name('genres.create');
    Route::post('/genres/create', [\App\Http\Controllers\GenreMovieController::class, 'store'])->name('genres.store');
    Route::resource('genre-movies', GenreMovieController::class);
    Route::delete('/genres/{id}', [GenreMovieController::class, 'destroy'])->name('genres.destroy');
    Route::get('/genres/{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/genres/{id}', [GenreController::class, 'update'])->name('genres.update');
});

Route::prefix('/admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('auth.login-admin');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');


    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return 'Admin dashboard';
        })->name('admin.dashboard');
    });
});




