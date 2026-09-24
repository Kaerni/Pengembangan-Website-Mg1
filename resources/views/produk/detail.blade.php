@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="card p-4">
    <h3>Detail Data Produk</h3>
    <p class="fs-5">Menampilkan Data Produk dengan ID : <strong>{{ $id }}</strong></p>
</div>
@endsection