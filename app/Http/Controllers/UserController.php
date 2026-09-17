<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $nama = auth()->user()->name;

        return view('user.dashboard', compact('nama'));
    }

    public function profile()
    {
        $user = auth()->user();

        return view('user.profile', compact('user'));
    }
}