<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('test', function(){
    return response()->json(['message' => 'Test route']);
});
Route::post('/generate', [AIController::class, 'generate']);