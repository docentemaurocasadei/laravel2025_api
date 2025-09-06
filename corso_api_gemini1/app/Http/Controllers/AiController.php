<?php

namespace App\Http\Controllers;

use App\Services\GeminiService;
use Illuminate\Http\Request;

class AIController extends Controller
{
    public function generate(Request $request)
    {
        $gemini = new GeminiService();
        $prompt = $request->input('prompt', "Spiegami Laravel 12 in modo semplice.");
        logger()->info("Prompt ricevuto: " . $prompt);
        $output = $gemini->generateText2($prompt);

        return response()->json(['output' => $output]);
    }
}
