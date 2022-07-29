<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'url' => 'image/products/ウィンナー.jpg'
        ]);
        Image::create([
            'url' => 'image/products/キウイ.jpg'
        ]);
        Image::create([
            'url' => 'image/products/キャベツ.jpg'
        ]);
        Image::create([
            'url' => 'image/products/きゅうり.jpg'
        ]);
        Image::create([
            'url' => 'image/products/さくらんぼ.jpg'
        ]);
        Image::create([
            'url' => 'image/products/しょうゆ.jpg'
        ]);
        Image::create([
            'url' => 'image/products/にんじん.jpg'
        ]);
        Image::create([
            'url' => 'image/products/バナナ.jpg'
        ]);
        Image::create([
            'url' => 'image/products/ピーマン.jpg'
        ]);
        Image::create([
            'url' => 'image/products/ビール.jpg'
        ]);
        Image::create([
            'url' => 'image/products/プチトマト.jpg'
        ]);
        Image::create([
            'url' => 'image/products/ぶどう.jpg'
        ]);
        Image::create([
            'url' => 'image/products/プラム.jpg'
        ]);
        Image::create([
            'url' => 'image/products/ほうれん草.jpg'
        ]);
        Image::create([
            'url' => 'image/products/牛肩ロース.jpg'
        ]);
        Image::create([
            'url' => 'image/products/牛豚挽肉.jpg'
        ]);
        Image::create([
            'url' => 'image/products/牛肉.jpg'
        ]);
        Image::create([
            'url' => 'image/products/牛乳.jpg'
        ]);
        Image::create([
            'url' => 'image/products/砂糖.jpg'
        ]);
        Image::create([
            'url' => 'image/products/若鶏もも肉.jpg'
        ]);
        Image::create([
            'url' => 'image/products/焼肉のたれ.jpg'
        ]);
        Image::create([
            'url' => 'image/products/大葉.jpg'
        ]);
        Image::create([
            'url' => 'image/products/長ネギ.jpg'
        ]);
        Image::create([
            'url' => 'image/products/豚バラ.jpg'
        ]);
        Image::create([
            'url' => 'image/products/豚小間切.jpg'
        ]);
        Image::create([
            'url' => 'image/products/伯方の塩.jpg'
        ]);
        Image::create([
            'url' => 'image/products/油.jpg'
        ]);
    }
}
