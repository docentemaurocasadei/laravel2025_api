<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function generateToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]); 
        $user = \App\Models\User::where('email', $request->email)->first();
        $token = $user->createToken('corso_crud1')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
}
