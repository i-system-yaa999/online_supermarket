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
            'name' => 'ウィンナー',
            'price' => 390,
            'genre_id' => 1,
            'area_id' => 1,
            'description' => 'あまーい',
            'image_id' => 1
        ]);
        Product::create([
            'name' => 'キウイ',
            'price' => 200,
            'genre_id' => 2,
            'area_id' => 2,
            'description' => 'しぶーい',
            'image_id' => 2
        ]);
        Product::create([
            'name' => 'キャベツ',
            'price' => 150,
            'genre_id' => 2,
            'area_id' => 4,
            'description' => 'かたーい',
            'image_id' => 3
        ]);
        Product::create([
            'name' => 'きゅうり',
            'price' => 60,
            'genre_id' => 2,
            'area_id' => 5,
            'description' => 'かたーい',
            'image_id' => 4
        ]);
        Product::create([
            'name' => 'さくらんぼ',
            'price' => 800,
            'genre_id' => 2,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 5
        ]);
        Product::create([
            'name' => 'サングラス',
            'price' => 2000,
            'genre_id' => 5,
            'area_id' => 3,
            'description' => 'かたーい',
            'image_id' => 6
        ]);
        Product::create([
            'name' => 'しょうゆ',
            'price' => 300,
            'genre_id' => 4,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 7
        ]);
        Product::create([
            'name' => 'にんじん',
            'price' => 100,
            'genre_id' => 2,
            'area_id' => 6,
            'description' => 'かたーい',
            'image_id' => 8
        ]);
        Product::create([
            'name' => 'バナナ',
            'price' => 100,
            'genre_id' => 2,
            'area_id' => 3,
            'description' => 'かたーい',
            'image_id' => 9
        ]);
        Product::create([
            'name' => 'ピーマン',
            'price' => 150,
            'genre_id' => 2,
            'area_id' => 6,
            'description' => 'かたーい',
            'image_id' => 10
        ]);
        Product::create([
            'name' => 'ビール',
            'price' => 350,
            'genre_id' => 5,
            'area_id' => 2,
            'description' => 'かたーい',
            'image_id' => 11
        ]);
        Product::create([
            'name' => 'プチトマト',
            'price' => 400,
            'genre_id' => 2,
            'area_id' => 4,
            'description' => 'かたーい',
            'image_id' => 12
        ]);
        Product::create([
            'name' => 'ぶどう',
            'price' => 500,
            'genre_id' => 2,
            'area_id' => 5,
            'description' => 'かたーい',
            'image_id' => 13
        ]);
        Product::create([
            'name' => 'プラム',
            'price' => 400,
            'genre_id' => 2,
            'area_id' => 6,
            'description' => 'かたーい',
            'image_id' => 14
        ]);
        Product::create([
            'name' => 'ペットフード',
            'price' => 2500,
            'genre_id' => 5,
            'area_id' => 2,
            'description' => 'かたーい',
            'image_id' => 15
        ]);
        Product::create([
            'name' => 'ほうれん草',
            'price' => 98,
            'genre_id' => 2,
            'area_id' => 4,
            'description' => 'かたーい',
            'image_id' => 16
        ]);
        Product::create([
            'name' => 'レタス',
            'price' => 98,
            'genre_id' => 2,
            'area_id' => 5,
            'description' => 'かたーい',
            'image_id' => 17
        ]);
        Product::create([
            'name' => '牛肩ロース',
            'price' => 1000,
            'genre_id' => 1,
            'area_id' => 3,
            'description' => 'かたーい',
            'image_id' => 18
        ]);
        Product::create([
            'name' => '牛豚挽肉',
            'price' => 400,
            'genre_id' => 1,
            'area_id' => 3,
            'description' => 'かたーい',
            'image_id' => 19
        ]);
        Product::create([
            'name' => '牛肉',
            'price' => 1000,
            'genre_id' => 1,
            'area_id' => 3,
            'description' => 'かたーい',
            'image_id' => 20
        ]);
        Product::create([
            'name' => '牛乳',
            'price' => 250,
            'genre_id' => 5,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 21
        ]);
        Product::create([
            'name' => '砂糖',
            'price' => 200,
            'genre_id' => 4,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 22
        ]);
        Product::create([
            'name' => '若鶏もも肉',
            'price' => 300,
            'genre_id' => 1,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 23
        ]);
        Product::create([
            'name' => '焼肉のたれ',
            'price' => 400,
            'genre_id' => 4,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 24
        ]);
        Product::create([
            'name' => '大葉',
            'price' => 100,
            'genre_id' => 2,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 25
        ]);
        Product::create([
            'name' => '長ネギ',
            'price' => 140,
            'genre_id' => 2,
            'area_id' => 5,
            'description' => 'かたーい',
            'image_id' => 26
        ]);
        Product::create([
            'name' => '豚バラ肉',
            'price' => 250,
            'genre_id' => 1,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 27
        ]);
        Product::create([
            'name' => '豚小間肉',
            'price' => 300,
            'genre_id' => 1,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 28
        ]);
        Product::create([
            'name' => '伯方の塩',
            'price' => 300,
            'genre_id' => 4,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 29
        ]);
        Product::create([
            'name' => 'サラダ油',
            'price' => 400,
            'genre_id' => 4,
            'area_id' => 1,
            'description' => 'かたーい',
            'image_id' => 30
        ]);
    }
}
