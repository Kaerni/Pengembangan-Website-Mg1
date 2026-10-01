<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/cek-user', function () {
    $users = DB::table('users')->get();
    dd($users);
});

Route::get('/update-user', [UserController::class, 'updateNama']);

Route::get('/delete-user', [UserController::class, 'deleteUser']);

Route::get('/test-pluck', function () {
    $users = DB::table('users')->pluck('name', 'email');

    dd($users);
});

Route::get('/pluck', [UserController::class, 'pluck']);

Route::get('/agregat', [UserController::class, 'agregat']);

Route::get('/join-test', [UserController::class, 'joinExample']);

Route::get('/sorting-limit', [UserController::class, 'sortingLimit']);

Route::get('/subquery-test', [UserController::class, 'subqueryExample']);

Route::get('/raw-test', [UserController::class, 'rawQueryExample']);

//eloquent ORM
Route::get('/eloquent-create', [UserController::class, 'storeEloquent']);

Route::get('/eloquent-save', [UserController::class, 'storeSave']);

Route::get('/eloquent-get', [UserController::class, 'getEloquentData']);

Route::get('/eloquent-update', [UserController::class, 'updateEloquent']);

Route::get('/eloquent-delete', [UserController::class, 'deleteEloquent']);

Route::get('/eloquent-conditional', [UserController::class, 'conditionalEloquent']);

Route::get('/eloquent-relation', [UserController::class, 'testRelation']);

Route::get('/test-mutator-accessor', [UserController::class, 'testMutatorAccessor']);

Route::get('/soft-delete-test', [UserController::class, 'testSoftDelete']);

Route::get('/mass-assignment-test', [UserController::class, 'testMassAssignment']);

Route::get('/scope-test', [UserController::class, 'testQueryScope']);

//validate
Route::get('/validate-test', [UserController::class, 'showValidateForm']);
Route::post('/validate-test', [UserController::class, 'validateExample']);