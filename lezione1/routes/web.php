<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documentazione', function () {
    // return response()->json('Documentazione in costruzione' );
    return view('documentazione');
});