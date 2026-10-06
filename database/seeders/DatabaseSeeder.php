<?php

namespace Database\Seeders;

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
        // 1. Jalankan Seeder User (TAMBAHKAN BARIS INI)
        $this->call(UsersTableSeeder::class);

        // 2. Jalankan Seeder Kategori terlebih dahulu
        $this->call(CategorySeeder::class);

        // 3. Jalankan Seeder Supplier (Tugas Mandiri)
        $this->call(SupplierSeeder::class);

        // 4. Isi katalog produk minimarket
        $this->call(ProductSeeder::class);
    }
}