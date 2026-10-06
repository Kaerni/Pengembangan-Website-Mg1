<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Keamanan akun</p>
            <h1 class="mt-1 text-xl font-semibold text-gray-900">Verifikasi email</h1>
        </div>
    </x-slot>
    <section class="max-w-2xl rounded-lg border border-gray-200 bg-white p-6 shadow-sm sm:p-8">
        <p class="text-sm leading-6 text-gray-600">Silakan verifikasi alamat email melalui tautan yang telah dikirim. Jika belum menerima email, minta pengiriman ulang di bawah ini.</p>
        @if (session('status') === 'verification-link-sent')
            <div role="status" class="mt-5 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">Tautan verifikasi baru telah dikirim.</div>
        @endif
        <form action="{{ route('verification.send') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Kirim ulang tautan verifikasi</button>
        </form>
    </section>
</x-app-layout>