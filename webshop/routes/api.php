<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/webshop', [ProductController::class, 'index']);
Route::get('/webshop/{id}', [ProductController::class, 'show']);
Route::post('/webshop', [ProductController::class, 'store']);
Route::put('/webshop/{id}', [ProductController::class, 'update']);
Route::delete('/webshop/{id}', [ProductController::class, 'destroy']);
