@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard Utama')

@section('content')
    <!-- Banner Selamat Datang -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-6 text-white shadow-md mb-8">
        <h2 class="text-2xl font-bold mb-1">Selamat Datang Kembali, {{ Auth::user()->name }}! 👋</h2>
        <p class="text-indigo-100 text-sm">Berikut ringkasan statistik toko minimarket kamu hari ini.</p>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total User</p>
                <p class="text-3xl font-black text-gray-800 mt-1">12</p>
            </div>
            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center text-xl">
                👥
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Penjualan Hari Ini</p>
                <p class="text-3xl font-black text-gray-800 mt-1">Rp 450.000</p>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-xl">
                💰
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Stok Produk</p>
                <p class="text-3xl font-black text-gray-800 mt-1">128 Pcs</p>
            </div>
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center text-xl">
                📦
            </div>
        </div>
    </div>
@endsection