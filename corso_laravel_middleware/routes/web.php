<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('namespaces')->group(function () {
    Route::get('/ss_namespaces', function () {
        return Redirect::to('/namespaces/main.php');
    })->name('ss_namespaces');
});