<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Uppercase implements ValidationRule
{
    /**
     * Jalankan aturan validasi.
     *
     * @param  string  $attribute  Nama field yang divalidasi (misal: 'name')
     * @param  mixed   $value      Isi inputan dari user
     * @param  \Closure(string, ?string): \Illuminate\Translation\PotentiallyTranslatedString  $fail  Fungsi untuk memicu pesan error
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Jika nilai tidak sama dengan versi kapitalnya, panggil $fail
        if (strtoupper($value) !== $value) {
            $fail(':attribute harus ditulis dalam huruf kapital.', null);
        }
    }
}