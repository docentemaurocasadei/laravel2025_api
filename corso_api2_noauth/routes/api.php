<?php

use App\Http\Controllers\SsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/primotest', function () {
    return response()->json(['message' => 'Hello from primotest']);
});
Route::get('/miaredirect', function () {
    logger()->info('Redirecting to Google');
    return response()->redirectTo('https://google.it');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/privata', function () {
        return view('message')->with('message', 'Area privata, solo per utenti autenticati!');
    })->name('front.privata');
});

// Route::post('/login', [SsController::class, 'login'])->name('api.login');