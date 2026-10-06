<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Operasional</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Dashboard kasir</h1>
        </div>
    </x-slot>

    <div class="space-y-6">
        <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
            <p class="text-sm font-medium text-gray-500">Shift aktif</p>
            <h2 class="mt-1 text-2xl font-semibold text-gray-900">Halo, {{ $nama_pegawai }}</h2>
            <p class="mt-2 text-sm text-gray-600">{{ $shift }} · Toko Mandiri</p>
        </section>

        <section class="rounded-lg border border-emerald-200 bg-emerald-50 p-5 sm:p-6">
            <h2 class="text-base font-semibold text-emerald-950">Ringkasan hari ini</h2>
            <p class="mt-2 text-sm text-emerald-900">Kasir aktif. Jumlah transaksi hari ini: 0.</p>
        </section>

        <a href="{{ url('/produk-toko') }}" class="inline-flex items-center rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Lihat daftar produk</a>
    </div>
</x-app-layout>