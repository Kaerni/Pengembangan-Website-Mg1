<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller
{
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);
        return "Data berhasil divalidasi!";
    }
}
