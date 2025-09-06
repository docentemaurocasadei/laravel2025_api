<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/message/{id?}', function (?int $id = null) {
    // return view('message')->with('message', 'Ciao a tutti!');
    //oppure
    return response()->view('message', ['message' => "Ciao a tutti {$id}!"]);
})->where('id', '[0-9]+')->name('front.message');


