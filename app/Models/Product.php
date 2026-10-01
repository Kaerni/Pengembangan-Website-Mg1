<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{// Relasi Kebalikan: Satu Produk DIMILIKI OLEH Satu Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}