<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $nama = auth()->user()->name;

        // Ambil data statistik dari database
        $totalUser = User::count();
        
        // Ambil 5 user pendaftaran terbaru
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('nama', 'totalUser', 'recentUsers'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10); 

        return view('admin.users', compact('users'));
    }
}