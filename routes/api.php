<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FlashCardController;
use App\Http\Controllers\Api\Auth\AuthController;

// Routes for Auth
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('flashcards', FlashCardController::class);
    Route::apiResource('tags', TagController::class)->only('index', 'destory', 'store');
});