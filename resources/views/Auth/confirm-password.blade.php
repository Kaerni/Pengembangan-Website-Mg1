<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Keamanan akun</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Konfirmasi password</h1>
        </div>
    </x-slot>
    <section class="max-w-xl rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
        <p class="text-sm text-gray-600">Masukkan password untuk melanjutkan.</p>
        @error('password') <p role="alert" class="mt-4 text-sm text-red-700">{{ $message }}</p> @enderror
        <form action="{{ route('password.confirm') }}" method="POST" class="mt-6 space-y-5">
            @csrf
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required autofocus autocomplete="current-password" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600">
            </div>
            <button type="submit" class="rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Konfirmasi</button>
        </form>
    </section>
</x-app-layout>