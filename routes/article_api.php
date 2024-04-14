<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {

    Route::prefix('articles')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\articleApiController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\Api\articleApiController::class, 'store']);
        Route::get('/{article}' ,[\App\Http\Controllers\Api\articleApiController::class,'show']);
        Route::put('/{article:title}' ,[\App\Http\Controllers\Api\articleApiController::class,'update']);
        Route::delete('/{article}' ,[\App\Http\Controllers\Api\articleApiController::class,'update']);



    })->middleware(['auth']);
});

