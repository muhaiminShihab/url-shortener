<?php

use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::match(['get', 'post'], '/sign-in', 'sign_in')->name('sign_in_page');
    Route::match(['get', 'post'], '/sign-up', 'sign_up')->name('sign_up_page');
    Route::get('/sign-out', 'sign_out')->name('sign_out');
});

// dashboard pages
Route::prefix('app')->middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard_page');

    // remove short url
    Route::get('/remove-short-url/{id}', [ShortUrlController::class, 'destroy'])->name('remove_url');

    // api page
    Route::get('/api-docs', [ShortUrlController::class, 'api_docs'])->name('api_docs_page');
});

// create short url
Route::post('/create-short-url', [ShortUrlController::class, 'store'])->name('create_short_url');

// access short url
Route::get('/{key}', [ShortUrlController::class, 'access'])->name('access_short_url');
