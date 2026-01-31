<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petugas Lapangan - SILAJU</title>
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

        .status-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-verified {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-unverified {
            background-color: #fef3c7;
            color: #92400e;
        }

        .role-badge {
            padding: 0.25rem 0.625rem;
            border-radius: 9999px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .role-worker {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .role-admin {
            background-color: #f3e8ff;
            color: #7e22ce;
        }

        .table-row:hover {
            background-color: #f8fafc;
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

                <a href="/petugas-lapangan" class="sidebar-link active">
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
                        <h1 class="text-2xl font-bold text-gray-900">Manajemen Pekerja</h1>
                        <p class="text-sm text-gray-500 mt-1">Kelola data pekerja lapangan dan status verifikasi akun.
                        </p>
                    </div>
                    <button id="btn-tambah-pekerja"
                        class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 rounded-lg text-sm font-medium text-white hover:bg-blue-700 transition-colors shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Pekerja
                    </button>
                </div>

                <!-- Table Card -->
                <div class="bg-white rounded-2xl border border-gray-200">
                    <!-- Search and Filters -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center justify-between gap-4">
                            <!-- Search Input -->
                            <div class="flex-1 max-w-md">
                                <div class="relative">
                                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    <input type="text" id="search-pekerja"
                                        placeholder="Cari nama pekerja, username, atau email..."
                                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center gap-3">
                                <button id="btn-refresh"
                                    class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Refresh
                                </button>
                                <button
                                    class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Export
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Pekerja
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Username
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Status Verifikasi
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="workers-tbody" class="divide-y divide-gray-100">
                                <!-- Loading State -->
                                <tr id="loading-row">
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center gap-3">
                                            <svg class="animate-spin w-8 h-8 text-blue-500" fill="none"
                                                viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <span>Memuat data pekerja...</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500" id="pagination-info">
                                Menampilkan <span class="font-semibold text-gray-900" id="showing-count">0</span>
                                pekerja
                            </p>
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

    <!-- Assignment Modal - Normal Modal -->
    <div id="assignment-modal" class="fixed inset-0 z-50 hidden" aria-hidden="true">
        <!-- Backdrop -->
        <!-- Backdrop -->
        <div id="modal-backdrop"
            class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

        <!-- Dialog Wrapper -->
        <div class="relative flex min-h-full items-center justify-center p-4">
            <!-- Dialog Panel -->
            <div id="modal-panel"
                class="w-full max-w-md rounded-2xl bg-white shadow-xl opacity-0 translate-y-2 scale-95 transition-all duration-200">

                <!-- Header -->
                <div class="flex items-center justify-between px-5 py-4 border-b border-gray-200">
                    <h3 class="text-base font-semibold text-gray-900">Tugaskan Pekerja</h3>
                    <button type="button" id="btn-close-modal"
                        class="p-2 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Form -->
                <form id="assign-form">
                    <div class="px-5 py-4 space-y-4">
                        <input type="hidden" id="worker-id" name="worker_id">
                        <input type="hidden" id="worker-name" name="worker_name">

                        <!-- Worker Info -->
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-gray-50 border border-gray-200">
                            <div id="worker-avatar"
                                class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm">
                                --
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-xs text-gray-500">Pekerja</p>
                                <p id="worker-name-display" class="font-semibold text-gray-900 truncate">-</p>
                            </div>
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                Aktif
                            </span>
                        </div>

                        <!-- Report Select -->
                        <div>
                            <label for="report-select" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Pilih Laporan <span class="text-red-500">*</span>
                            </label>
                            <select id="report-select" name="report_id" required
                                class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Memuat laporan...</option>
                            </select>
                            <p class="mt-1 text-xs text-gray-500">Menampilkan laporan yang butuh pekerja</p>
                        </div>

                        <!-- Deadline -->
                        <div>
                            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Batas Waktu <span class="text-red-500">*</span>
                            </label>
                            <input type="datetime-local" id="deadline" name="deadline" required
                                class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Admin Notes -->
                        <div>
                            <label for="admin-notes" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Catatan Admin <span class="text-xs font-normal text-gray-400">(opsional)</span>
                            </label>
                            <textarea id="admin-notes" name="admin_notes" rows="3"
                                class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Tulis instruksi tambahan untuk pekerja..."></textarea>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div
                        class="flex items-center justify-end gap-2 px-5 py-4 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                        <button type="button" id="btn-cancel-modal"
                            class="px-4 py-2.5 text-sm font-medium rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" id="btn-submit-assign"
                            class="px-4 py-2.5 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan & Tugaskan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Create Worker -->
    <div id="create-worker-modal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div id="create-modal-backdrop"
            class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity opacity-0 duration-300"></div>

        <!-- Modal Panel -->
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div id="create-modal-panel"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 duration-300">

                    <!-- Header -->
                    <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Tambah Pekerja Baru</h3>
                        <button type="button" id="btn-close-create-modal"
                            class="text-gray-400 hover:text-gray-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Form -->
                    <form id="create-worker-form">
                        <div class="px-5 py-4 space-y-4">
                            <!-- Full Name -->
                            <div>
                                <label for="cw-fullname" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                    Lengkap</label>
                                <input type="text" id="cw-fullname" name="fullname" required
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Contoh: Budi Santoso">
                            </div>

                            <!-- Username -->
                            <div>
                                <label for="cw-username"
                                    class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                                <input type="text" id="cw-username" name="username" required
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Username unik">
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="cw-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="cw-email" name="email" required
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="nama@email.com">
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="cw-password"
                                    class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <input type="password" id="cw-password" name="password" required minlength="6"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Minimal 6 karakter">
                                <p class="mt-1 text-xs text-gray-500">Minimal 6 karakter</p>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="flex items-center justify-end gap-2 px-5 py-4 border-t border-gray-100 bg-gray-50">
                            <button type="button" id="btn-cancel-create-modal"
                                class="px-4 py-2.5 text-sm font-medium rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                                Batal
                            </button>
                            <button type="submit" id="btn-submit-create-worker"
                                class="px-4 py-2.5 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow-sm flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Simpan Pekerja</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Toast -->
    <div id="toast" class="fixed top-5 right-5 z-50 hidden transition-all duration-300 transform translate-x-full">
        <div class="bg-white border-l-4 border-blue-500 rounded shadow-lg p-4 flex items-center">
            <div id="toast-icon" class="mr-3">
                <!-- Icon injected by JS -->
            </div>
            <div>
                <p class="font-bold" id="toast-title">Notification</p>
                <p class="text-sm" id="toast-message">Message content</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tableBody = document.getElementById('workers-tbody');
            const searchInput = document.getElementById('search-pekerja');
            const refreshBtn = document.getElementById('btn-refresh');
            const showingCount = document.getElementById('showing-count');
            const modal = document.getElementById('assignment-modal');
            const assignForm = document.getElementById('assign-form');
            const reportSelect = document.getElementById('report-select');

            let allWorkers = [];
            let searchTimeout;

            // --- Modal Functions ---
            const modalBackdrop = document.getElementById('modal-backdrop');
            const modalPanel = document.getElementById('modal-panel'); // Changed from modal-content to modal-panel
            const btnCloseModal = document.getElementById('btn-close-modal');
            const btnCancelModal = document.getElementById('btn-cancel-modal');

            window.openAssignModal = async (workerId, workerName) => {
                document.getElementById('worker-id').value = workerId;
                document.getElementById('worker-name').value = workerName;

                // Update worker display elements
                document.getElementById('worker-name-display').textContent = workerName;

                // Generate initials for avatar
                const initials = workerName.split(' ')
                    .map(word => word.charAt(0))
                    .slice(0, 2)
                    .join('')
                    .toUpperCase();

                // Update avatar
                const avatarEl = document.getElementById('worker-avatar');
                avatarEl.textContent = initials || '--';

                // Set default deadline to tomorrow
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                tomorrow.setHours(12, 0, 0, 0); // Default to 12:00
                const tzOffset = tomorrow.getTimezoneOffset() * 60000;
                const localISOTime = (new Date(tomorrow - tzOffset)).toISOString().slice(0, 16);
                document.getElementById('deadline').value = localISOTime;

                // Show modal
                modal.classList.remove('hidden');

                // Trigger animation
                // 1. Fade in backdrop
                // 2. Animate panel (fade in + scale up + translate up)
                setTimeout(() => {
                    modalBackdrop.classList.remove('opacity-0');
                    modalBackdrop.classList.add('opacity-100');

                    modalPanel.classList.remove('opacity-0', 'translate-y-2', 'scale-95');
                    modalPanel.classList.add('opacity-100', 'translate-y-0', 'scale-100');
                }, 10);

                // Fetch reports
                await fetchAssignableReports();
            };

            window.closeModal = () => {
                // Animate out
                modalBackdrop.classList.remove('opacity-100');
                modalBackdrop.classList.add('opacity-0');

                modalPanel.classList.remove('opacity-100', 'translate-y-0', 'scale-100');
                modalPanel.classList.add('opacity-0', 'translate-y-2', 'scale-95');

                // Hide modal after animation matches duration-200
                setTimeout(() => {
                    modal.classList.add('hidden');
                    assignForm.reset();
                    // Reset worker display elements
                    document.getElementById('worker-name-display').textContent = '-';
                    document.getElementById('worker-avatar').textContent = '--';
                }, 200);
            };

            // Close modal when clicking backdrop
            modalBackdrop.addEventListener('click', (e) => {
                e.stopPropagation();
                window.closeModal();
            });

            // Close modal with close button
            btnCloseModal.addEventListener('click', (e) => {
                e.stopPropagation();
                window.closeModal();
            });

            // Close modal with cancel button
            btnCancelModal.addEventListener('click', (e) => {
                e.stopPropagation();
                window.closeModal();
            });

            // Prevent closing when clicking inside modal panel
            modalPanel.addEventListener('click', (e) => {
                e.stopPropagation();
            });

            // Close modal with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    window.closeModal();
                }
            });

            async function fetchAssignableReports() {
                reportSelect.innerHTML = '<option value="">Memuat laporan...</option>';
                try {
                    const response = await fetch('/api/admin/reports/assignable');
                    const reports = await response.json();

                    if (Array.isArray(reports) && reports.length > 0) {
                        reportSelect.innerHTML = '<option value="">Pilih Laporan</option>';
                        reports.forEach(report => {
                            const option = document.createElement('option');
                            option.value = report.id;
                            // Display "BUTUH PEKERJA" instead of actual status
                            option.textContent = `[BUTUH PEKERJA] ${report.road_name} - ${report.description.substring(0, 30)}...`;
                            reportSelect.appendChild(option);
                        });
                    } else {
                        reportSelect.innerHTML = '<option value="">Tidak ada laporan tersedia</option>';
                    }
                } catch (error) {
                    console.error('Error fetching reports:', error);
                    reportSelect.innerHTML = '<option value="">Gagal memuat laporan</option>';
                }
            }

            // Handle Assignment Submit
            assignForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const submitBtn = document.getElementById('btn-submit-assign');
                const originalHTML = submitBtn.innerHTML;

                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menugaskan...
                `;

                const formData = new FormData(assignForm);
                const data = Object.fromEntries(formData.entries());

                console.log('Submitting assignment data:', data); // Debug log

                try {
                    const response = await fetch('/api/admin/report/assign', {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                        },
                        body: JSON.stringify(data)
                    });

                    const result = await response.json();
                    console.log('API Response:', response.status, result); // Debug log

                    if (response.ok) {
                        showToast('success', 'Berhasil', 'Pekerja berhasil ditugaskan!');
                        window.closeModal();
                        fetchWorkers(); // Refresh worker list
                    } else {
                        showToast('error', 'Gagal', result.message || 'Terjadi kesalahan saat menugaskan.');
                    }
                } catch (error) {
                    console.error('Error assigning worker:', error);
                    showToast('error', 'Error', 'Gagal terhubung ke server: ' + error.message);
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalHTML;
                }
            });

            function showToast(type, title, message) {
                const toast = document.getElementById('toast');
                const toastTitle = document.getElementById('toast-title');
                const toastMessage = document.getElementById('toast-message');
                const toastIcon = document.getElementById('toast-icon');
                const borderClass = type === 'success' ? 'border-green-500' : 'border-red-500';
                const textClass = type === 'success' ? 'text-green-500' : 'text-red-500';

                // Reset classes
                toast.className = `fixed top-5 right-5 z-50 transition-all duration-300 transform translate-x-full bg-white border-l-4 rounded shadow-lg p-4 flex items-center ${borderClass}`;

                toastTitle.textContent = title;
                toastMessage.textContent = message;

                if (type === 'success') {
                    toastIcon.innerHTML = `<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>`;
                } else {
                    toastIcon.innerHTML = `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`;
                }

                toast.classList.remove('hidden', 'translate-x-full');

                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                    setTimeout(() => {
                        toast.classList.add('hidden');
                    }, 300);
                }, 3000);
            }

            // --- Helper Functions ---

            // Generate avatar color based on name
            const getAvatarColor = (name) => {
                const colors = [
                    'from-green-400 to-green-600',
                    'from-blue-400 to-blue-600',
                    'from-purple-400 to-purple-600',
                    'from-pink-400 to-pink-600',
                    'from-orange-400 to-orange-600',
                    'from-teal-400 to-teal-600',
                    'from-indigo-400 to-indigo-600',
                    'from-cyan-400 to-cyan-600',
                ];
                let hash = 0;
                for (let i = 0; i < (name || '').length; i++) {
                    hash = name.charCodeAt(i) + ((hash << 5) - hash);
                }
                return colors[Math.abs(hash) % colors.length];
            };

            // Get initials from fullname
            const getInitials = (fullname) => {
                if (!fullname) return '??';
                const parts = fullname.trim().split(' ');
                if (parts.length === 1) {
                    return parts[0].substring(0, 2).toUpperCase();
                }
                return (parts[0][0] + parts[parts.length - 1][0]).toUpperCase();
            };

            // Get role badge
            const getRoleBadge = (role) => {
                const roleClass = role === 'admin' ? 'role-admin' : 'role-worker';
                const label = role === 'admin' ? 'Admin' : 'Worker';
                return `<span class="role-badge ${roleClass}">${label}</span>`;
            };

            // Get verification status badge
            const getVerificationBadge = (verified) => {
                if (verified) {
                    return `<span class="status-badge status-verified flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Terverifikasi
                    </span>`;
                }
                return `<span class="status-badge status-unverified flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Belum Verifikasi
                </span>`;
            };

            // Render table
            const renderTable = (workers) => {
                tableBody.innerHTML = '';

                if (!workers || workers.length === 0) {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">Tidak ada data pekerja</h3>
                                    <p class="text-sm text-gray-500">Data pekerja akan muncul di sini.</p>
                                </div>
                            </td>
                        </tr>
                    `;
                    showingCount.textContent = '0';
                    return;
                }

                workers.forEach(worker => {
                    const row = document.createElement('tr');
                    row.className = 'table-row transition-colors';
                    const fullname = worker.fullname || worker.username || '-';
                    // Escape quotes for JS function parameter
                    const safeName = fullname.replace(/'/g, "\\'");

                    row.innerHTML = `
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br ${getAvatarColor(fullname)} flex items-center justify-center text-white font-semibold text-sm">
                                    ${getInitials(fullname)}
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">${fullname}</p>
                                    <p class="text-xs text-gray-500">ID: ${worker.id ? worker.id.substring(0, 8) + '...' : '-'}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-900">@${worker.username || '-'}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600">${worker.email || '-'}</span>
                        </td>
                        <td class="px-6 py-4">
                            ${getRoleBadge(worker.role)}
                        </td>
                        <td class="px-6 py-4">
                            ${getVerificationBadge(worker.verified)}
                        </td>
                        <td class="px-6 py-4">
                            <button type="button" 
                                onclick="openActionMenu(event, '${worker.id}', '${safeName}')"
                                class="inline-flex justify-center items-center rounded-md border border-gray-300 shadow-sm px-3 py-1.5 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Aksi
                                <svg class="-mr-1 ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });

                showingCount.textContent = workers.length;
            };

            // --- Action Menu Portal System (Fixes overflow issues) ---
            window.openActionMenu = (event, workerId, workerName) => {
                event.stopPropagation();
                // Remove existing menus
                removeActionMenu();

                const button = event.currentTarget;
                const rect = button.getBoundingClientRect();

                // Create menu element attached to BODY
                const menu = document.createElement('div');
                menu.id = 'dynamic-action-menu';
                menu.className = 'fixed z-[9999] w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 focus:outline-none transform transition-all duration-100 ease-out opacity-0 scale-95';

                // Position logic
                const menuHeight = 100; // Approx height
                const spaceBelow = window.innerHeight - rect.bottom;

                // Default to bottom-left align relative to button
                let top = rect.bottom + 5;
                let left = rect.left + rect.width - 192; // Align right edge (192px = w-48)

                // If not enough space below, show above
                if (spaceBelow < menuHeight) {
                    top = rect.top - menuHeight - 5;
                }

                // Ensure not off-screen left
                if (left < 10) left = rect.left;

                menu.style.top = `${top}px`;
                menu.style.left = `${left}px`;

                menu.innerHTML = `
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">Lihat Detail</a>
                    <button type="button" id="menu-btn-assign" class="block w-full text-left px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 font-medium">
                        Tugaskan Pekerja
                    </button>
                `;

                document.body.appendChild(menu);

                // Add event listeners for menu items
                document.getElementById('menu-btn-assign').addEventListener('click', (e) => {
                    e.stopPropagation();
                    removeActionMenu();
                    openAssignModal(workerId, workerName);
                });

                // Animate in
                requestAnimationFrame(() => {
                    menu.classList.remove('opacity-0', 'scale-95');
                    menu.classList.add('opacity-100', 'scale-100');
                });

                // Click outside to close
                document.addEventListener('click', removeActionMenu);
                // Scroll to close (prevents floating menu issues)
                window.addEventListener('scroll', removeActionMenu, true); // Capture phase
            };

            const removeActionMenu = () => {
                const menu = document.getElementById('dynamic-action-menu');
                if (menu) {
                    menu.remove();
                    document.removeEventListener('click', removeActionMenu);
                    window.removeEventListener('scroll', removeActionMenu, true);
                }
            };

            // Fetch workers from API
            const fetchWorkers = async () => {
                try {
                    // Show loading state
                    tableBody.innerHTML = `
                        <tr id="loading-row">
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center gap-3">
                                    <svg class="animate-spin w-8 h-8 text-blue-500" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span>Memuat data pekerja...</span>
                                </div>
                            </td>
                        </tr>
                    `;

                    const response = await fetch('/api/auth/admin/workers', {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const result = await response.json();

                    // Check for explicit error status from backend
                    if (result.status === 'error') {
                        throw new Error(result.message || 'Gagal memuat data dari server.');
                    }

                    if (result.status === 'success' && Array.isArray(result.data)) {
                        allWorkers = result.data;
                        renderTable(allWorkers);
                    } else if (Array.isArray(result)) {
                        allWorkers = result;
                        renderTable(allWorkers);
                    } else if (result.data && Array.isArray(result.data)) {
                        allWorkers = result.data;
                        renderTable(allWorkers);
                    } else {
                        // If success but empty or unknown format
                        console.warn('Unknown data format:', result);
                        renderTable([]);
                    }
                } catch (error) {
                    console.error('Error fetching workers:', error);
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center text-red-500">
                                Gagal memuat data. Periksa koneksi atau login ulang.
                            </td>
                        </tr>
                    `;
                }
            };

            // Search functionality
            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    const searchTerm = e.target.value.toLowerCase();
                    if (!searchTerm) {
                        renderTable(allWorkers);
                        return;
                    }
                    const filtered = allWorkers.filter(worker =>
                        (worker.fullname && worker.fullname.toLowerCase().includes(searchTerm)) ||
                        (worker.username && worker.username.toLowerCase().includes(searchTerm)) ||
                        (worker.email && worker.email.toLowerCase().includes(searchTerm))
                    );
                    renderTable(filtered);
                }, 300);
            });

            // Refresh button
            refreshBtn.addEventListener('click', () => {
                fetchWorkers();
            });

            // Initial load
            fetchWorkers();

            // --- Create Worker Modal Logic ---
            const createModal = document.getElementById('create-worker-modal');
            const createModalBackdrop = document.getElementById('create-modal-backdrop');
            const createModalPanel = document.getElementById('create-modal-panel');
            const createForm = document.getElementById('create-worker-form');
            const btnTambahPekerja = document.getElementById('btn-tambah-pekerja');
            const btnCloseCreateModal = document.getElementById('btn-close-create-modal');
            const btnCancelCreateModal = document.getElementById('btn-cancel-create-modal');
            const btnSubmitCreateWorker = document.getElementById('btn-submit-create-worker');

            window.openCreateModal = () => {
                createForm.reset();
                createModal.classList.remove('hidden');
                setTimeout(() => {
                    createModalBackdrop.classList.remove('opacity-0');
                    createModalBackdrop.classList.add('opacity-100');
                    createModalPanel.classList.remove('opacity-0', 'translate-y-4', 'scale-95');
                    createModalPanel.classList.add('opacity-100', 'translate-y-0', 'scale-100');
                }, 10);
            };

            window.closeCreateModal = () => {
                createModalBackdrop.classList.remove('opacity-100');
                createModalBackdrop.classList.add('opacity-0');
                createModalPanel.classList.remove('opacity-100', 'translate-y-0', 'scale-100');
                createModalPanel.classList.add('opacity-0', 'translate-y-4', 'scale-95');
                setTimeout(() => {
                    createModal.classList.add('hidden');
                }, 300);
            };

            if (btnTambahPekerja) btnTambahPekerja.addEventListener('click', window.openCreateModal);
            if (btnCloseCreateModal) btnCloseCreateModal.addEventListener('click', window.closeCreateModal);
            if (btnCancelCreateModal) btnCancelCreateModal.addEventListener('click', window.closeCreateModal);

            if (createForm) {
                createForm.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const originalBtnContent = btnSubmitCreateWorker.innerHTML;
                    btnSubmitCreateWorker.disabled = true;
                    btnSubmitCreateWorker.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Menyimpan...';

                    const formData = new FormData(createForm);
                    const data = Object.fromEntries(formData.entries());

                    try {
                        const response = await fetch('/api/admin/worker', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(data)
                        });

                        const result = await response.json();

                        if (response.ok && result.status === 'success') {
                            showToast('success', 'Berhasil', 'Pekerja baru berhasil ditambahkan!');
                            window.closeCreateModal();
                            fetchWorkers(); // Refresh list
                        } else {
                            throw new Error(result.message || 'Gagal membuat pekerja.');
                        }
                    } catch (error) {
                        showToast('error', 'Gagal', error.message);
                    } finally {
                        btnSubmitCreateWorker.disabled = false;
                        btnSubmitCreateWorker.innerHTML = originalBtnContent;
                    }
                });
            }
        });
    </script>
</body>

</html>