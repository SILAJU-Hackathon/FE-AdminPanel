<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\AdminAuthController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\WorkerController;

// Redirect root to dashboard (skip login)
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/api/auth/admin/login', [AdminAuthController::class, 'login']);
Route::post('/api/auth/admin/logout', [AdminAuthController::class, 'logout'])->name('logout');

// API Routes
Route::get('/api/get_report', [ReportController::class, 'getReports']);
Route::get('/api/admin/report', [ReportController::class, 'getAdminReports']);
Route::get('/api/admin/dashboard-stats', [ReportController::class, 'getDashboardStats']);
Route::get('/api/admin/workers', [WorkerController::class, 'getWorkers']);

// Pages without auth middleware
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
