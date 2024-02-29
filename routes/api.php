<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register' , [\App\Http\Controllers\RegLogController::class , 'reg']);
Route::post('/login' , [\App\Http\Controllers\RegLogController::class , 'login']);
Route::get('/airport' , [\App\Http\Controllers\AirportController::class , 'searchAirport']);
Route::post('/booking' , [\App\Http\Controllers\BookingController::class , 'Booking']);
Route::get('/user' , [\App\Http\Controllers\User::class , 'searchUser']);
