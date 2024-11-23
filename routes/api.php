<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Маршруты для регистрации, аутентификации и выхода
use \App\Http\Controllers\Api\AuthController;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

use \App\Http\Controllers\Api\CategoryController;
Route::middleware('auth:api')->apiResource('categories', CategoryController::class)->except(['index', 'show']);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
