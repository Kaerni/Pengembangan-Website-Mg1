<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Pengaturan</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Profil akun</h1>
        </div>
    </x-slot>

    <div class="max-w-3xl space-y-6">
        <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
            <h2 class="text-base font-semibold text-gray-900">Informasi profil</h2>
            <p class="mt-1 text-sm text-gray-600">Perbarui nama dan alamat email akun Anda.</p>
            @if (session('status') === 'profile-updated')
                <div role="status" class="mt-5 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">Profil berhasil diperbarui.</div>
            @endif
            <form action="{{ route('profile.update') }}" method="POST" class="mt-6 space-y-5">
                @csrf
                @method('PATCH')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autocomplete="name" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600">
                    @error('name') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="email" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600">
                    @error('email') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Simpan perubahan</button>
            </form>
        </section>

        <section class="rounded-lg border border-red-200 bg-white p-6 shadow-sm sm:p-8">
            <h2 class="text-base font-semibold text-gray-900">Hapus akun</h2>
            <p class="mt-1 text-sm text-gray-600">Masukkan password untuk mengonfirmasi penghapusan akun.</p>
            <form action="{{ route('profile.destroy') }}" method="POST" class="mt-5 space-y-5">
                @csrf
                @method('DELETE')
                <div>
                    <label for="delete_password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="delete_password" name="password" type="password" required autocomplete="current-password" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-600 focus:ring-red-600">
                    @error('password', 'userDeletion') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="rounded-md border border-red-300 px-4 py-2.5 text-sm font-semibold text-red-700 transition hover:bg-red-50">Hapus akun</button>
            </form>
        </section>
    </div>
</x-app-layout>