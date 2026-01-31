<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrator - SILAJU</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .form-input-icon-left {
            padding-left: 2.75rem !important;
        }

        .form-input-icon-right {
            padding-right: 2.75rem !important;
        }

        @keyframes toast-in {
            0% {
                transform: translateY(-10px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-toast-in {
            animation: toast-in 220ms ease-out;
        }

        html,
        body {
            transform: none !important;
            filter: none !important;
            perspective: none !important;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-blue-50/50 to-white flex items-center justify-center p-4">

    <div class="w-full max-w-[420px]">
        <!-- Logo Section -->
        <div class="flex flex-col items-center justify-center mb-8">
            <div class="flex items-center gap-3">
                <div
                    class="h-10 w-10 rounded-lg bg-blue-600 flex items-center justify-center shadow-md shadow-blue-500/20 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M3 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm14.25 6a.75.75 0 0 1-.22.53l-2.25 2.25a.75.75 0 1 1-1.06-1.06L15.44 12l-1.72-1.72a.75.75 0 1 1 1.06-1.06l2.25 2.25c.141.14.22.331.22.53Zm-10.28-.53a.75.75 0 0 0 0 1.06l2.25 2.25a.75.75 0 1 0 1.06-1.06L8.56 12l1.72-1.72a.75.75 0 1 0-1.06-1.06l-2.25 2.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-2xl font-bold tracking-tight text-gray-900">SILAJU</span>
            </div>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl shadow-blue-100/50 p-8 border border-white relative overflow-hidden">
            <div class="text-center mb-8">
                <h2 class="text-xl font-bold text-gray-900">Login Administrator</h2>
                <p class="mt-2 text-sm text-gray-500">Masuk untuk mengelola laporan kerusakan jalan</p>
            </div>

            <form class="space-y-5" action="#" method="POST">
                <!-- Email -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" name="email" id="email"
                            class="block w-full form-input-icon-left rounded-lg border-0 ring-1 ring-inset ring-gray-300 py-3 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition-all duration-200"
                            placeholder="nama@pemerintah.go.id" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                    <div class="relative rounded-md shadow-sm">
                        <input type="password" name="password" id="password"
                            class="block w-full form-input-icon-right rounded-lg border-0 ring-1 ring-inset ring-gray-300 py-3 pl-4 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 transition-all duration-200"
                            placeholder="Masukkan password" required>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer group">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-600 transition-colors" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between pt-1">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600 transition-colors">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-600 cursor-pointer">Ingat
                            saya</label>
                    </div>
                </div>

                <!-- Submit -->
                <div class="pt-2">
                    <button type="submit"
                        class="flex w-full justify-center rounded-lg bg-blue-600 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-all duration-200 hover:shadow-lg hover:shadow-blue-500/30 active:scale-[0.98]">
                        Login
                    </button>
                </div>
            </form>
        </div>

        <p class="mt-8 text-center text-xs text-gray-400 opacity-80">
            &copy; 2024 Dinas Pekerjaan Umum. Sistem Pelaporan Jalan Rusak.
        </p>
    </div>

    <!-- Toast Notification - Top Right -->
    <div id="toast-login-gagal" style="display: none; position: fixed; top: 24px; right: 24px; z-index: 9999;">
        <div style="width: 360px; max-width: calc(100vw - 3rem);"
            class="relative bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden animate-toast-in">
            <div class="absolute left-0 top-0 h-full w-1 bg-red-500"></div>

            <div class="p-4 pl-5 flex items-start gap-3">
                <div class="flex-shrink-0">
                    <div class="h-9 w-9 rounded-lg bg-red-50 flex items-center justify-center">
                        <svg class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="flex-1 pr-6">
                    <p class="text-sm font-semibold text-gray-900 leading-5">Login Gagal</p>
                    <p class="mt-0.5 text-sm text-gray-500 leading-snug">
                        Email atau password salah. Silakan coba lagi.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <script>
        function showLoginToast() {
            const toast = document.getElementById('toast-login-gagal');
            toast.style.display = 'block';

            clearTimeout(window.__toastTimer);
            window.__toastTimer = setTimeout(() => {
                hideLoginToast();
            }, 4000);
        }

        function hideLoginToast() {
            const toast = document.getElementById('toast-login-gagal');
            toast.style.display = 'none';
        }

        document.querySelector('form').addEventListener('submit', async function (e) {
            e.preventDefault();

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            // reset error ring
            this.querySelectorAll('.ring-red-500').forEach(el => el.classList.remove('ring-red-500'));
            hideLoginToast();

            // loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg> Processing...
      `;

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('/api/auth/admin/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    window.location.href = result.redirect || '/dashboard';
                } else {
                    showLoginToast();

                    if (result.errors) {
                        Object.keys(result.errors).forEach(key => {
                            const input = document.getElementById(key);
                            if (input) input.classList.add('ring-red-500', 'focus:ring-red-500');
                        });
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                showLoginToast();
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    </script>

</body>

</html>