<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Jalankan Seeder Kategori terlebih dahulu
        $this->call(CategorySeeder::class);

        // 2. Jalankan Seeder Supplier (Tugas Mandiri)
        $this->call(SupplierSeeder::class);

        // 3. Jalankan Factory Produk untuk membuat 50 data dummy produk
        Product::factory(50)->create();
    }
}