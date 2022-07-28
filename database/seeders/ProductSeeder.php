<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
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
            'genre_id' => 5,
            'area_id' => 1,
            'description' => 'あまーい',
            'image' => 'image/products/banana.jpg'
            // 'description' => 'Good watch',
            // 'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=989&q=80'

        ]);
        Product::create([
            'name' => 'ぶどう',
            'price' => 350,
            'genre_id' => 5,
            'area_id' => 1,
            'description' => 'しぶーい',
            'image' => 'image/products/ぶどう.jpg'
            // 'description' => 'Good Bag',
            // 'image' => 'https://images.unsplash.com/photo-1491637639811-60e2756cc1c7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=669&q=80'
        ]);
        Product::create([
            'name' => '牛肉',
            'price' => 100,
            'genre_id' => 5,
            'area_id' => 1,
            'description' => 'かたーい',
            'image' => 'image/products/牛肉.jpg'
            // 'description' => 'Good perfume',
            // 'image' => 'https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1868&q=80'
        ]);
    }
}
