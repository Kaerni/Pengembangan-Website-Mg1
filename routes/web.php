<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post_controller; // Posisi use ditaruh di paling atas

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [Post_controller::class, 'index']);