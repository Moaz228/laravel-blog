<?php

use App\Http\Controllers\api\v1\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\PostApiController;

Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiController::class);

    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);

        Route::middleware('auth:api')->group(function () {
            Route::get('me', [AuthController::class, 'me']);
            Route::post('logout', [AuthController::class, 'logout']);
            Route::post('refresh', [AuthController::class, 'refresh']);
        });
    });
});
