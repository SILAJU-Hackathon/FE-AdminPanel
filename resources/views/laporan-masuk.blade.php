<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Laporan - SILAJU</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

                <a href="/dashboard" class="sidebar-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Beranda
                </a>

                <a href="/laporan-masuk" class="sidebar-link active">
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
                        <h1 class="text-2xl font-bold text-gray-900">Manajemen Laporan</h1>
                        <p class="text-sm text-gray-500 mt-1">Kelola laporan kerusakan jalan, verifikasi, dan penugasan.
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 rounded-lg text-sm font-medium text-white hover:bg-blue-700 transition-colors shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Buat Laporan Manual
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white rounded-xl border border-gray-200 p-4 mb-6">
                    <div class="flex items-center gap-4">
                        <!-- Search -->
                        <div class="flex-1 relative">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" id="search-input" placeholder="Cari ID laporan, pelapor, atau alamat..."
                                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Status Filter -->
                        <div class="relative">
                            <select id="status-filter"
                                class="appearance-none pl-4 pr-10 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                <option value="">Status: Semua</option>
                                <option value="pending">Pending</option>
                                <option value="assigned">Ditugaskan</option>
                                <option value="finish by worker">Selesai oleh Petugas</option>
                                <option value="verified">Terverifikasi</option>
                                <option value="complete">Selesai</option>
                            </select>
                            <svg class="w-4 h-4 text-gray-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left">
                                        <input type="checkbox"
                                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        ID Laporan
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Foto
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Lokasi
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Severity
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Urgensi
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Tanggal
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="reports-table-body" class="divide-y divide-gray-100">
                                <!-- Loading State -->
                                <tr>
                                    <td colspan="9" class="px-6 py-8 text-center text-gray-500">
                                        Memuat data...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between"
                        id="pagination-container">
                        <p class="text-sm text-gray-500">
                            Menampilkan <span class="font-semibold text-gray-900" id="showing-count">0</span> dari <span
                                class="font-semibold text-gray-900" id="total-count">0</span> data
                        </p>
                        <div class="flex items-center gap-2">
                            <button id="prev-btn" disabled
                                class="px-3 py-1.5 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                Sebelumnya
                            </button>
                            <button id="curr-page-btn"
                                class="w-8 h-8 flex items-center justify-center text-sm font-medium text-white bg-blue-600 rounded-lg">
                                1
                            </button>
                            <button id="next-btn" disabled
                                class="px-3 py-1.5 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                Selanjutnya
                            </button>
                        </div>
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
        document.addEventListener('DOMContentLoaded', () => {
            let currentPage = 1;
            const limit = 10;
            let currentStatus = '';

            const tableBody = document.getElementById('reports-table-body');
            const statusFilter = document.getElementById('status-filter');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const currPageBtn = document.getElementById('curr-page-btn');
            const showingCount = document.getElementById('showing-count');
            const totalCount = document.getElementById('total-count');
            const searchInput = document.getElementById('search-input');
            let searchTimeout;
            let currentSearch = '';

            // Format Date
            const formatDate = (dateString) => {
                if (!dateString) return '-';
                const date = new Date(dateString);
                return new Intl.DateTimeFormat('id-ID', {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                }).format(date);
            };

            // Get Status Badge
            const getStatusBadge = (status) => {
                const styles = {
                    'pending': 'bg-yellow-100 text-yellow-700',
                    'assigned': 'bg-blue-100 text-blue-700',
                    'finish by worker': 'bg-indigo-100 text-indigo-700',
                    'verified': 'bg-purple-100 text-purple-700',
                    'complete': 'bg-green-100 text-green-700'
                };
                const labels = {
                    'pending': 'Pending',
                    'assigned': 'Ditugaskan',
                    'finish by worker': 'Selesai Petugas',
                    'verified': 'Terverifikasi',
                    'complete': 'Selesai'
                };
                const label = labels[status] || (status ? status.charAt(0).toUpperCase() + status.slice(1) : 'Unknown');
                const css = styles[status] || 'bg-gray-100 text-gray-700';
                return `<span class="px-2.5 py-0.5 rounded-full text-xs font-medium ${css}">${label}</span>`;
            };

            // Get Severity Badge
            const getSeverityBadge = (c) => {
                const styles = {
                    'fair': 'bg-green-100 text-green-700',
                    'poor': 'bg-yellow-100 text-yellow-700',
                    'very_poor': 'bg-red-100 text-red-700'
                };
                const labels = {
                    'fair': 'Ringan',
                    'poor': 'Sedang',
                    'very_poor': 'Berat'
                };
                const css = styles[c] || 'bg-gray-100 text-gray-700';
                const label = labels[c] || 'Unknown';
                return `<span class="px-2.5 py-0.5 rounded-full text-xs font-medium ${css}">${label}</span>`;
            };

            // Get Urgency Label
            const getUrgencyLabel = (destructClass) => {
                if (destructClass === 'very_poor') return '<span class="text-red-600 font-semibold">Tinggi</span>';
                if (destructClass === 'poor') return '<span class="text-amber-600 font-medium">Sedang</span>';
                return '<span class="text-green-600">Rendah</span>';
            };

            // Render Table
            const renderTable = (reports) => {
                tableBody.innerHTML = '';

                if (reports.length === 0) {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="9" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">Belum ada laporan</h3>
                                    <p class="text-sm text-gray-500">Silakan ubah filter atau buat laporan baru.</p>
                                </div>
                            </td>
                        </tr>
                     `;
                    return;
                }

                reports.forEach(report => {
                    const row = `
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-medium text-gray-900">#${report.id.substring(0, 8)}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="h-10 w-10 rounded-lg bg-gray-200 overflow-hidden">
                                    ${report.before_image_url ? `<img src="${report.before_image_url}" class="h-full w-full object-cover">` : ''}
                                </div>
                            </td>
                            <td class="px-6 py-4 max-w-xs">
                                <p class="text-sm text-gray-900 truncate" title="${report.road_name}">${report.road_name || 'Lokasi tidak diketahui'}</p>
                            </td>
                            <td class="px-6 py-4">
                                ${getStatusBadge(report.status)}
                            </td>
                            <td class="px-6 py-4">
                                ${getSeverityBadge(report.destruct_class)}
                            </td>
                            <td class="px-6 py-4">
                                ${getUrgencyLabel(report.destruct_class)}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-500">${formatDate(report.created_at)}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    ${report.status === 'finish by worker' ? `
                                    <button onclick="verifyReport('${report.id}')" class="p-1 text-green-600 hover:text-green-800 transition-colors" title="Verifikasi Laporan">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                    ` : ''}
                                    <button class="p-1 text-gray-400 hover:text-blue-600 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button class="p-1 text-gray-400 hover:text-red-600 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });
            };

            // Fetch Reports
            const fetchReports = async (page = 1) => {
                console.log('Fetching reports for page:', page); // Debug Log
                try {
                    // Show loading
                    if (page === 1) tableBody.innerHTML = '<tr><td colspan="9" class="px-6 py-8 text-center text-gray-500">Memuat data...</td></tr>';

                    let url = `{{ url('/api/admin/report') }}?page=${page}&limit=${limit}`;
                    if (currentStatus) url += `&status=${currentStatus}`;
                    if (currentSearch) url += `&search=${encodeURIComponent(currentSearch)}`;

                    console.log('Requesting URL:', url); // Debug Log

                    const response = await fetch(url, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    console.log('Response status:', response.status); // Debug Log

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const data = await response.json();
                    console.log('Data received:', data); // Debug Log

                    renderTable(data.reports);

                    // Update Pagination
                    showingCount.innerText = data.reports.length;
                    totalCount.innerText = data.total_count;
                    currPageBtn.innerText = data.page;

                    prevBtn.disabled = data.page <= 1;
                    nextBtn.disabled = data.page >= data.total_pages;

                    // Update button styles based on disabled state
                    if (prevBtn.disabled) {
                        prevBtn.classList.add('text-gray-400', 'bg-gray-100', 'cursor-not-allowed');
                        prevBtn.classList.remove('text-gray-700', 'bg-white', 'hover:bg-gray-50', 'cursor-pointer');
                    } else {
                        prevBtn.classList.remove('text-gray-400', 'bg-gray-100', 'cursor-not-allowed');
                        prevBtn.classList.add('text-gray-700', 'bg-white', 'hover:bg-gray-50', 'cursor-pointer');
                    }

                    if (nextBtn.disabled) {
                        nextBtn.classList.add('text-gray-400', 'bg-gray-100', 'cursor-not-allowed');
                        nextBtn.classList.remove('text-gray-700', 'bg-white', 'hover:bg-gray-50', 'cursor-pointer');
                    } else {
                        nextBtn.classList.remove('text-gray-400', 'bg-gray-100', 'cursor-not-allowed');
                        nextBtn.classList.add('text-gray-700', 'bg-white', 'hover:bg-gray-50', 'cursor-pointer');
                    }

                    currentPage = data.page;

                } catch (error) {
                    console.error('Error fetching reports:', error);
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="9" class="px-6 py-8 text-center text-red-500">
                                <div class="flex flex-col items-center">
                                    <p class="font-semibold">Gagal memuat data</p>
                                    <p class="text-xs text-gray-500 mt-1">${error.message}</p>
                                    <button onclick="location.reload()" class="mt-2 text-blue-600 hover:underline text-xs">Muat Ulang</button>
                                </div>
                            </td>
                        </tr>
                    `;
                }
            };

            // Event Listeners
            statusFilter.addEventListener('change', (e) => {
                currentStatus = e.target.value;
                currentPage = 1;
                fetchReports(1);
            });

            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    currentSearch = e.target.value;
                    currentPage = 1;
                    fetchReports(1);
                }, 500); // Debounce 500ms
            });

            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) fetchReports(currentPage - 1);
            });

            nextBtn.addEventListener('click', () => {
                fetchReports(currentPage + 1);
            });

            // Verify Report Function
            window.verifyReport = async (reportId) => {
                if (!confirm('Apakah Anda yakin ingin memverifikasi laporan ini sebagai selesai/finish?')) return;

                try {
                    // Show loading state implicitly by maybe changing cursor
                    document.body.style.cursor = 'wait';

                    const response = await fetch('/api/admin/report/verify', {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ report_id: reportId })
                    });

                    const result = await response.json();

                    document.body.style.cursor = 'default';

                    if (response.ok) {
                        alert('Laporan berhasil diverifikasi!');
                        fetchReports(currentPage); // Refresh table
                    } else {
                        alert('Gagal memverifikasi: ' + (result.message || 'Error tidak diketahui'));
                    }
                } catch (error) {
                    document.body.style.cursor = 'default';
                    console.error('Error verifying report:', error);
                    alert('Terjadi kesalahan koneksi.');
                }
            };

            // Initial Load
            fetchReports();
        });
    </script>
</body>

</html>