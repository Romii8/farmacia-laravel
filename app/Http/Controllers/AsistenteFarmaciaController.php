<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AsistenteFarmaciaController extends Controller
{
    public function responder(Request $request)
    {
        $mensaje = $request->json('message') ?? $request->input('message');

        if (!$mensaje) {
            return response()->json([
                'reply' => 'No recibí ningún mensaje.'
            ]);
        }

        $apiKey = env('GEMINI_API_KEY');

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=".$apiKey;



        $response = Http::post($url, [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => $mensaje
                        ]
                    ]
                ]
            ]
        ]);

        if (!$response->successful()) {
            return response()->json([
                'reply' => 'Error Gemini: '.$response->body()
            ]);
        }

        $data = $response->json();


        $respuestaIA = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

        if (!$respuestaIA) {
            return response()->json([
                'reply' => 'Gemini respondió pero sin texto.'
            ]);
        }

        return response()->json([
            'reply' => $respuestaIA
        ]);
    }
}
