<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\PostApiController;

Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiController::class);
});
