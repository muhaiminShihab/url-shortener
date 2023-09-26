<?php

use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// home page
Route::get('/', [ShortUrlController::class, 'index'])->name('home_page');

// auth pages
Route::prefix('auth')->controller(UserController::class)->group(function () {
    Route::match(['get', 'post'], '/sign-in', 'sign_in')->name('sign_in_page');
    Route::match(['get', 'post'], '/sign-up', 'sign_up')->name('sign_up_page');
});

// create short url
Route::post('/create-short-url', [ShortUrlController::class, 'store'])->name('create_short_url');
