<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'image' => null,
                'name' => 'Kartu Nama Glossy',
                'price' => '15000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'image' => null,
                'name' => 'Kartu Nama Glossy',
                'price' => '15000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Product::insert($products);
    }
}
