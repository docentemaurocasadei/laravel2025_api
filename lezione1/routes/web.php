<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documentazione', function () {
    // return response()->json('Documentazione in costruzione' );
    return view('messaggio' , ['titolo' => 'Documentazione', 'testo' => 'Documentazione in costruzione']);
});
Route::get('/aiuto', function () {
    // return response()->json('Documentazione in costruzione' );
    return view('messaggio' , ['titolo' => 'Aiuto', 'testo' => 'Se hai bisogno di aiuto, contatta il supporto.<script>alert("Aiuto richiesto")</script>']);
})->name('aiuto');