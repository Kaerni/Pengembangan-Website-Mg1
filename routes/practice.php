<?php

use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/uppercase', [UserController::class, 'showForm'])->name('uppercase.form');
Route::post('/uppercase', [UserController::class, 'submitForm'])->name('uppercase.submit');

Route::get('/produk/{id}', function ($id) {
    return 'Menampilkan data produk dengan ID: ' . $id;
});

Route::get('/produk/cari/{nama?}', function ($nama = null) {
    if ($nama) {
        return 'Hasil pencarian produk: ' . $nama;
    }

    return 'Silakan masukkan kata kunci pencarian pada URL (contoh: /produk/cari/sabun)';
});

Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {
        return 'Halaman Input Transaksi Penjualan (Kasir)';
    })->name('kasir.transaksi');
});

Route::get('/produk-toko', function () {
    return view('produk.index', ['produk' => Product::all()]);
});

Route::get('/suppliers', function () {
    return view('supplier.index', ['suppliers' => Supplier::all()]);
});

Route::get('/cek-user', function () {
    dd(DB::table('users')->get());
});

Route::get('/update-user', [UserController::class, 'updateNama']);
Route::get('/delete-user', [UserController::class, 'deleteUser']);

Route::get('/test-pluck', function () {
    dd(DB::table('users')->pluck('name', 'email'));
});

Route::get('/pluck', [UserController::class, 'pluck']);
Route::get('/agregat', [UserController::class, 'agregat']);
Route::get('/join-test', [UserController::class, 'joinExample']);
Route::get('/sorting-limit', [UserController::class, 'sortingLimit']);
Route::get('/subquery-test', [UserController::class, 'subqueryExample']);
Route::get('/raw-test', [UserController::class, 'rawQueryExample']);
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
Route::get('/validate-test', [UserController::class, 'showValidateForm']);
Route::post('/validate-test', [UserController::class, 'validateExample']);