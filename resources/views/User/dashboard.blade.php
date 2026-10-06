<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Operasional</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Dashboard kasir</h1>
        </div>
    </x-slot>

    <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
        <h2 class="text-lg font-semibold text-gray-900">POS Toko Kelontong</h2>
        <p class="mt-2 text-sm leading-6 text-gray-600">Selamat datang di halaman transaksi minimarket.</p>
        <a href="{{ route('kasir.transaksi') }}" class="mt-5 inline-flex items-center rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Mulai transaksi</a>
    </section>
</x-app-layout>