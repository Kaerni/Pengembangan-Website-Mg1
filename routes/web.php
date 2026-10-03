<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return auth()->user()->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/produk', function () {
            return view('produk.index', ['produk' => Product::all()]);
        })->name('produk');
        Route::get('/kategori', function () {
            return view('admin.categories', ['categories' => Category::all()]);
        })->name('kategori');
    });

    Route::middleware('role:user')->get('/minimarket', function () {
        return view('kasir.dashboard', [
            'nama_pegawai' => auth()->user()->name,
            'shift' => 'Kasir Aktif',
        ]);
    })->name('user.dashboard');

    Route::middleware('role:admin,user')->get('/laporan', LaporanPenjualanController::class)
        ->name('laporan');

    Route::middleware('role:admin,user')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/practice.php';