<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Log;
use Closure;

class Authenticate extends Middleware
{
    // /**
    //  * Override di handle() per aggiungere logging
    //  */
    // public function handle($request, Closure $next, ...$guards)
    // {
    //     Log::debug('👉 Dentro Authenticate middleware');
    //     return parent::handle($request, $next, ...$guards);
    // }

    // /**
    //  * Get the path the user should be redirected to when they are not authenticated.
    //  */
    // protected function redirectTo($request): ?string
    // {
    //     Log::debug('dentro authenticate');
    //     // 🔹 se usi API con Sanctum, meglio restituire JSON e non redirect
    //     if (! $request->expectsJson()) {
    //         return null;
    //     }

    //     return null;
    // }
    // protected function unauthenticated($request, array $guards)
    // {
    //     abort(response()->json([
    //         'error' => 'Token mancante o non valido',
    //     ], 401));
    // }

}
