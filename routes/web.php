<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\AdminAuthController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\WorkerController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/login', function () {
    // If already authenticated, redirect to dashboard
    if (session()->has('is_authenticated') && session()->get('is_authenticated')) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('login');

Route::post('/api/auth/admin/login', [AdminAuthController::class, 'login']);
Route::post('/api/auth/admin/logout', [AdminAuthController::class, 'logout'])->name('logout');

// Public API Routes (if any needed public)
// ...

// Protected Routes
Route::middleware(['auth.admin'])->group(function () {
    // API Routes that require auth
    Route::get('/api/get_report', [ReportController::class, 'getReports']);
    Route::get('/api/admin/report', [ReportController::class, 'getAdminReports']); // This implementation didn't assume token, but we might likely pass it if needed.
    Route::get('/api/admin/dashboard-stats', [ReportController::class, 'getDashboardStats']);
    Route::get('/api/auth/admin/workers', [WorkerController::class, 'getWorkersWithAuth']);
    Route::post('/api/admin/worker', [WorkerController::class, 'createWorker']);
    Route::patch('/api/admin/report/assign', [WorkerController::class, 'assignWorker']);
    Route::patch('/api/admin/report/verify', [ReportController::class, 'verifyReport']);
    Route::get('/api/admin/reports/assignable', [ReportController::class, 'getAssignableReports']);

    // Pages
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/laporan-masuk', function () {
        return view('laporan-masuk');
    })->name('laporan-masuk');

    Route::get('/peta-sebaran', function () {
        return view('peta-sebaran');
    })->name('peta-sebaran');

    Route::get('/petugas-lapangan', function () {
        return view('petugas-lapangan');
    })->name('petugas-lapangan');
});
