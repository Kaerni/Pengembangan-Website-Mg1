<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Katalog</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Pencarian produk</h1>
        </div>
    </x-slot>

    <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
        @if (isset($nama) && $nama)
            <p class="text-sm text-gray-600">Hasil pencarian untuk</p>
            <h2 class="mt-1 text-xl font-semibold text-gray-900">{{ $nama }}</h2>
        @else
            <h2 class="text-base font-semibold text-gray-900">Masukkan kata kunci</h2>
            <p class="mt-2 text-sm text-gray-600">Tambahkan kata kunci pada alamat pencarian produk.</p>
        @endif
    </section>
</x-app-layout>