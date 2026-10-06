<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Minimarket | Akun</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 font-sans text-gray-900 antialiased">
    <main class="grid min-h-screen lg:grid-cols-[minmax(0,1fr)_minmax(26rem,0.9fr)]">
        <section class="relative hidden overflow-hidden bg-emerald-950 p-12 text-white lg:flex lg:flex-col lg:justify-between">
            <a href="{{ route('login') }}" class="flex items-center gap-3 text-lg font-bold">
                <span class="flex size-10 items-center justify-center rounded-md bg-lime-300 text-base text-emerald-950">M</span>
                Minimarket
            </a>
            <div class="relative max-w-xl">
                <p class="text-sm font-semibold uppercase tracking-wider text-lime-300">Operasional toko</p>
                <h1 class="mt-4 text-4xl font-semibold leading-tight">Kelola toko dengan lebih teratur.</h1>
                <p class="mt-4 max-w-md text-base leading-7 text-emerald-100">Satu tempat untuk mengelola produk, pengguna, dan aktivitas minimarket.</p>
            </div>
            <p class="text-sm text-emerald-200">Sistem Point of Sale Minimarket</p>
        </section>
        <section class="flex items-center justify-center px-4 py-10 sm:px-8">
            <div class="w-full max-w-md">
                <a href="{{ route('login') }}" class="mb-8 flex items-center justify-center gap-2 text-lg font-bold text-gray-900 lg:hidden">
                    <span class="flex size-8 items-center justify-center rounded-md bg-emerald-700 text-sm text-white">M</span>
                    Minimarket
                </a>
                {{ $slot }}
            </div>
        </section>
    </main>
</body>
</html>