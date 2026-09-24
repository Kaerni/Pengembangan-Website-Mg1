<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function submitForm(Request $request)
    {
        return "Data berhasil divalidasi!";
    }
}