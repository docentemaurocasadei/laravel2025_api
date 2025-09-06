<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    protected string $apiKey;
    protected string $endpoint;
    protected string $model;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key');
        $this->model = 'gemini-1.5-flash-002'; // usa un modello effettivamente disponibile
        $this->endpoint = config('services.gemini.base_url') . "{$this->model}:generateContent";
    }

    public function generateText(string $prompt): ?string
    {
        $response = Http::post($this->endpoint . '?key=' . $this->apiKey, [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        logger()->info('Gemini API response status: ' . $response->status());
        logger()->info('Gemini API response body: ' . $response->body());

        if ($response->successful()) {
            return $response->json('candidates.0.content.parts.0.text');
        }

        logger()->error('Gemini API error: ' . $response->body());
        return null;
    }
    public function generateText2(string $prompt): ?string
    {
        $response = Http::withHeaders([
            'x-goog-api-key' => $this->apiKey,
            'Content-Type'   => 'application/json',
        ])->post($this->endpoint, [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        logger()->info('Gemini API response status: ' . $response->status());
        logger()->info('Gemini API response body: ' . $response->body());

        if ($response->successful()) {
            return $response->json('candidates.0.content.parts.0.text');
        }

        logger()->error('Gemini API error: ' . $response->body());
        return null;
    }

}
