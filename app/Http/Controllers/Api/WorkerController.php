<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WorkerController extends Controller
{
    /**
     * External API base URL
     */
    private string $apiBaseUrl = 'https://xryz-test-silaju.hf.space';

    /**
     * Get all workers from external API (no auth required)
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function getWorkers(Request $request): JsonResponse
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])
                ->timeout(30)
                ->get("{$this->apiBaseUrl}/api/auth/admin/workers");

            if ($response->successful()) {
                $data = $response->json();
                return response()->json($data);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch workers from external API',
                'data' => []
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error connecting to external API: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
}
