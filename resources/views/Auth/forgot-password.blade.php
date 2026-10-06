<x-guest-layout>
    <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
        <p class="text-sm font-semibold text-emerald-700">Pemulihan akun</p>
        <h1 class="mt-1 text-2xl font-semibold text-gray-900">Lupa password?</h1>
        <p class="mt-2 text-sm leading-6 text-gray-600">Masukkan email akun untuk menerima tautan reset password.</p>

        @if (session('status'))
            <div role="status" class="mt-5 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">{{ session('status') }}</div>
        @endif
        @error('email')
            <div role="alert" class="mt-5 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">{{ $message }}</div>
        @enderror

        <form action="{{ route('password.email') }}" method="POST" class="mt-6 space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600">
            </div>
            <button type="submit" class="inline-flex w-full items-center justify-center rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Kirim tautan reset</button>
        </form>
        <p class="mt-6 text-center text-sm"><a href="{{ route('login') }}" class="font-semibold text-emerald-700 hover:text-emerald-900">Kembali ke halaman masuk</a></p>
    </section>
</x-guest-layout>