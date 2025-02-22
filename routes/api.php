<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FetchGlovoRatesController;
use App\Http\Controllers\FetchGoogleRatesController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\AuthOnly;
use Illuminate\Support\Facades\Route;

Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);

Route::get('kebabs/paginated', [App\Http\Controllers\KebabController::class, 'paginated']);
Route::get('kebabs', [App\Http\Controllers\KebabController::class, 'index']);
Route::get('kebabs/{kebab}', [App\Http\Controllers\KebabController::class, 'show']);

Route::apiResource('meat-types', App\Http\Controllers\MeatTypeController::class)->only('index', 'show');
Route::apiResource('sauces', App\Http\Controllers\SauceController::class)->only('index', 'show');

Route::middleware([AuthOnly::class])->group(function () {
    Route::get('me', [App\Http\Controllers\AuthController::class, 'me']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);

    Route::post('admin-messages', [App\Http\Controllers\AdminMessageController::class, 'store']);

    Route::post('like/kebab/{kebab}', LikeController::class);

    Route::post('comment/kebab/{kebab}', [CommentController::class, 'store']);
    Route::delete('comment/{comment}', [CommentController::class, 'destroy']);

    Route::post('password-update', UpdatePasswordController::class);
});

Route::middleware([AuthOnly::class, AdminOnly::class])->group(function () {
    Route::post('kebabs', [App\Http\Controllers\KebabController::class, 'store']);
    Route::delete('kebabs/{kebab}', [App\Http\Controllers\KebabController::class, 'destroy']);
    Route::post('kebabs/{kebab}/logo', [App\Http\Controllers\StoreLogoController::class, 'store']);
    Route::put('kebabs/{kebab}', [App\Http\Controllers\KebabController::class, 'update']);

    Route::apiResource('meat-types', App\Http\Controllers\MeatTypeController::class)->except('index', 'show');
    Route::apiResource('sauces', App\Http\Controllers\SauceController::class)->except('index', 'show');

    Route::get('admin-logs', [App\Http\Controllers\AdminLogController::class, 'index']);
    Route::post('admin-messages/{message}/accept', [App\Http\Controllers\AdminMessageController::class, 'accept']);
    Route::get('admin-messages', [App\Http\Controllers\AdminMessageController::class, 'index']);
    Route::delete('admin-messages/{message}', [App\Http\Controllers\AdminMessageController::class, 'delete']);

    Route::post('rates-glovo', FetchGlovoRatesController::class);
    Route::post('rates-google', FetchGoogleRatesController::class);

});
