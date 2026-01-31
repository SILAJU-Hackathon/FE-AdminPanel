<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Auth\AdminAuthController;
use App\Http\Controllers\Api\ReportController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/api/auth/admin/login', [AdminAuthController::class, 'login']);
Route::post('/api/auth/admin/logout', [AdminAuthController::class, 'logout'])->name('logout');

// API Routes
Route::get('/api/get_report', [ReportController::class, 'getReports']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/laporan-masuk', function () {
    return view('laporan-masuk');
})->middleware('auth')->name('laporan-masuk');

Route::get('/peta-sebaran', function () {
    return view('peta-sebaran');
})->middleware('auth')->name('peta-sebaran');
