<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        $nama = auth()->user()->name;

        return view('admin.dashboard', compact('nama'));
    }

    public function users()
    {
        $users = \App\Models\User::all();

        return view('admin.users', compact('users'));
    }
}