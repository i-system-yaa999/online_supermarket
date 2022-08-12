<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'バナナ',
            'price' => 250,
            'genre_id' => 2,
            'area_id' => 2,
            'description' => 'あまーい',
            'image_id' => 8

        ]);
        Product::create([
            'name' => 'ぶどう',
            'price' => 350,
            'genre_id' => 2,
            'area_id' => 1,
            'description' => 'しぶーい',
            'image_id' => 12
        ]);
        Product::create([
            'name' => '牛肉',
            'price' => 1000,
            'genre_id' => 1,
            'area_id' => 3,
            'description' => 'かたーい',
            'image_id' => 17
        ]);
    }
}
