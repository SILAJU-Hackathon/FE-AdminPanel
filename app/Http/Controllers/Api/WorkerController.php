<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Added Log import

class WorkerController extends Controller
{
    /**
     * External API base URL
     */
    private string $apiBaseUrl = 'https://xryz-test-silaju.hf.space';

    /**
     * Get all workers from external API with Auth
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function getWorkersWithAuth(Request $request): JsonResponse
    {
        try {
            // Get token from session
            $token = Session::get('api_token');

            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized - Please login first',
                    'data' => []
                ], 401);
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => "Bearer {$token}",
            ])
                ->timeout(30)
                ->get("{$this->apiBaseUrl}/api/auth/admin/workers");

            if ($response->successful()) {
                $data = $response->json();
                return response()->json($data);
            }

            // Log error for debugging
            Log::error('Worker API Error: ' . $response->status() . ' - ' . $response->body());

            // If token expired
            if ($response->status() === 401 || $response->status() === 403) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Sesi kedaluwarsa. Silakan login ulang.',
                    'data' => []
                ], 401);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data pekerja dari server eksternal: (' . $response->status() . ')',
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

    /**
     * Assign worker to report via external API
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function assignWorker(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'report_id' => 'required|string',
            'worker_id' => 'required|string',
            'admin_notes' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        try {
            $token = Session::get('api_token');

            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized',
                ], 401);
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$token}",
            ])
                ->timeout(30)
                ->patch("{$this->apiBaseUrl}/api/admin/report/assign", [
                    'report_id' => $validated['report_id'],
                    'worker_id' => $validated['worker_id'],
                    'admin_notes' => $validated['admin_notes'] ?? '',
                    'deadline' => date(DATE_RFC3339, strtotime($validated['deadline'])),
                ]);

            if ($response->successful()) {
                // Update local database
                $report = \App\Models\Report::find($validated['report_id']);
                if ($report) {
                    $report->update([
                        'worker_id' => $validated['worker_id'],
                        'admin_notes' => $validated['admin_notes'] ?? null,
                        'deadline' => date('Y-m-d H:i:s', strtotime($validated['deadline'])),
                        'status' => 'assigned', // Update status to process as it is now assigned
                    ]);
                }

                return response()->json([
                    'status' => 'success',
                    'message' => 'Worker assigned successfully',
                    'data' => $response->json()
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to assign worker: ' . ($response->json()['message'] ?? $response->body()),
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Create new worker via external API
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function createWorker(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'username' => 'required|string',
            'fullname' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        try {
            $token = Session::get('api_token');

            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized - Please login first',
                ], 401);
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$token}",
            ])
                ->timeout(30)
                ->post("{$this->apiBaseUrl}/api/admin/worker", $validated);

            if ($response->successful()) {
                $data = $response->json();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Worker created successfully',
                    'data' => $data
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create worker: ' . ($response->json()['message'] ?? $response->body()),
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
