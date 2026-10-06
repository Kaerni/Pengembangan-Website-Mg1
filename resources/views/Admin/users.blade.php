<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Administrasi</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Pengguna</h1>
        </div>
    </x-slot>

    <section class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-gray-200 px-5 py-4 sm:px-6">
            <div>
                <h2 class="text-base font-semibold text-gray-900">Akun terdaftar</h2>
                <p class="mt-1 text-sm text-gray-500">Kelola dan tinjau akun pengguna minimarket.</p>
            </div>
            <span class="text-sm text-gray-500">{{ $users->total() }} akun</span>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
                    <tr>
                        <th scope="col" class="w-16 px-5 py-3 font-semibold sm:px-6">No.</th>
                        <th scope="col" class="px-5 py-3 font-semibold sm:px-6">Nama</th>
                        <th scope="col" class="px-5 py-3 font-semibold sm:px-6">Email</th>
                        <th scope="col" class="px-5 py-3 font-semibold sm:px-6">Role</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4 text-gray-500 sm:px-6">{{ $users->firstItem() + $loop->index }}</td>
                            <td class="whitespace-nowrap px-5 py-4 font-medium text-gray-900 sm:px-6">{{ $user->name }}</td>
                            <td class="whitespace-nowrap px-5 py-4 text-gray-600 sm:px-6">{{ $user->email }}</td>
                            <td class="px-5 py-4 sm:px-6">
                                <span @class(['inline-flex rounded-full px-2.5 py-1 text-xs font-semibold', 'bg-emerald-50 text-emerald-800' => $user->role === 'admin', 'bg-gray-100 text-gray-700' => $user->role !== 'admin'])>{{ ucfirst($user->role) }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-10 text-center text-sm text-gray-500 sm:px-6">Belum ada akun pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($users->hasPages())
            <div class="border-t border-gray-200 px-5 py-4 sm:px-6">{{ $users->links() }}</div>
        @endif
    </section>
</x-app-layout>