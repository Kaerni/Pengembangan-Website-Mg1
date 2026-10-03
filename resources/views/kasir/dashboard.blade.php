@extends('layouts.app')

@section('title', 'Minimarket - Kasir')

@section('content')
<div class="card p-4">
    <h2>Sistem Point of Sale - Toko Mandiri</h2>
    <hr>
    <h4>Selamat datang, <strong>{{ $nama_pegawai }}</strong>!</h4>
    <p class="text-muted">Status shift: <strong>{{ $shift }}</strong></p>

    <div class="alert alert-info mt-3">
        <h5>Ringkasan Hari Ini</h5>
        <p class="mb-0">Kasir aktif. Jumlah transaksi hari ini: 0.</p>
    </div>

    <a href="{{ url('/produk-toko') }}" class="btn btn-primary align-self-start">Lihat Daftar Produk Toko</a>
</div>
@endsection