<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman/view login
    public function create()
    {
        return view('auth.login'); 
    }

    // Memproses data formulir login
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Jalankan proses autentikasi
        $request->authenticate();

        // 2. Regenerasi session demi keamanan
        $request->session()->regenerate();

        // 3. Pengecekan Role & Redirect (Pakai redirect biasa, bukan intended)
        if ($request->user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/user/dashboard');
    }

    // Memproses Logout
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Mengarahkan ke halaman utama/login
        return redirect()->route('login');
    }
}