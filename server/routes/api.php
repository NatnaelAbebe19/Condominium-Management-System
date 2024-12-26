<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\RentalImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/rentals', action: [RentalController::class, 'index'])->name('rentals.index'); // List all rentals
    Route::get('/rentals/{rental}', [RentalController::class, 'show'])->name('rentals.show'); // Show a single rental
    Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store'); // Create a new rental
    Route::put('/rentals/{rental}', [RentalController::class, 'update'])->name('rentals.update'); // Update a rental
    Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])->name('rentals.destroy'); // Delete a rental
});

Route::middleware('auth:sanctum')->group (function () {
    Route::post('/rental_image', [RentalImageController::class, 'store']);
    Route::delete('/rental_image/{rentalImage}', [RentalImageController::class, 'destroy']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
