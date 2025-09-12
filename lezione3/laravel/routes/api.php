<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/roads', function () {
    $data = [
        ['id' => 1, 'name' => 'Via Roma'],
        ['id' => 2, 'name' => 'Corso Italia'],
        ['id' => 3, 'name' => 'Piazza Duomo'],
    ];
    return response()
    ->json(['data' => $data], 200);
});