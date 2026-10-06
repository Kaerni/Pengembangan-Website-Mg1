<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Katalog</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Kategori produk</h1>
        </div>
    </x-slot>

    <section class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
        @if ($categories->isEmpty())
            <div class="px-6 py-14 text-center">
                <h2 class="text-base font-semibold text-gray-900">Belum ada kategori</h2>
                <p class="mt-1 text-sm text-gray-500">Kategori produk akan tampil di halaman ini setelah tersedia.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                    <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
                        <tr>
                            <th scope="col" class="w-20 px-5 py-3 font-semibold sm:px-6">No.</th>
                            <th scope="col" class="px-5 py-3 font-semibold sm:px-6">Nama kategori</th>
                            <th scope="col" class="px-5 py-3 font-semibold sm:px-6">Slug</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-4 text-gray-500 sm:px-6">{{ $loop->iteration }}</td>
                                <td class="px-5 py-4 font-medium text-gray-900 sm:px-6">{{ $category->name }}</td>
                                <td class="px-5 py-4 text-gray-600 sm:px-6">{{ $category->slug }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</x-app-layout>