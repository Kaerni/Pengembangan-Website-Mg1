<x-guest-layout>
    <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
        <p class="text-sm font-semibold text-emerald-700">Pemulihan akun</p>
        <h1 class="mt-1 text-2xl font-semibold text-gray-900">Buat password baru</h1>
        @if ($errors->any())
            <div role="alert" class="mt-5 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('password.store') }}" method="POST" class="mt-6 space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="email" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password baru</label>
                <input id="password" name="password" type="password" required autocomplete="new-password" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi password baru</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600">
            </div>
            <button type="submit" class="inline-flex w-full items-center justify-center rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Simpan password</button>
        </form>
    </section>
</x-guest-layout>