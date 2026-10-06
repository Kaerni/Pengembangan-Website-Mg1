<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Katalog</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Supplier</h1>
        </div>
    </x-slot>

    <section class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
        <div class="border-b border-gray-200 px-5 py-4 sm:px-6">
            <h2 class="text-base font-semibold text-gray-900">Daftar supplier</h2>
            <p class="mt-1 text-sm text-gray-500">Informasi mitra pemasok toko.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
                    <tr>
                        <th scope="col" class="w-16 px-5 py-3 font-semibold sm:px-6">No.</th>
                        <th scope="col" class="px-5 py-3 font-semibold sm:px-6">Nama supplier</th>
                        <th scope="col" class="px-5 py-3 font-semibold sm:px-6">No. telepon</th>
                        <th scope="col" class="px-5 py-3 font-semibold sm:px-6">Alamat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($suppliers as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4 text-gray-500 sm:px-6">{{ $index + 1 }}</td>
                            <td class="whitespace-nowrap px-5 py-4 font-medium text-gray-900 sm:px-6">{{ $item->name }}</td>
                            <td class="whitespace-nowrap px-5 py-4 text-gray-600 sm:px-6">{{ $item->phone }}</td>
                            <td class="min-w-56 px-5 py-4 text-gray-600 sm:px-6">{{ $item->address }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-5 py-10 text-center text-sm text-gray-500 sm:px-6">Belum ada supplier yang tersedia.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>