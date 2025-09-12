<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TokenController;
use Doctrine\Common\Lexer\Token;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('token', [TokenController::class, 'generateToken']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategoryController::class);
});
