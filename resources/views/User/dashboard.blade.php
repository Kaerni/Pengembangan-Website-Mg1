<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pelanggan - Minimarket</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans text-slate-800 min-h-screen flex flex-col">

    <!-- Top Navigation Bar -->
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo & Menu Navigation -->
                <div class="flex items-center space-x-8">
                    <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2">
                        <div class="w-9 h-9 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold shadow-md shadow-indigo-500/20">
                            🛒
                        </div>
                        <span class="font-black text-xl tracking-tight bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">
                            MiniMart
                        </span>
                    </a>

                    <div class="hidden md:flex items-center space-x-1">
                        <a href="{{ route('user.dashboard') }}" class="px-3 py-2 rounded-lg text-sm font-semibold bg-indigo-50 text-indigo-600">Beranda</a>
                        <a href="#" class="px-3 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-all">Belanja</a>
                        <a href="#" class="px-3 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-all">Riwayat Transaksi</a>
                    </div>
                </div>

                <!-- User Profile & Action -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('user.profile') }}" class="flex items-center gap-3 p-1.5 rounded-full hover:bg-slate-100 transition-all">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 text-white font-semibold flex items-center justify-center text-xs shadow-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <span class="hidden sm:inline text-sm font-semibold text-slate-700">{{ Auth::user()->name }}</span>
                    </a>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all" title="Keluar">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1 w-full space-y-8">

        <!-- 1. Welcoming Hero Banner -->
        <div class="relative overflow-hidden bg-gradient-to-r from-indigo-600 via-indigo-700 to-violet-800 rounded-3xl p-8 md:p-10 text-white shadow-xl shadow-indigo-500/10">
            <div class="relative z-10 max-w-2xl space-y-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 backdrop-blur-md text-indigo-100 border border-white/10">
                    ✨ Member Reguler
                </span>
                <h1 class="text-3xl md:text-4xl font-black tracking-tight leading-tight">
                    Selamat Datang Kembali, <br><span class="text-indigo-200">{{ Auth::user()->name }}!</span>
                </h1>
                <p class="text-indigo-100/80 text-sm md:text-base">
                    Nikmati kemudahan belanja kebutuhan harianmu dengan promo eksklusif untuk member terdaftar.
                </p>
                <div class="pt-2 flex flex-wrap gap-3">
                    <a href="#katalog" class="px-5 py-2.5 rounded-xl bg-white text-indigo-600 font-bold text-sm shadow-md hover:bg-indigo-50 transition-all">
                        Mulai Belanja
                    </a>
                </div>
            </div>
            
            <!-- Background Decorative Circles -->
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute right-40 -top-20 w-48 h-48 bg-purple-500/20 rounded-full blur-xl pointer-events-none"></div>
        </div>

        <!-- 2. Ringkasan Poin / Status Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <!-- Card Poin -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between hover:border-indigo-200 transition-all">
                <div class="space-y-1">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Poin</p>
                    <p class="text-2xl font-black text-slate-800">1.250 <span class="text-xs font-normal text-slate-500">PTS</span></p>
                </div>
                <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-500 text-xl font-bold">
                    🪙
                </div>
            </div>

            <!-- Card Transaksi Bulan Ini -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between hover:border-indigo-200 transition-all">
                <div class="space-y-1">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pesanan Aktif</p>
                    <p class="text-2xl font-black text-slate-800">2 <span class="text-xs font-normal text-slate-500">Item</span></p>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-500 text-xl font-bold">
                    📦
                </div>
            </div>

            <!-- Card Voucher Hemat -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between hover:border-indigo-200 transition-all sm:col-span-2 lg:col-span-1">
                <div class="space-y-1">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Voucher Saya</p>
                    <p class="text-2xl font-black text-slate-800">4 <span class="text-xs font-normal text-slate-500">Tersedia</span></p>
                </div>
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-500 text-xl font-bold">
                    🎟️
                </div>
            </div>
        </div>

        <!-- 3. Section Promo & Rekomendasi Produk -->
        <div id="katalog" class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Produk Populer</h2>
                    <p class="text-xs text-slate-500">Pilihan favorit dari minimarket kami minggu ini</p>
                </div>
                <a href="#" class="text-xs font-bold text-indigo-600 hover:text-indigo-700">Lihat Semua →</a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Item Product 1 -->
                <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-full h-36 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-4xl group-hover:scale-105 transition-transform">
                        🥤
                    </div>
                    <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-full">Minuman</span>
                    <h3 class="text-sm font-bold text-slate-800 mt-1 line-clamp-1">Susu UHT Cokelat 1L</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Rp 18.500</p>
                    <button class="w-full mt-3 py-2 bg-slate-900 hover:bg-indigo-600 text-white rounded-xl text-xs font-semibold transition-colors">
                        + Keranjang
                    </button>
                </div>

                <!-- Item Product 2 -->
                <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-full h-36 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-4xl group-hover:scale-105 transition-transform">
                        🍞
                    </div>
                    <span class="text-[10px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full">Roti & Bakery</span>
                    <h3 class="text-sm font-bold text-slate-800 mt-1 line-clamp-1">Roti Tawar Gandum</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Rp 15.000</p>
                    <button class="w-full mt-3 py-2 bg-slate-900 hover:bg-indigo-600 text-white rounded-xl text-xs font-semibold transition-colors">
                        + Keranjang
                    </button>
                </div>

                <!-- Item Product 3 -->
                <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-full h-36 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-4xl group-hover:scale-105 transition-transform">
                        🍿
                    </div>
                    <span class="text-[10px] font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full">Camilan</span>
                    <h3 class="text-sm font-bold text-slate-800 mt-1 line-clamp-1">Keripik Kentang Keju</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Rp 11.200</p>
                    <button class="w-full mt-3 py-2 bg-slate-900 hover:bg-indigo-600 text-white rounded-xl text-xs font-semibold transition-colors">
                        + Keranjang
                    </button>
                </div>

                <!-- Item Product 4 -->
                <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-full h-36 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-4xl group-hover:scale-105 transition-transform">
                        ☕
                    </div>
                    <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-full">Minuman</span>
                    <h3 class="text-sm font-bold text-slate-800 mt-1 line-clamp-1">Kopi Instan Premium</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Rp 24.000</p>
                    <button class="w-full mt-3 py-2 bg-slate-900 hover:bg-indigo-600 text-white rounded-xl text-xs font-semibold transition-colors">
                        + Keranjang
                    </button>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer Simple -->
    <footer class="bg-white border-t border-slate-200/80 py-6 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} MiniMart Application. Hak Cipta Dilindungi.
    </footer>

</body>
</html>