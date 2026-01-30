<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AsistenteFarmaciaController extends Controller
{
    public function responder(Request $request)
    {
        // ✅ Leer mensaje (JSON o normal)
        $mensaje = $request->json('message') ?? $request->input('message');

        if (!$mensaje) {
            return response()->json([
                'reply' => 'No recibí ningún mensaje.'
            ]);
        }

        // ✅ API KEY Gemini
        $apiKey = env('GEMINI_API_KEY');

        // ✅ MODELO ACTUAL DE GEMINI (IMPORTANTE)
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

        // ✅ DEBUG: si Gemini falla, ver error real
        if (!$response->successful()) {
            return response()->json([
                'reply' => 'Error Gemini: '.$response->body()
            ]);
        }

        $data = $response->json();

        // ✅ Extraer respuesta REAL de Gemini
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
