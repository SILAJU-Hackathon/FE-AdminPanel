<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peta Sebaran - SILAJU</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Mapbox GL JS -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js"></script>

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

        /* Filter Panel Styles */
        .filter-section {
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }

        .filter-section:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        /* Checkbox customization */
        .custom-checkbox:checked {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }
    </style>
</head>

<body class="h-full bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col z-20">
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

                <a href="/dashboard" class="sidebar-link">
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

                <a href="#" class="sidebar-link active">
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
        <div class="flex-1 flex flex-col h-screen relative">
            <!-- Header (Floating over map or Fixed top) -->
            <!-- In this design, let's keep it fixed at top like dashboard for consistency -->
            <header class="bg-white border-b border-gray-200 px-6 py-4 z-10">
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

            <!-- Map Container -->
            <div class="flex-1 relative">
                <div id="map" class="absolute inset-0 w-full h-full bg-gray-100"></div>

                <!-- Floating Filter Panel -->
                <div id="filter-panel"
                    style="position: fixed !important; top: 80px !important; right: 24px !important; z-index: 9999 !important; width: 320px;"
                    class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden max-h-[calc(100vh-100px)] flex flex-col">
                    <div class="p-4 border-b border-gray-100 flex items-center justify-between bg-white">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <h3 class="font-bold text-gray-900">Filter Laporan</h3>
                        </div>
                        <button class="text-xs text-gray-400 hover:text-gray-600">Reset Filter</button>
                    </div>

                    <div class="p-4 overflow-y-auto custom-scrollbar">
                        <!-- Status Laporan -->
                        <div class="filter-section">
                            <h4 class="text-xs font-bold text-gray-500 mb-3">Status Laporan</h4>
                            <div class="space-y-2">
                                <label
                                    class="flex items-center justify-between p-3 border border-red-100 bg-red-50 rounded-lg cursor-pointer hover:bg-red-100 transition">
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox" checked
                                            class="w-4 h-4 text-red-500 border-red-300 rounded focus:ring-red-500">
                                        <span class="text-sm font-medium text-red-700">Baru</span>
                                    </div>
                                    <span
                                        class="bg-white text-red-600 text-xs font-bold px-2 py-0.5 rounded-full">12</span>
                                </label>

                                <label
                                    class="flex items-center justify-between p-3 border border-amber-100 bg-amber-50 rounded-lg cursor-pointer hover:bg-amber-100 transition">
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox" checked
                                            class="w-4 h-4 text-amber-500 border-amber-300 rounded focus:ring-amber-500">
                                        <span class="text-sm font-medium text-amber-700">Proses Perbaikan</span>
                                    </div>
                                    <span
                                        class="bg-white text-amber-600 text-xs font-bold px-2 py-0.5 rounded-full">5</span>
                                </label>

                                <label
                                    class="flex items-center justify-between p-3 border border-gray-100 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox"
                                            class="w-4 h-4 text-gray-400 border-gray-300 rounded focus:ring-gray-400 text-gray-400">
                                        <span class="text-sm font-medium text-gray-600">Selesai</span>
                                    </div>
                                    <span
                                        class="bg-gray-100 text-gray-500 text-xs font-bold px-2 py-0.5 rounded-full">48</span>
                                </label>
                            </div>
                        </div>

                        <!-- Tingkat Kerusakan -->
                        <div class="filter-section">
                            <h4 class="text-xs font-bold text-gray-500 mb-3">Tingkat Kerusakan</h4>
                            <div class="flex gap-2">
                                <button
                                    class="flex-1 py-1.5 px-2 border border-gray-200 rounded text-xs font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition">Ringan</button>
                                <button
                                    class="flex-1 py-1.5 px-2 border border-blue-500 bg-blue-50 text-blue-600 rounded text-xs font-medium transition">Sedang</button>
                                <button
                                    class="flex-1 py-1.5 px-2 border border-blue-500 bg-blue-50 text-blue-600 rounded text-xs font-medium transition">Berat</button>
                            </div>
                        </div>

                        <!-- Rentang Tanggal -->
                        <div class="filter-section">
                            <h4 class="text-xs font-bold text-gray-500 mb-3">Rentang Tanggal</h4>
                            <div class="flex items-center gap-2">
                                <div class="flex-1">
                                    <span
                                        class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Dari</span>
                                    <input type="date" value="2023-10-01"
                                        class="w-full text-xs p-2 border border-gray-200 rounded bg-gray-50 text-gray-600 focus:outline-none focus:border-blue-500">
                                </div>
                                <div class="flex-1">
                                    <span
                                        class="text-[10px] text-gray-400 uppercase font-semibold mb-1 block">Sampai</span>
                                    <input type="date" value="2023-10-15"
                                        class="w-full text-xs p-2 border border-gray-200 rounded bg-gray-50 text-gray-600 focus:outline-none focus:border-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Wilayah Kecamatan -->
                        <div class="filter-section">
                            <h4 class="text-xs font-bold text-gray-500 mb-3">Wilayah Kecamatan</h4>
                            <select
                                class="w-full p-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Semua Wilayah</option>
                                <option>Semarang Tengah</option>
                                <option>Semarang Barat</option>
                                <option>Semarang Selatan</option>
                            </select>
                        </div>
                    </div>

                    <div class="p-4 border-t border-gray-100 bg-gray-50">
                        <button
                            class="w-full py-2.5 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition shadow-sm hover:shadow-md">
                            Terapkan Filter
                        </button>
                    </div>
                </div>

                <!-- Detail Card (Floating) - Example Hidden initially but showing as part of layout check from image -->
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden w-80 z-20 hidden">
                    <div class="relative h-32">
                        <img src="https://images.unsplash.com/photo-1515162816999-a0c47dc192f7?auto=format&fit=crop&q=80&w=400"
                            alt="Kerusakan" class="w-full h-full object-cover">
                        <span
                            class="absolute top-3 right-3 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded">Baru</span>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-gray-900 leading-tight">Jl. Sudirman No. 45</h4>
                        <p class="text-xs text-gray-500 mt-1">Kec. Kebayoran Baru, Jakarta Selatan</p>

                        <div class="flex items-center justify-between mt-4 mb-4">
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase font-bold">Tingkat Kerusakan</p>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm font-bold text-red-600">Berat</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] text-gray-400 uppercase font-bold">Tanggal</p>
                                <p class="text-sm font-medium text-gray-700 mt-0.5">12 Okt 2023</p>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <button
                                class="flex-1 py-2 border border-gray-200 rounded-lg text-xs font-semibold text-gray-600 hover:bg-gray-50">Detail</button>
                            <button
                                class="flex-1 py-2 bg-blue-600 rounded-lg text-xs font-semibold text-white hover:bg-blue-700">Tugaskan</button>
                        </div>
                    </div>
                </div>

                <!-- Map Controls -->
                <div class="absolute bottom-6 left-6 flex flex-col gap-2 z-10">
                    <button
                        class="w-10 h-10 bg-white rounded-lg shadow-lg border border-gray-100 flex items-center justify-center text-gray-600 hover:text-blue-600 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </button>
                    <button
                        class="w-10 h-10 bg-white rounded-lg shadow-lg border border-gray-100 flex items-center justify-center text-gray-600 hover:text-blue-600 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </button>
                    <button
                        class="w-auto px-4 h-10 bg-white rounded-lg shadow-lg border border-gray-100 flex items-center justify-center gap-2 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition mt-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Lokasi Saya
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mapbox Initialization -->
    <script>
        // Access token from environment variable
        mapboxgl.accessToken = '{{ env('MAPBOX_ACCESS_TOKEN') }}';

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/standard', // Mapbox GL JS v3 Standard style
            center: [110.4203, -6.9666], // Semarang center
            zoom: 12,
            minZoom: 11,
            maxZoom: 18,
            maxBounds: [
                [110.25, -7.15], // Southwest coordinates
                [110.55, -6.85]  // Northeast coordinates
            ]
        });

        // Add navigation controls
        map.addControl(new mapboxgl.NavigationControl(), 'bottom-left');

        // Color mapping for destruct_class
        const getMarkerColor = (destructClass) => {
            switch (destructClass) {
                case 'fair':
                    return '#166534'; // Dark green
                case 'poor':
                    return '#eab308'; // Yellow
                case 'very_poor':
                    return '#dc2626'; // Red
                default:
                    return '#6b7280'; // Gray for unknown
            }
        };

        // Get label for destruct class
        const getDestructLabel = (destructClass) => {
            switch (destructClass) {
                case 'fair':
                    return 'Ringan';
                case 'poor':
                    return 'Sedang';
                case 'very_poor':
                    return 'Berat';
                default:
                    return 'Tidak Diketahui';
            }
        };

        // Store all markers for filtering
        let allMarkers = [];

        // Fetch reports and add markers
        map.on('load', async () => {
            try {
                const response = await fetch('/api/get_report');
                const reports = await response.json();

                reports.forEach(report => {
                    if (report.latitude && report.longitude) {
                        // Create custom marker element
                        const el = document.createElement('div');
                        el.className = 'custom-marker';
                        el.style.width = '28px';
                        el.style.height = '28px';
                        el.style.borderRadius = '50%';
                        el.style.backgroundColor = getMarkerColor(report.destruct_class);
                        el.style.border = '3px solid white';
                        el.style.boxShadow = '0 2px 8px rgba(0,0,0,0.35)';
                        el.style.cursor = 'pointer';
                        el.style.transition = 'transform 0.2s ease';

                        // Hover effect
                        el.addEventListener('mouseenter', () => {
                            el.style.transform = 'scale(1.2)';
                        });
                        el.addEventListener('mouseleave', () => {
                            el.style.transform = 'scale(1)';
                        });

                        // Create popup content
                        const popupContent = `
                            <div style="min-width: 240px; font-family: 'Inter', sans-serif;">
                                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
                                    <h4 style="font-weight: 600; font-size: 14px; margin: 0; color: #1f2937;">${report.road_name || 'Lokasi Tidak Diketahui'}</h4>
                                    <span style="background-color: ${getMarkerColor(report.destruct_class)}; color: white; padding: 2px 8px; border-radius: 9999px; font-size: 10px; font-weight: 600;">
                                        ${getDestructLabel(report.destruct_class)}
                                    </span>
                                </div>
                                <p style="font-size: 12px; color: #6b7280; margin-bottom: 12px; line-height: 1.4;">${report.description || '-'}</p>
                                <div style="display: flex; justify-content: space-between; font-size: 11px; padding-top: 8px; border-top: 1px solid #e5e7eb;">
                                    <div>
                                        <span style="color: #9ca3af;">Skor:</span>
                                        <span style="font-weight: 600; color: #374151;">${report.total_score?.toFixed(1) || '0'}</span>
                                    </div>
                                    <div>
                                        <span style="color: #9ca3af;">Status:</span>
                                        <span style="font-weight: 500; color: #374151;">${report.status || '-'}</span>
                                    </div>
                                </div>
                            </div>
                        `;

                        // Create popup
                        const popup = new mapboxgl.Popup({ offset: 25, closeButton: true, closeOnClick: false })
                            .setHTML(popupContent);

                        // Add marker to map
                        const marker = new mapboxgl.Marker(el)
                            .setLngLat([report.longitude, report.latitude])
                            .setPopup(popup)
                            .addTo(map);

                        // Store marker with its data for filtering
                        allMarkers.push({
                            marker: marker,
                            data: report
                        });
                    }
                });

                console.log(`Loaded ${allMarkers.length} report markers`);
            } catch (error) {
                console.error('Error fetching reports:', error);
            }
        });

    </script>
</body>

</html>