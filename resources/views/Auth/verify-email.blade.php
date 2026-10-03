@extends('layouts.app')

@section('title', 'Verifikasi Email')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card p-4">
            <h2 class="mb-3">Verifikasi Email</h2>
            <p>Silakan verifikasi alamat email melalui tautan yang telah dikirim. Jika belum menerima email, minta pengiriman ulang di bawah ini.</p>

            @if (session('status') === 'verification-link-sent')
                <div class="alert alert-success">Tautan verifikasi baru telah dikirim.</div>
            @endif

            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Kirim Ulang Tautan Verifikasi</button>
            </form>
        </div>
    </div>
</div>
@endsection