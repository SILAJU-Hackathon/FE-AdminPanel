<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hackathon Udinus 2026</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700,800" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0f172a;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .text-gradient {
            background: linear-gradient(to right, #60a5fa, #a855f7, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: linear-gradient(180deg, rgba(76, 29, 149, 0.4) 0%, rgba(59, 130, 246, 0.4) 100%);
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.6;
            z-index: -1;
            animation: move 20s infinite alternate;
        }

        @keyframes move {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(50px, 50px);
            }
        }
    </style>
</head>

<body class="antialiased min-h-screen text-white overflow-x-hidden relative">

    <!-- Background Blobs -->
    <div class="blob top-0 left-0 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="blob bottom-0 right-0 translate-x-1/2 translate-y-1/2"
        style="background: linear-gradient(180deg, rgba(236, 72, 153, 0.4) 0%, rgba(168, 85, 247, 0.4) 100%); animation-duration: 25s;">
    </div>

    <!-- Navigation -->
    <nav
        class="w-full py-6 px-8 flex justify-between items-center glass-card fixed top-0 z-50 rounded-b-xl border-t-0 border-x-0 mx-auto max-w-7xl left-0 right-0">
        <div class="text-2xl font-bold tracking-tighter">
            <span class="text-blue-500">Hack</span>Udinus
        </div>
        <div class="hidden md:flex gap-8 text-sm font-medium text-gray-300">
            <a href="#" class="hover:text-white transition">About</a>
            <a href="#" class="hover:text-white transition">Tracks</a>
            <a href="#" class="hover:text-white transition">Schedule</a>
            <a href="#" class="hover:text-white transition">Sponsors</a>
        </div>
        <a href="#"
            class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded-full text-sm font-semibold transition shadow-lg shadow-blue-500/30">
            Join Now
        </a>
    </nav>

    <!-- Hero Section -->
    <main class="relative pt-32 pb-20 px-6 max-w-7xl mx-auto flex flex-col items-center text-center">

        <div
            class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-card text-xs font-semibold text-blue-300 mb-8 animate-pulse border-blue-500/30">
            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
            Registration Open for 2026
        </div>

        <h1 class="text-6xl md:text-8xl font-extrabold tracking-tight mb-6 leading-tight">
            Build the <span class="text-gradient">Future</span> <br />
            of Technology
        </h1>

        <p class="text-lg md:text-xl text-gray-400 max-w-2xl mb-10 leading-relaxed">
            Join the biggest student hackathon at Udinus. 48 hours of coding, innovation, and collaboration to solve
            real-world problems.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
            <button
                class="px-8 py-4 bg-white text-gray-900 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-xl shadow-white/10 transform hover:-translate-y-1">
                Register as Hacker
            </button>
            <button
                class="px-8 py-4 glass-card text-white rounded-full font-bold text-lg hover:bg-white/10 transition border border-white/20">
                View Handbook
            </button>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20 w-full max-w-4xl">
            <div class="glass-card p-6 rounded-2xl text-center">
                <div class="text-4xl font-bold text-blue-400 mb-2">$10k+</div>
                <div class="text-sm text-gray-400">Prizes</div>
            </div>
            <div class="glass-card p-6 rounded-2xl text-center">
                <div class="text-4xl font-bold text-purple-400 mb-2">500+</div>
                <div class="text-sm text-gray-400">Hackers</div>
            </div>
            <div class="glass-card p-6 rounded-2xl text-center">
                <div class="text-4xl font-bold text-pink-400 mb-2">48h</div>
                <div class="text-sm text-gray-400">Hacking</div>
            </div>
            <div class="glass-card p-6 rounded-2xl text-center">
                <div class="text-4xl font-bold text-green-400 mb-2">20+</div>
                <div class="text-sm text-gray-400">Workshops</div>
            </div>
        </div>
    </main>

    <!-- Features / Tracks -->
    <section class="py-20 px-6 max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-5xl font-bold text-center mb-16">Tracks & Challenges</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div
                class="glass-card p-8 rounded-3xl relative overflow-hidden group hover:border-blue-500/50 transition duration-500">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="relative z-10 w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center text-blue-400 mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">AI & Machine Learning</h3>
                <p class="text-gray-400 leading-relaxed">Leverage the power of AI to solve complex problems and create
                    smart applications.</p>
            </div>

            <!-- Card 2 -->
            <div
                class="glass-card p-8 rounded-3xl relative overflow-hidden group hover:border-purple-500/50 transition duration-500">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-purple-600/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="relative z-10 w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center text-purple-400 mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Sustainability</h3>
                <p class="text-gray-400 leading-relaxed">Build green technologies that help preserve our planet and
                    promote sustainable living.</p>
            </div>

            <!-- Card 3 -->
            <div
                class="glass-card p-8 rounded-3xl relative overflow-hidden group hover:border-pink-500/50 transition duration-500">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-pink-600/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="relative z-10 w-12 h-12 bg-pink-500/20 rounded-xl flex items-center justify-center text-pink-400 mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Fintech</h3>
                <p class="text-gray-400 leading-relaxed">Reimagine the future of finance with blockchain, digital
                    payments, and secure systems.</p>
            </div>
        </div>
    </section>

    <footer class="border-t border-gray-800 mt-20 bg-gray-900/50 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-6 py-12 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-gray-400 text-sm">
                &copy; 2026 HackUdinus. All rights reserved.
            </div>
            <div class="flex gap-6">
                <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                    </svg></a>
                <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                    </svg></a>
            </div>
        </div>
    </footer>
</body>

</html>