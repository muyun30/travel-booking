<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebAuthController;
use App\Http\Controllers\Web\WebFlightController;
use App\Http\Controllers\Web\WebHotelController;
use App\Http\Controllers\Web\WebBookingController;

// Accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth
Route::get('/login',     [WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login',    [WebAuthController::class, 'login']);
Route::get('/register',  [WebAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [WebAuthController::class, 'register']);
Route::post('/logout',   [WebAuthController::class, 'logout'])->name('logout');
Route::get('/profile',           [App\Http\Controllers\Web\ProfileController::class, 'show'])->name('profile');
Route::put('/profile',           [App\Http\Controllers\Web\ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/password',  [App\Http\Controllers\Web\ProfileController::class, 'updatePassword'])->name('profile.password');
Route::post('/reviews', [App\Http\Controllers\Web\ReviewController::class, 'store'])->name('reviews.store');

// Pages publiques
Route::get('/flights', [WebFlightController::class, 'index'])->name('flights.index');
Route::get('/hotels',  [WebHotelController::class,  'index'])->name('hotels.index');

// Pages protégées
Route::middleware('auth')->group(function () {
    Route::get('/bookings',                   [WebBookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings',                  [WebBookingController::class, 'store'])->name('bookings.store');
    Route::post('/bookings/{booking}/cancel', [WebBookingController::class, 'cancel'])->name('bookings.cancel');
});
// Routes Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])
         ->name('dashboard');

    Route::resource('flights', App\Http\Controllers\Admin\AdminFlightController::class);
    Route::resource('hotels',  App\Http\Controllers\Admin\AdminHotelController::class);

    Route::get('/users',           [App\Http\Controllers\Admin\AdminUserController::class, 'index'])
         ->name('users.index');
    Route::delete('/users/{user}', [App\Http\Controllers\Admin\AdminUserController::class, 'destroy'])
         ->name('users.destroy');
});