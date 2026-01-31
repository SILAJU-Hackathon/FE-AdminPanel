<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Auth\AdminAuthController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/api/auth/admin/login', [AdminAuthController::class, 'login']);
Route::post('/api/auth/admin/logout', [AdminAuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/laporan-masuk', function () {
    return view('laporan-masuk');
})->middleware('auth')->name('laporan-masuk');
