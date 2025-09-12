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

Route::get('/roads/{id}', function (int $id) {
    $data = [
        ['id' => 1, 'name' => 'Via Roma', 'description' => 'Una strada nel centro di Roma'],
        ['id' => 2, 'name' => 'Corso Italia', 'description' => 'Una strada nel centro di Milano'],
        ['id' => 3, 'name' => 'Piazza Duomo', 'description' => 'Una piazza nel centro di Firenze'],
    ];
    $road = collect($data)->firstWhere('id', $id);
    if ($road) {
        return response()->json(['data' => $road], 200);
    } else {
        return response()->json(['error' => 'Strada non trovata'], 404);
    }
});
Route::post('/roads', function (Request $request) {
    //dovrei inserire la road nel database
    //per ora simulo il salvataggio e ritorno un id fittizio
    return response()->json(['data' => ['id' => rand(4, 1000)]], 201);
});
Route::put('/roads/{id}', function (Request $request, int $id) {
    //dovrei aggiornare la road nel database
    //per ora simulo l'aggiornamento e ritorno un messaggio di successo
    //1. controllare se la strada esiste
    //2. validare i dati in arrivo
    //3. aggiornare la strada
    //4. ritornare un messaggio 
    return response()->json(['data' => ['message' => 'Strada aggiornata con successo']], 200);
});
Route::delete('/roads/{id}', function (int $id) {
    //dovrei cancellare la road nel database
    //per ora simulo la cancellazione e ritorno un messaggio di successo
    //1. controllare se la strada esiste
    //2. controllare se ho i diritti sulla strada
    //3. cancellare la strada
    //4. ritornare un messaggio
    return response()->json(['data' => ['message' => 'Strada cancellata con successo']], 200);
});