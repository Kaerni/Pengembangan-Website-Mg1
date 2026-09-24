<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- Pastikan ini ter-import
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; // <-- TAMBAHKAN BARIS INI

    protected $fillable = ['category_id', 'name', 'sku', 'price', 'stock'];
}