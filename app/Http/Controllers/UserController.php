<?php

namespace App\Http\Controllers;

use App\Rules\Uppercase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
  public function showForm(): View
  {
    return view('user.uppercase');
  }

  public function submitForm(Request $request): RedirectResponse
  {
    $validated = $request->validate([
      'nama' => ['required', 'string', 'min:3', new Uppercase],
    ], [
      'nama.required' => 'Nama wajib diisi.',
      'nama.min' => 'Nama minimal terdiri dari 3 karakter.',
    ]);

    return redirect()
      ->route('uppercase.form')
      ->with('success', 'Validasi berhasil. Nama ' . $validated['nama'] . ' sudah menggunakan huruf kapital.');
  }
}