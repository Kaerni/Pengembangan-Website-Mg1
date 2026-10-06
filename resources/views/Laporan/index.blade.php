<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Analisis</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Laporan penjualan</h1>
        </div>
    </x-slot>

    <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
        <h2 class="text-base font-semibold text-gray-900">Ringkasan penjualan</h2>
        <p class="mt-2 text-sm leading-6 text-gray-600">Laporan transaksi akan ditampilkan di halaman ini.</p>
        <div class="mt-6 rounded-md border border-dashed border-gray-300 bg-gray-50 px-5 py-10 text-center text-sm text-gray-500">
            Belum ada data transaksi untuk dilaporkan.
        </div>
    </section>
</x-app-layout>