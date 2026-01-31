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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

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

        /* Mapbox marker fix - ensure markers stay at geographic position */
        .mapboxgl-marker {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            will-change: transform;
        }

        .custom-marker {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            cursor: pointer;
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

                <a href="/peta-sebaran" class="sidebar-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    Peta Sebaran
                </a>

                <a href="/petugas-lapangan" class="sidebar-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Petugas Lapangan
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
                            <p class="text-sm font-semibold text-gray-900">Admin</p>
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
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- Total Laporan Masuk -->
                    <div class="stat-card">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-gray-500 font-medium">Total Laporan Masuk</p>
                                <p class="text-3xl font-bold text-gray-900 mt-1" id="stat-total-reports">
                                    <span class="animate-pulse bg-gray-200 rounded w-16 h-8 inline-block"></span>
                                </p>
                                <div class="flex items-center gap-1 mt-2" id="stat-percentage-container">
                                    <span class="text-green-500 text-sm font-medium flex items-center gap-1"
                                        id="stat-percentage">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        <span id="percentage-value">--</span>%
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
                                <p class="text-3xl font-bold text-gray-900 mt-1" id="stat-in-progress">
                                    <span class="animate-pulse bg-gray-200 rounded w-12 h-8 inline-block"></span>
                                </p>
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
                                <p class="text-3xl font-bold text-gray-900 mt-1" id="stat-completed">
                                    <span class="animate-pulse bg-gray-200 rounded w-12 h-8 inline-block"></span>
                                </p>
                                <div class="flex items-center gap-2 mt-2">
                                    <span id="target-badge"
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
                        <!-- Chart Canvas -->
                        <div class="h-64 relative">
                            <canvas id="trendChart"></canvas>
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
            </main>
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 px-6 py-4 text-center">
                <p class="text-sm text-gray-500">© 2026 SILAJU - Sistem Laporan Jalan Umum. All rights reserved.</p>
            </footer>
        </div>
    </div>

    <script>
        // Initialize Mapbox Map - Access token from environment variable
        mapboxgl.accessToken = '{{ env('MAPBOX_ACCESS_TOKEN') }}';

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
                        el.style.backgroundColor = getMarkerColor(report.destruct_class);

                        // Create popup content
                        const popupContent = `
                            <div style="min-width: 200px;">
                                <h4 style="font-weight: 600; margin-bottom: 4px;">${report.road_name || 'Lokasi Tidak Diketahui'}</h4>
                                <p style="font-size: 12px; color: #666; margin-bottom: 8px;">${report.description || '-'}</p>
                                <div style="display: flex; justify-content: space-between; font-size: 11px;">
                                    <span style="color: ${getMarkerColor(report.destruct_class)}; font-weight: 600;">
                                        ${report.destruct_class?.replace('_', ' ').toUpperCase() || 'N/A'}
                                    </span>
                                    <span style="color: #888;">${report.status || ''}</span>
                                </div>
                            </div>
                        `;

                        // Create popup
                        const popup = new mapboxgl.Popup({ offset: 25 })
                            .setHTML(popupContent);

                        // Add marker to map
                        new mapboxgl.Marker({
                            element: el,
                            anchor: 'center'
                        })
                            .setLngLat([parseFloat(report.longitude), parseFloat(report.latitude)])
                            .setPopup(popup)
                            .addTo(map);
                    }
                });
            } catch (error) {
                console.error('Error fetching reports:', error);
            }
        });

        // Dashboard Stats
        let trendChart = null;

        const fetchDashboardStats = async () => {
            try {
                const response = await fetch('/api/admin/dashboard-stats');
                const data = await response.json();

                console.log('Dashboard stats:', data);

                // Update stat cards
                document.getElementById('stat-total-reports').textContent = data.total_reports;
                document.getElementById('stat-in-progress').textContent = data.in_progress;
                document.getElementById('stat-completed').textContent = data.completed_this_month;

                // Update percentage change
                const percentageValue = document.getElementById('percentage-value');
                const percentageSpan = document.getElementById('stat-percentage');

                if (data.percentage_change >= 0) {
                    percentageValue.textContent = '+' + data.percentage_change;
                    percentageSpan.classList.remove('text-red-500');
                    percentageSpan.classList.add('text-green-500');
                    percentageSpan.innerHTML = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        +${data.percentage_change}%
                    `;
                } else {
                    percentageSpan.classList.remove('text-green-500');
                    percentageSpan.classList.add('text-red-500');
                    percentageSpan.innerHTML = `
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6" />
                        </svg>
                        ${data.percentage_change}%
                    `;
                }

                // Render trend chart
                renderTrendChart(data.trend_data);

            } catch (error) {
                console.error('Error fetching dashboard stats:', error);
            }
        };

        const renderTrendChart = (trendData) => {
            const ctx = document.getElementById('trendChart').getContext('2d');

            // Destroy existing chart if exists
            if (trendChart) {
                trendChart.destroy();
            }

            const labels = trendData.map(item => item.day_name);
            const counts = trendData.map(item => item.count);

            // Create gradient
            const gradient = ctx.createLinearGradient(0, 0, 0, 250);
            gradient.addColorStop(0, 'rgba(59, 130, 246, 0.3)');
            gradient.addColorStop(1, 'rgba(59, 130, 246, 0)');

            trendChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Laporan Masuk',
                        data: counts,
                        borderColor: '#3b82f6',
                        backgroundColor: gradient,
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#3b82f6',
                        pointBorderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#1f2937',
                            titleColor: '#ffffff',
                            bodyColor: '#ffffff',
                            padding: 12,
                            cornerRadius: 8,
                            displayColors: false,
                            callbacks: {
                                title: function (tooltipItems) {
                                    const index = tooltipItems[0].dataIndex;
                                    return trendData[index].day_full;
                                },
                                label: function (context) {
                                    return `${context.parsed.y} laporan`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6b7280',
                                font: {
                                    size: 12
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#e5e7eb',
                                drawBorder: false
                            },
                            ticks: {
                                color: '#6b7280',
                                font: {
                                    size: 12
                                },
                                stepSize: 1,
                                callback: function (value) {
                                    if (Number.isInteger(value)) {
                                        return value;
                                    }
                                }
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            });
        };

        // Fetch stats on page load
        document.addEventListener('DOMContentLoaded', () => {
            fetchDashboardStats();
        });
    </script>
</body>

</html>