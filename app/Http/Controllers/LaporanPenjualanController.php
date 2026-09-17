<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function __invoke()
    {
        $bulan = "Oktober 2025";

        $statistik = [
            'total_transaksi' => 128,
            'total_pendapatan' => 45750000,
            'produk_terlaris'  => 'Mouse Wireless',
            'rata_rata_transaksi' => 357421,
        ];

        $penjualanPerKategori = [
            ['kategori' => 'Elektronik', 'jumlah' => 78, 'pendapatan' => 32500000],
            ['kategori' => 'Aksesoris', 'jumlah' => 35, 'pendapatan' => 8250000],
            ['kategori' => 'Lainnya', 'jumlah' => 15, 'pendapatan' => 5000000],
        ];

        return view('laporan.index', compact('bulan', 'statistik', 'penjualanPerKategori'));
    }
}