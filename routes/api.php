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

Route::post('/users/signup', [\App\Http\Controllers\Api\AuthController::class, 'signup']);
Route::post('/users/signin', [\App\Http\Controllers\Api\AuthController::class, 'signin']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/shopping', \App\Http\Controllers\Api\ShopController::class);
    Route::post('/users/signout', [\App\Http\Controllers\Api\AuthController::class, 'signout']);
    Route::get('/users', [\App\Http\Controllers\Api\AuthController::class, 'getAllUsers']);
    Route::get('/profile', function (Request $request) {
        return $request->user();
    });
});