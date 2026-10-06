<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['Makanan', 'MKN-0001', 'Mi instan goreng', 3500, 48],
            ['Makanan', 'MKN-0002', 'Mi instan rasa soto', 3500, 36],
            ['Makanan', 'MKN-0003', 'Beras premium 5 kg', 72000, 15],
            ['Makanan', 'MKN-0004', 'Gula pasir 1 kg', 17500, 22],
            ['Makanan', 'MKN-0005', 'Tepung terigu 1 kg', 13500, 18],
            ['Makanan', 'MKN-0006', 'Minyak goreng 1 liter', 18500, 24],
            ['Makanan', 'MKN-0007', 'Roti tawar kupas', 16500, 12],
            ['Minuman', 'MNM-0001', 'Air mineral 600 ml', 4000, 60],
            ['Minuman', 'MNM-0002', 'Teh melati botol 450 ml', 5500, 32],
            ['Minuman', 'MNM-0003', 'Susu UHT cokelat 250 ml', 7000, 28],
            ['Minuman', 'MNM-0004', 'Kopi instan original', 1500, 80],
            ['Minuman', 'MNM-0005', 'Minuman jeruk 350 ml', 5000, 30],
            ['Kebutuhan Rumah Tangga', 'RTG-0001', 'Sabun mandi  skin care 90 g', 5000, 26],
            ['Kebutuhan Rumah Tangga', 'RTG-0002', 'Sampo anti ketombe 170 ml', 24500, 14],
            ['Kebutuhan Rumah Tangga', 'RTG-0003', 'Deterjen bubuk 800 g', 18500, 20],
            ['Kebutuhan Rumah Tangga', 'RTG-0004', 'Pasta gigi mint 120 g', 14500, 17],
            ['Kebutuhan Rumah Tangga', 'RTG-0005', 'Tisu wajah 200 lembar', 11500, 21],
            ['Kebutuhan Rumah Tangga', 'RTG-0006', 'Sabun cuci piring  jeruk 750 ml', 13500, 16],
            ['Obat-obatan', 'OBT-0001', 'Minyak kayu putih 60 ml', 18500, 10],
            ['Obat-obatan', 'OBT-0002', 'Paracetamol 500 mg  strip', 4000, 25],
            ['Obat-obatan', 'OBT-0003', 'Vitamin C 500 mg  strip', 6500, 19],
        ];

        foreach ($products as [$categoryName, $sku, $name, $price, $stock]) {
            $category = Category::firstOrCreate(
                ['slug' => Str::slug($categoryName)],
                ['name' => $categoryName],
            );

            Product::firstOrCreate(
                ['sku' => $sku],
                [
                    'category_id' => $category->id,
                    'name' => $name,
                    'price' => $price,
                    'stock' => $stock,
                ],
            );
        }
    }
}