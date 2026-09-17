<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanPenjualanController;

// 1. Tampilan Form Login
Route::get('/', [AuthController::class, 'create'])->name('login');

// 2. Proses Submit Form Login (PASTIKAN URL-NYA SAMA '/')
Route::post('/', [AuthController::class, 'store']); 

// 3. Process Logout
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

// 4. Route Group Admin (Ditambah name & middleware role)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/kelola-user', [AdminController::class, 'users'])->name('admin.users');
});

// 5. Route Group User (Ditambah name & middleware role)
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
});

// 6. Route untuk Laporan Penjualan (Menggunakan Controller __invoke)
Route::get('/laporan', LaporanPenjualanController::class);