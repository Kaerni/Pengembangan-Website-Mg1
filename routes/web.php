<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/login', [LoginController::class, 'showForm'])->name('login.show');
Route::post('/login', [LoginController::class, 'submitForm'])->name('login.submit');

Route::get('/uppercase', [UserController::class, 'showForm'])->name('uppercase.form');
Route::post('/uppercase', [UserController::class, 'submitForm'])->name('uppercase.submit');

Route::get('/', function () {
    return view('kasir.dashboard', [
        'nama_pegawai' => 'Budi Santoso',
        'shift' => 'Pagi (08:00 - 15:00)'
    ]);
});

// Rute dengan Parameter Wajib
Route::get('/produk/{id}', function ($id) {
    return 'Menampilkan data produk dengan ID: ' . $id;
});

// Rute dengan Parameter Opsional
Route::get('/produk/cari/{nama?}', function ($nama = null) {
    if ($nama) {
        return 'Hasil pencarian produk: ' . $nama;
    }
    return 'Silakan masukkan kata kunci pencarian pada URL (contoh: /produk/cari/sabun)';
});

// Langkah 2: Group Rute Admin
Route::prefix('admin')->group(function () {
    Route::get('/produk', function () {
        return 'Halaman Kelola Produk (Hanya Admin)';
    })->name('admin.produk');

    Route::get('/kategori', function () {
        return 'Halaman Kelola Kategori Produk (Hanya Admin)';
    })->name('admin.kategori');
});

// Langkah 2: Group Rute Kasir
Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {
        return 'Halaman Input Transaksi Penjualan (Kasir)';
    })->name('kasir.transaksi');
});

Route::get('/produk-toko', function () {
    $produk = Product::all(); // Mengambil seluruh data produk dari tabel products
    return view('produk.index', compact('produk'));
});

Route::get('/suppliers', function () {
    $suppliers = Supplier::all();
    return view('supplier.index', compact('suppliers'));
});