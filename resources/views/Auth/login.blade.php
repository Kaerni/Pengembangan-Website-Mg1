<x-guest-layout>
    <section class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
        <div class="mb-7">
            <p class="text-sm font-semibold text-emerald-700">Selamat datang kembali</p>
            <h1 class="mt-1 text-2xl font-semibold text-gray-900">Masuk ke akun</h1>
            <p class="mt-2 text-sm text-gray-600">Gunakan email dan password akun minimarket Anda.</p>
        </div>

        @if ($errors->any())
            <div role="alert" class="mb-5 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600">
                @error('email') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
            </div>
            <div>
                <div class="flex items-center justify-between gap-3">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-emerald-700 hover:text-emerald-900">Lupa password?</a>
                </div>
                <input type="password" name="password" id="password" required autocomplete="current-password" class="mt-1.5 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-600 focus:ring-emerald-600">
                @error('password') <p class="mt-1 text-sm text-red-700">{{ $message }}</p> @enderror
            </div>
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-emerald-700 shadow-sm focus:ring-emerald-600">
                Ingat saya
            </label>
            <button type="submit" class="inline-flex w-full items-center justify-center rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:ring-offset-2">Masuk</button>
        </form>
        <p class="mt-6 text-center text-sm text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-emerald-700 hover:text-emerald-900">Daftar</a></p>
    </section>
</x-guest-layout>