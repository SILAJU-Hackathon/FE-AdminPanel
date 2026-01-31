<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request; // Added import
use Illuminate\Support\Facades\Http; // Added import
use Illuminate\Support\Facades\Session; // Added import

class ReportController extends Controller
{
    /**
     * Get all completed reports with non-good destruct class
     * 
     * @return JsonResponse
     */
    public function getReports(): JsonResponse
    {
        $reports = Report::active()
            ->withDamage()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->select([
                'id',
                'latitude',
                'longitude',
                'road_name',
                'destruct_class',
                'total_score',
                'status',
                'description',
                'before_image_url',
                'created_at'
            ])
            ->get()
            ->map(function ($report) {
                return [
                    'id' => $report->id,
                    'latitude' => (float) $report->latitude,
                    'longitude' => (float) $report->longitude,
                    'road_name' => $report->road_name,
                    'destruct_class' => $report->destruct_class,
                    'total_score' => (float) $report->total_score,
                    'status' => $report->status,
                    'description' => $report->description,
                    'before_image_url' => $report->before_image_url,
                    'created_at' => $report->created_at?->format('Y-m-d H:i:s'),
                ];
            });

        return response()->json($reports);
    }
    /**
     * Get all reports for admin with pagination and filtering
     * 
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function getAdminReports(\Illuminate\Http\Request $request): JsonResponse
    {
        $limit = $request->input('limit', 10);
        $status = $request->input('status');
        $search = $request->input('search');

        // Use direct query for speed and specificity
        $query = \Illuminate\Support\Facades\DB::table('reports');

        if ($status) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('road_name', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%");
            });
        }

        $query->orderBy('created_at', 'desc');

        // Select all columns needed for the admin report table
        $query->select([
            'id',
            'road_name',
            'status',
            'destruct_class',
            'total_score',
            'location_score',
            'latitude',
            'longitude',
            'description',
            'before_image_url',
            'after_image_url',
            'deadline',
            'admin_notes',
            'created_at'
        ]);

        $paginator = $query->paginate($limit);

        return response()->json([
            'limit' => (int) $paginator->perPage(),
            'page' => (int) $paginator->currentPage(),
            'reports' => $paginator->items(),
            'total_count' => $paginator->total(),
            'total_pages' => $paginator->lastPage(),
        ]);
    }

    /**
     * Get dashboard statistics
     * 
     * @return JsonResponse
     */
    public function getDashboardStats(): JsonResponse
    {
        $db = \Illuminate\Support\Facades\DB::class;

        // Total all reports
        $totalReports = $db::table('reports')->count();

        // Reports being worked on (assigned, finish by worker status)
        $inProgressStatuses = ['assigned', 'finish by worker'];
        $inProgress = $db::table('reports')
            ->whereIn('status', $inProgressStatuses)
            ->count();

        // Completed reports this month
        $completedStatuses = ['complete', 'verified'];
        $completedThisMonth = $db::table('reports')
            ->whereIn('status', $completedStatuses)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Last month total for comparison
        $lastMonthTotal = $db::table('reports')
            ->whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();

        // This month total for comparison
        $thisMonthTotal = $db::table('reports')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Calculate percentage change
        $percentageChange = 0;
        if ($lastMonthTotal > 0) {
            $percentageChange = round((($thisMonthTotal - $lastMonthTotal) / $lastMonthTotal) * 100, 1);
        }

        // Trend data for last 7 days
        $trendData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $count = $db::table('reports')
                ->whereDate('created_at', $date->toDateString())
                ->count();

            $trendData[] = [
                'date' => $date->toDateString(),
                'day_name' => $date->translatedFormat('D'),
                'day_full' => $date->translatedFormat('l'),
                'count' => $count,
            ];
        }

        // Status distribution
        $statusDistribution = $db::table('reports')
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->status ?? 'unknown' => $item->count];
            });

        return response()->json([
            'total_reports' => $totalReports,
            'in_progress' => $inProgress,
            'completed_this_month' => $completedThisMonth,
            'percentage_change' => $percentageChange,
            'trend_data' => $trendData,
            'status_distribution' => $statusDistribution,
        ]);
    }
    /**
     * Get reports available for assignment (only complete status)
     * 
     * @return JsonResponse
     */
    public function getAssignableReports(): JsonResponse
    {
        // Only fetch reports with 'complete' status that need workers
        $reports = \Illuminate\Support\Facades\DB::table('reports')
            ->whereNull('deleted_at')
            ->where('status', 'complete')
            ->orderBy('created_at', 'desc')
            ->select(['id', 'road_name', 'status', 'description', 'created_at'])
            ->limit(50) // Limit for dropdown
            ->get();

        return response()->json($reports);
    }

    /**
     * Verify report status from 'finish by worker' to 'finished' via external API
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function verifyReport(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'report_id' => 'required|string',
        ]);

        try {
            $token = Session::get('api_token');

            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized - Please login first',
                ], 401);
            }

            // External API URL
            $apiBaseUrl = 'https://xryz-test-silaju.hf.space';

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$token}",
            ])
                ->timeout(30)
                ->patch("{$apiBaseUrl}/api/admin/report/verify", [
                    'report_id' => $validated['report_id'],
                ]);

            if ($response->successful()) {
                // Update local database
                $report = Report::find($validated['report_id']);
                if ($report) {
                    $report->update([
                        'status' => 'terverifikasi admin',
                    ]);
                }

                return response()->json([
                    'status' => 'success',
                    'message' => 'Report verified successfully',
                    'data' => $response->json()
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to verify report: ' . ($response->json()['message'] ?? $response->body()),
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
