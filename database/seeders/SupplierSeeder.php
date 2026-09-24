<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier; // <-- Tambahkan baris ini

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'PT. Indofood Sukses Makmur',
                'phone' => '021-57958822',
                'address' => 'Jl. Jend. Sudirman Plaza Indofood, Jakarta Selatan'
            ],
            [
                'name' => 'PT. Unilever Indonesia Tbk',
                'phone' => '021-80827000',
                'address' => 'BSD Green Office Park, Tangerang'
            ],
            [
                'name' => 'PT. Mayora Indah Tbk',
                'phone' => '021-80637000',
                'address' => 'Jl. Tomang Raya No. 21, Jakarta Barat'
            ],
        ];

        foreach ($suppliers as $data) {
            Supplier::create($data);
        }
    }
}