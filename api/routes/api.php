<?php

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

Route::prefix('auth')->group(function () {
    Route::post('signup', [\App\Http\Controllers\Api\Auth\AuthController::class, 'signup']);
    Route::post('login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->prefix('opportunity')->group(function () {
    Route::post('store', [\App\Http\Controllers\Api\Opportunities\StoreController::class, 'store']);
    Route::post('reject', [\App\Http\Controllers\Api\Opportunities\RejectController::class, 'reject']);
    Route::post('approve', [\App\Http\Controllers\Api\Opportunities\ApproveController::class, 'approve']);
});
