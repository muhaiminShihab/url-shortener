<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ShortUrlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// auth routes
Route::post('/sign-in', [AuthController::class, 'sign_in']);
Route::post('/sign-out', [AuthController::class, 'sign_out']);

// auth routes
Route::middleware('auth:sanctum')->group(function () {
    // user details
    Route::get('/user', [AuthController::class, 'user']);

    // short url routes
    Route::prefix('url')->controller(ShortUrlController::class)->group(function () {
        Route::post('/create', 'store');
        Route::post('/delete', 'destroy');
        Route::get('/list', 'index');
    });
});
