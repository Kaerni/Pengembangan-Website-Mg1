<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'min:3', 'max:50', new Uppercase],
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',
            'age'      => 'nullable|numeric|min:17',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'Nama wajib diisi!',
            'email.required'     => 'Alamat email tidak boleh kosong!',
            'email.email'        => 'Format email tidak valid!',
            'password.required'  => 'Password harus diisi!',
            'password.confirmed' => 'Konfirmasi password tidak cocok!',
            'age.min'            => 'Umur minimal harus 17 tahun!'
        ];
    }
}