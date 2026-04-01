<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ReviewController;

// Auth publique
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// Consultation publique
Route::get('/flights',       [FlightController::class, 'index']);
Route::get('/flights/{flight}', [FlightController::class, 'show']);
Route::get('/hotels',        [HotelController::class, 'index']);
Route::get('/hotels/{hotel}',   [HotelController::class, 'show']);
Route::get('/reviews',       [ReviewController::class, 'index']);

// Routes protégées (token requis)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('flights',  FlightController::class)->except(['index','show']);
    Route::apiResource('hotels',   HotelController::class)->except(['index','show']);
    Route::apiResource('bookings', BookingController::class)->except(['update']);
    Route::post('/reviews', [ReviewController::class, 'store']);
});
