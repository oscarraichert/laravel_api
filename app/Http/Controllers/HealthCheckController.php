<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class HealthCheckController extends Controller
{
    public function checkHealth(): JsonResponse
    {
        return response()->json([
            'status' => 'healthy',
            'at' => date('d M y h:i:sa')
        ])->header('Content-Type', 'application/json; charset=utf-8');
    }
}
