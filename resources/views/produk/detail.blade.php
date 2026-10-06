<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Katalog</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Detail produk</h1>
        </div>
    </x-slot>

    <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
        <p class="text-sm text-gray-500">ID produk</p>
        <p class="mt-1 text-xl font-semibold text-gray-900">{{ $id }}</p>
    </section>
</x-app-layout>