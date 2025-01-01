<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\RentalImageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CorsMiddleware;
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
    Route::get('/my-rents/{userId}', [RentalController::class, 'myRents'])->name('myRent');
    Route::post('/terminate-deal/{rental}', [RentalController::class, 'terminateDeal'])->name('terminateDeal');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware('auth:sanctum')->group (function () {
    Route::post('/rental_image', [RentalImageController::class, 'store']);
    Route::delete('/rental_image/{rentalImage}', [RentalImageController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount']);
    Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markNotificationAsRead']);
    Route::put('/notifications/{id}', [NotificationController::class, 'updateNotification']);
    Route::post('/notifications/mark-as-read', [NotificationController::class, 'markAsRead']);
    Route::post('/reservations', [ReservationController::class, 'store']);
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/pay', [ChapaController::class, 'initialize'])->name('pay');
    Route::get('/callback/{reference}', [ChapaController::class, 'callback'])->name('callback');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
