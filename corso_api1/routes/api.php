<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return response()->json('Hello, World!', 200);
});

Route::redirect('/old', '/api/new', 301);
Route::get('/new', function () {
    return response()->json('Hello, New!', 200);
});
Route::get('/product/{product_id}', function (Request $request, int $product_id) {
    return response()->json("Prodotto n. {$product_id}", 200);
});

Route::post('/login',function(Request $request){
    $validated = $request->validate(
        [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]
    );
    // Login logic here
    $user = User::query()->where('email', $validated['email'])->first();
    if (! $user || Hash::check($validated['password'], $user->password) === false) {
        return response()->json(['message' => 'Credenziali non valide'], 401);
    }
    return response()->json(['token' => $user->createToken('api-token')->plainTextToken], 200);
});

//possono creare / aggiornare / cancellare POST solo utenti autorizzati 
//possono vedere posts tutti gli utenti
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function(Request $request) {
        return $request->user();
    }); 
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    
});

//oppure più semplice
//Route::apiResource('posts', PostController::class)->only(['index', 'show']);
/*
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::apiResource('posts', PostController::class)->except(['index', 'show']);
    });
 */