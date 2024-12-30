<?php

use App\Http\Controllers\RentalImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('pay', 'App\Http\Controllers\ChapaController@initialize')->name('pay');

// The callback url after a payment
Route::get('callback/{reference}', 'App\Http\Controllers\ChapaController@callback')->name('callback');

// // Route::post('/api/rentals/media/upload', [RentalController::class, 'storeImage']);
// Route::get('/csrf-token', function () {
//     return response()->json(['csrf_token' => csrf_token()]);
// });
// Route::post('/api/rental_image', [RentalImageController::class, 'store']);
