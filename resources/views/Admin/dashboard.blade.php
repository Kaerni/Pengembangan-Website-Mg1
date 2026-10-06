<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Minimarket / Admin</p>
                <h1 class="mt-1 text-xl font-semibold text-gray-900">Dashboard</h1>
            </div>
            <span class="rounded-md bg-emerald-50 px-3 py-1.5 text-sm font-medium text-emerald-800">Administrator</span>
        </div>
    </x-slot>

    <div class="space-y-6">
        <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
            <p class="text-sm font-medium text-gray-500">Selamat datang kembali,</p>
            <h2 class="mt-1 text-2xl font-semibold text-gray-900">{{ $nama }}</h2>
            <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-600">
                Ringkasan aktivitas dan pengguna terbaru minimarket Anda.
            </p>
        </section>

        <section aria-labelledby="summary-heading" class="grid gap-4 sm:grid-cols-2">
            <h2 id="summary-heading" class="sr-only">Ringkasan pengguna</h2>
            <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-gray-600">Total pengguna</p>
                <p class="mt-3 text-3xl font-semibold tabular-nums text-gray-900">{{ $totalUser }}</p>
                <p class="mt-2 text-sm text-gray-500">Akun yang terdaftar di sistem</p>
            </div>
        </section>

        <section aria-labelledby="recent-users-heading" class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-gray-200 px-5 py-4 sm:px-6">
                <div>
                    <h2 id="recent-users-heading" class="text-base font-semibold text-gray-900">Pengguna terbaru</h2>
                    <p class="mt-1 text-sm text-gray-500">Lima akun yang terakhir terdaftar.</p>
                </div>
                <a href="{{ route('admin.users') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">
                    Lihat semua pengguna <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                    <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
                        <tr>
                            <th scope="col" class="px-5 py-3 font-semibold sm:px-6">Nama</th>
                            <th scope="col" class="px-5 py-3 font-semibold sm:px-6">Email</th>
                            <th scope="col" class="whitespace-nowrap px-5 py-3 font-semibold sm:px-6">Tanggal terdaftar</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse ($recentUsers as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="whitespace-nowrap px-5 py-4 font-medium text-gray-900 sm:px-6">{{ $user->name }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-gray-600 sm:px-6">{{ $user->email }}</td>
                                <td class="whitespace-nowrap px-5 py-4 text-gray-600 sm:px-6">{{ $user->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-5 py-8 text-center text-sm text-gray-500 sm:px-6">
                                    Belum ada pengguna terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>