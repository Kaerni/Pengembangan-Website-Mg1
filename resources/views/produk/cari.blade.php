@extends('layouts.app')

@section('title', 'Pencarian Produk')

@section('content')
<div class="card p-4">
    <h3>Pencarian Produk</h3>
    @if(isset($nama) && $nama)
        <p class="fs-5">Hasil Pencarian Produk : <strong>{{ $nama }}</strong></p>
    @else
        <div class="alert alert-warning">Silakan masukkan kata kunci pencarian pada URL.</div>
    @endif
</div>
@endsection