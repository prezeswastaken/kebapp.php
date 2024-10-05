<?php

use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\AuthOnly;
use Illuminate\Support\Facades\Route;

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);

Route::get('kebabs/paginated', [App\Http\Controllers\KebabController::class, 'paginated']);
Route::get('kebabs', [App\Http\Controllers\KebabController::class, 'index']);
Route::get('kebabs/{kebab}', [App\Http\Controllers\KebabController::class, 'show']);

Route::middleware([AuthOnly::class])->group(function () {
    Route::get('me', [App\Http\Controllers\AuthController::class, 'me']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
});

Route::middleware([AuthOnly::class, AdminOnly::class])->group(function () {
    Route::post('kebabs', [App\Http\Controllers\KebabController::class, 'store']);
    Route::delete('kebabs/{kebab}', [App\Http\Controllers\KebabController::class, 'destroy']);
    Route::post('kebabs/{kebab}/logo', [App\Http\Controllers\StoreLogoController::class, 'store']);

});
