<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Minimarket | Point of Sale</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">
    <div class="min-h-screen bg-gray-100">
        <nav class="border-b border-gray-200 bg-white">
            <div class="mx-auto flex min-h-16 max-w-7xl items-center justify-between gap-6 px-4 sm:px-6 lg:px-8">
                <div class="flex min-w-0 items-center gap-8">
                    <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="flex shrink-0 items-center gap-2 text-lg font-bold text-gray-900">
                        <span class="flex size-8 items-center justify-center rounded-md bg-emerald-700 text-sm font-bold text-white">M</span>
                        Minimarket
                    </a>
                    <div class="hidden items-center gap-5 sm:flex">
                        @auth
                            @if (auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" @class(['text-sm font-medium transition', 'text-emerald-800' => request()->routeIs('admin.dashboard'), 'text-gray-600 hover:text-gray-900' => !request()->routeIs('admin.dashboard')])>Dashboard</a>
                                <a href="{{ route('admin.produk') }}" @class(['text-sm font-medium transition', 'text-emerald-800' => request()->routeIs('admin.produk'), 'text-gray-600 hover:text-gray-900' => !request()->routeIs('admin.produk')])>Produk</a>
                                <a href="{{ route('admin.kategori') }}" @class(['text-sm font-medium transition', 'text-emerald-800' => request()->routeIs('admin.kategori'), 'text-gray-600 hover:text-gray-900' => !request()->routeIs('admin.kategori')])>Kategori</a>
                                <a href="{{ route('admin.users') }}" @class(['text-sm font-medium transition', 'text-emerald-800' => request()->routeIs('admin.users'), 'text-gray-600 hover:text-gray-900' => !request()->routeIs('admin.users')])>Pengguna</a>
                            @else
                                <a href="{{ route('user.dashboard') }}" @class(['text-sm font-medium transition', 'text-emerald-800' => request()->routeIs('user.dashboard'), 'text-gray-600 hover:text-gray-900' => !request()->routeIs('user.dashboard')])>Dashboard</a>
                                <a href="{{ route('kasir.transaksi') }}" @class(['text-sm font-medium transition', 'text-emerald-800' => request()->routeIs('kasir.transaksi'), 'text-gray-600 hover:text-gray-900' => !request()->routeIs('kasir.transaksi')])>Transaksi</a>
                            @endif
                            <a href="{{ route('laporan') }}" @class(['text-sm font-medium transition', 'text-emerald-800' => request()->routeIs('laporan'), 'text-gray-600 hover:text-gray-900' => !request()->routeIs('laporan')])>Laporan</a>
                            <a href="{{ route('profile.edit') }}" @class(['text-sm font-medium transition', 'text-emerald-800' => request()->routeIs('profile.*'), 'text-gray-600 hover:text-gray-900' => !request()->routeIs('profile.*')])>Profil</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 transition hover:text-gray-900">Masuk</a>
                            <a href="{{ route('register') }}" class="text-sm font-medium text-gray-600 transition hover:text-gray-900">Daftar</a>
                        @endauth
                    </div>
                </div>
                <div class="flex shrink-0 items-center gap-4">
                    @auth
                        <span class="hidden text-sm text-gray-600 sm:inline">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-md border border-gray-300 px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md bg-emerald-700 px-3 py-2 text-sm font-semibold text-white transition hover:bg-emerald-800">Masuk</a>
                    @endauth
                </div>
            </div>
            <div class="flex gap-x-5 gap-y-2 overflow-x-auto border-t border-gray-100 px-4 py-3 sm:hidden">
                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Dashboard</a>
                        <a href="{{ route('admin.produk') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Produk</a>
                        <a href="{{ route('admin.kategori') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Kategori</a>
                        <a href="{{ route('admin.users') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Pengguna</a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Dashboard</a>
                        <a href="{{ route('kasir.transaksi') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Transaksi</a>
                    @endif
                    <a href="{{ route('laporan') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Laporan</a>
                    <a href="{{ route('profile.edit') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Profil</a>
                @else
                    <a href="{{ route('login') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Masuk</a>
                    <a href="{{ route('register') }}" class="whitespace-nowrap text-sm font-medium text-gray-700">Daftar</a>
                @endauth
            </div>
        </nav>

        @isset($header)
            <header class="border-b border-gray-200 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="py-8">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>