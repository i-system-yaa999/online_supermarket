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
            'url' => 'images/products/ウィンナー.jpg'
        ]);
        Image::create([
            'url' => 'images/products/キウイ.jpg'
        ]);
        Image::create([
            'url' => 'images/products/キャベツ.jpg'
        ]);
        Image::create([
            'url' => 'images/products/きゅうり.jpg'
        ]);
        Image::create([
            'url' => 'images/products/さくらんぼ.jpg'
        ]);
        Image::create([
            'url' => 'images/products/しょうゆ.jpg'
        ]);
        Image::create([
            'url' => 'images/products/にんじん.jpg'
        ]);
        Image::create([
            'url' => 'images/products/バナナ.jpg'
        ]);
        Image::create([
            'url' => 'images/products/ピーマン.jpg'
        ]);
        Image::create([
            'url' => 'images/products/ビール.jpg'
        ]);
        Image::create([
            'url' => 'images/products/プチトマト.jpg'
        ]);
        Image::create([
            'url' => 'images/products/ぶどう.jpg'
        ]);
        Image::create([
            'url' => 'images/products/プラム.jpg'
        ]);
        Image::create([
            'url' => 'images/products/ほうれん草.jpg'
        ]);
        Image::create([
            'url' => 'images/products/牛肩ロース.jpg'
        ]);
        Image::create([
            'url' => 'images/products/牛豚挽肉.jpg'
        ]);
        Image::create([
            'url' => 'images/products/牛肉.jpg'
        ]);
        Image::create([
            'url' => 'images/products/牛乳.jpg'
        ]);
        Image::create([
            'url' => 'images/products/砂糖.jpg'
        ]);
        Image::create([
            'url' => 'images/products/若鶏もも肉.jpg'
        ]);
        Image::create([
            'url' => 'images/products/焼肉のたれ.jpg'
        ]);
        Image::create([
            'url' => 'images/products/大葉.jpg'
        ]);
        Image::create([
            'url' => 'images/products/長ネギ.jpg'
        ]);
        Image::create([
            'url' => 'images/products/豚バラ.jpg'
        ]);
        Image::create([
            'url' => 'images/products/豚小間切.jpg'
        ]);
        Image::create([
            'url' => 'images/products/伯方の塩.jpg'
        ]);
        Image::create([
            'url' => 'images/products/油.jpg'
        ]);
    }
}
