<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Uppercase implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Mengecek apakah string input TIDAK sama dengan versi KAPITAL-nya
        if (strtoupper($value) !== $value) {
            $fail('Kolom :attribute harus menggunakan huruf KAPITAL semua.');
        }
    }
}