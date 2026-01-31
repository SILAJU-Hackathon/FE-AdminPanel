<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SILAJU</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Mapbox GL JS -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.18.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.18.0/mapbox-gl.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: #64748b;
            transition: all 0.2s;
        }

        .sidebar-link:hover {
            background-color: #f1f5f9;
            color: #334155;
        }

        .sidebar-link.active {
            background-color: #eff6ff;
            color: #2563eb;
            font-weight: 600;
        }

        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.25rem;
            border: 1px solid #e2e8f0;
        }

        .chart-area {
            background: linear-gradient(180deg, rgba(59, 130, 246, 0.1) 0%, rgba(59, 130, 246, 0) 100%);
        }
    </style>
</head>

<body class="h-full bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <!-- Logo -->
            <div class="p-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-blue-600 flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M3 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm14.25 6a.75.75 0 0 1-.22.53l-2.25 2.25a.75.75 0 1 1-1.06-1.06L15.44 12l-1.72-1.72a.75.75 0 1 1 1.06-1.06l2.25 2.25c.141.14.22.331.22.53Zm-10.28-.53a.75.75 0 0 0 0 1.06l2.25 2.25a.75.75 0 1 0 1.06-1.06L8.56 12l1.72-1.72a.75.75 0 1 0-1.06-1.06l-2.25 2.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-gray-900">SILAJU</span>
                        <p class="text-xs text-gray-500">ADMIN DASHBOARD</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-1">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Menu Utama</p>

                <a href="#" class="sidebar-link active">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Beranda
                </a>

                <a href="/laporan-masuk" class="sidebar-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Laporan Masuk
                </a>

                <a href="#" class="sidebar-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    Peta Sebaran
                </a>

                <a href="#" class="sidebar-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Petugas Lapangan
                </a>

                <a href="#" class="sidebar-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    Penugasan
                </a>

                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-3">Lainnya</p>

                <a href="#" class="sidebar-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Pengaturan
                </a>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-gray-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="sidebar-link w-full text-red-500 hover:bg-red-50 hover:text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <!-- Date -->
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm font-medium">{{ now()->translatedFormat('l, d F Y') }}</span>
                    </div>

                    <!-- Search -->
                    <div class="flex-1 max-w-md mx-8">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" placeholder="Cari ID laporan, lokasi, petugas..."
                                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <!-- User Info -->
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-2 text-amber-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-900">Admin PUPR</p>
                            <p class="text-xs text-gray-500">Kepala Bagian</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-semibold">
                            A
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Page Title -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
                        <p class="text-sm text-gray-500 mt-1">Ringkasan aktivitas dan laporan terkini sistem SILAJU.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export Data
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 rounded-lg text-sm font-medium text-white hover:bg-blue-700 transition-colors shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Buat Laporan
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- Total Laporan Masuk -->
                    <div class="stat-card">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-gray-500 font-medium">Total Laporan Masuk</p>
                                <p class="text-3xl font-bold text-gray-900 mt-1">124</p>
                                <div class="flex items-center gap-1 mt-2">
                                    <span class="text-green-500 text-sm font-medium flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        +12%
                                    </span>
                                    <span class="text-gray-400 text-sm">dari bulan lalu</span>
                                </div>
                            </div>
                            <div class="p-3 bg-blue-50 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Sedang Dikerjakan -->
                    <div class="stat-card">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-gray-500 font-medium">Sedang Dikerjakan</p>
                                <p class="text-3xl font-bold text-gray-900 mt-1">45</p>
                                <div class="flex items-center gap-2 mt-2">
                                    <span
                                        class="px-2 py-0.5 bg-blue-100 text-blue-700 text-xs font-medium rounded">Active</span>
                                    <span class="text-gray-400 text-sm">Proyek berjalan</span>
                                </div>
                            </div>
                            <div class="p-3 bg-amber-50 rounded-lg">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Selesai Bulan Ini -->
                    <div class="stat-card">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-gray-500 font-medium">Selesai Bulan Ini</p>
                                <p class="text-3xl font-bold text-gray-900 mt-1">82</p>
                                <div class="flex items-center gap-2 mt-2">
                                    <span
                                        class="px-2 py-0.5 bg-green-100 text-green-700 text-xs font-medium rounded flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Target OK
                                    </span>
                                    <span class="text-gray-400 text-sm">Kinerja baik</span>
                                </div>
                            </div>
                            <div class="p-3 bg-green-50 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart and Map Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Chart -->
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Tren Laporan Masuk</h3>
                                <p class="text-sm text-gray-500">Statistik perbandingan laporan 7 hari terakhir</p>
                            </div>
                            <select
                                class="px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>7 Hari Terakhir</option>
                                <option>30 Hari Terakhir</option>
                                <option>Bulan Ini</option>
                            </select>
                        </div>
                        <!-- Chart Placeholder -->
                        <div class="h-64 relative">
                            <svg viewBox="0 0 700 250" class="w-full h-full">
                                <!-- Grid lines -->
                                <line x1="50" y1="200" x2="650" y2="200" stroke="#e5e7eb" stroke-width="1" />
                                <line x1="50" y1="150" x2="650" y2="150" stroke="#e5e7eb" stroke-width="1"
                                    stroke-dasharray="4" />
                                <line x1="50" y1="100" x2="650" y2="100" stroke="#e5e7eb" stroke-width="1"
                                    stroke-dasharray="4" />
                                <line x1="50" y1="50" x2="650" y2="50" stroke="#e5e7eb" stroke-width="1"
                                    stroke-dasharray="4" />

                                <!-- Area fill -->
                                <path d="M50,180 L150,160 L250,120 L350,140 L450,80 L550,100 L650,90 L650,200 L50,200 Z"
                                    fill="url(#gradient)" />

                                <!-- Line -->
                                <path d="M50,180 L150,160 L250,120 L350,140 L450,80 L550,100 L650,90" fill="none"
                                    stroke="#3b82f6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />

                                <!-- Points -->
                                <circle cx="50" cy="180" r="6" fill="white" stroke="#3b82f6" stroke-width="3" />
                                <circle cx="150" cy="160" r="6" fill="white" stroke="#3b82f6" stroke-width="3" />
                                <circle cx="250" cy="120" r="6" fill="white" stroke="#3b82f6" stroke-width="3" />
                                <circle cx="350" cy="140" r="6" fill="white" stroke="#3b82f6" stroke-width="3" />
                                <circle cx="450" cy="80" r="6" fill="white" stroke="#3b82f6" stroke-width="3" />
                                <circle cx="550" cy="100" r="6" fill="white" stroke="#3b82f6" stroke-width="3" />
                                <circle cx="650" cy="90" r="6" fill="white" stroke="#3b82f6" stroke-width="3" />

                                <!-- X-axis labels -->
                                <text x="50" y="225" text-anchor="middle" class="text-xs fill-gray-500">Sen</text>
                                <text x="150" y="225" text-anchor="middle" class="text-xs fill-gray-500">Sel</text>
                                <text x="250" y="225" text-anchor="middle" class="text-xs fill-gray-500">Rab</text>
                                <text x="350" y="225" text-anchor="middle" class="text-xs fill-gray-500">Kam</text>
                                <text x="450" y="225" text-anchor="middle" class="text-xs fill-gray-500">Jum</text>
                                <text x="550" y="225" text-anchor="middle" class="text-xs fill-gray-500">Sab</text>
                                <text x="650" y="225" text-anchor="middle" class="text-xs fill-gray-500">Min</text>

                                <!-- Gradient definition -->
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:0.3" />
                                        <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="bg-white rounded-2xl border border-gray-200 p-4 flex flex-col">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Peta Sebaran</h3>
                            <span class="flex items-center gap-1.5 text-xs text-green-600 font-medium">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                Live Update
                            </span>
                        </div>
                        <div id="map" class="flex-1 rounded-xl overflow-hidden min-h-[200px] relative z-0"></div>
                        <a href="/peta-sebaran"
                            class="mt-4 w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            Buka Peta Lengkap
                        </a>
                    </div>
                </div>

                <!-- Recent Reports Table -->
                <div class="bg-white rounded-2xl border border-gray-200">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Laporan Terbaru</h3>
                                <p class="text-sm text-gray-500">Daftar laporan kerusakan yang baru masuk ke sistem.</p>
                            </div>
                            <a href="#" class="text-sm text-blue-600 font-medium hover:text-blue-700">
                                Lihat Semua →
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        ID Laporan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Lokasi Kejadian</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Status Pengerjaan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Tingkat Kerusakan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Tanggal Masuk</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="text-sm font-semibold text-blue-600">#RP-024</p>
                                            <p class="text-xs text-gray-500">Road Pothole</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">Jl. Jendral Sudirman No. 45</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full">
                                            <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                            Menunggu
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-16 h-2 bg-red-500 rounded-full"></div>
                                            <span class="text-xs font-semibold text-red-600">TINGGI</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">24 Okt 2023</td>
                                    <td class="px-6 py-4">
                                        <button class="p-2 text-gray-400 hover:text-gray-600 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="text-sm font-semibold text-blue-600">#RP-023</p>
                                            <p class="text-xs text-gray-500">Crack Damage</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">Jl. Gatot Subroto No. 12</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">
                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                            Dikerjakan
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-12 h-2 bg-amber-500 rounded-full"></div>
                                            <span class="text-xs font-semibold text-amber-600">SEDANG</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">23 Okt 2023</td>
                                    <td class="px-6 py-4">
                                        <button class="p-2 text-gray-400 hover:text-gray-600 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="text-sm font-semibold text-blue-600">#RP-022</p>
                                            <p class="text-xs text-gray-500">Surface Wear</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">Jl. Pemuda No. 88</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">
                                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                            Selesai
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-2 bg-green-500 rounded-full"></div>
                                            <span class="text-xs font-semibold text-green-600">RENDAH</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">22 Okt 2023</td>
                                    <td class="px-6 py-4">
                                        <button class="p-2 text-gray-400 hover:text-gray-600 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Initialize Mapbox Map
        mapboxgl.accessToken = 'pk.eyJ1IjoiYW5la2F6ZWsiLCJhIjoiY21sMHpwdGM3MDJldDNlb25uNmc0d29lYSJ9.NzGpc6gXmZpWTGsTUVX0xA';

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/standard',
            center: [110.4203, -6.9666], // Semarang coordinates
            zoom: 12,
            minZoom: 10,
            maxZoom: 18,
            maxBounds: [
                [110.25, -7.15], // Southwest
                [110.55, -6.85]  // Northeast
            ]
        });
    </script>
</body>

</html>