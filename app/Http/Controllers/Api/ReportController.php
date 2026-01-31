<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\JsonResponse;

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
}
