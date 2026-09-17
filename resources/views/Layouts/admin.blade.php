<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Dark Premium (Warna dibuat gelap biar teks putihnya jelas!) -->
        <aside class="w-64 bg-slate-900 text-slate-100 flex flex-col justify-between shrink-0 shadow-xl border-r border-slate-800">
            <div>
                <!-- Header Brand/Logo -->
                <div class="h-16 flex items-center px-6 bg-slate-950 font-bold text-lg tracking-wide text-indigo-400 border-b border-slate-800">
                    <span class="mr-3 text-xl">🛒</span> MINIMARKET
                </div>

                <!-- Navigasi Utama -->
                <nav class="p-4 space-y-1.5">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-200' }}">
                        <span>📊</span> Dashboard
                    </a>

                    <a href="{{ route('admin.users') }}" 
                       class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.users') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-200' }}">
                        <span>👥</span> Kelola User
                    </a>
                </nav>
            </div>

            <!-- Profile Section (Pojok Bawah Sidebar) -->
            <div class="p-4 bg-slate-950/60 border-t border-slate-800">
                <div class="flex items-center justify-between mb-3 px-1">
                    <div class="overflow-hidden">
                        <p class="text-sm font-semibold text-slate-200 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] tracking-wider uppercase font-extrabold text-indigo-400">Administrator</p>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center justify-center gap-2 bg-red-500/10 hover:bg-red-600 text-red-400 hover:text-white py-2.5 rounded-lg text-xs font-semibold transition-all duration-200">
                        <span>🚪</span> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- Topbar Nav -->
            <header class="bg-white h-16 px-8 border-b border-gray-200 flex items-center justify-between sticky top-0 z-10 shadow-sm">
                <h1 class="text-xl font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
                <div class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1.5 rounded-full border border-gray-200">
                    🗓️ {{ date('d M Y') }}
                </div>
            </header>

            <!-- Isi Halaman Konten -->
            <main class="p-8">
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>