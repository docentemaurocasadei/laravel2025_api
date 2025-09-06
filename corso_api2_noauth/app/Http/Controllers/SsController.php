<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SsController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Simulazione di autenticazione
        if ($validated['email'] === 'test@example.com' && $validated['password'] === 'password') {
            return response()->json(['message' => 'Login successful']);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
