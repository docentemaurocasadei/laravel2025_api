<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product/{product_id?}', function(Request $request, int $product_id = 0) {
    return response()->view('message', ['messaggio' => 'Prodotto n. '. $product_id], 200);
})->name('product.show');

