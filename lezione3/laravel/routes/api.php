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
// Route::get('/roads/{id}', function ($id) {
//     $data = [
//         'id' => 1, 
//         'name' => 'Via Roma', 
//         'description' => 'Una strada nel centro di Roma'
//     ];
//     //$road = collect($data)->firstWhere('id', $id);
//     if ($data) {
//         return response()->json(['data' => $data], 200);
//     } else {
//         return response()->json(['error' => 'Strada non trovata'], 404);
//     }
// });
Route::get('/roads/{id}', function ($id) {
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