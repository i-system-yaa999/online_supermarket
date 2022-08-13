<?php

namespace Database\Seeders;

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
            'url' => 'images/products_all/ウィンナー.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/キウイ.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/キャベツ.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/きゅうり.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/さくらんぼ.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/サングラス.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/しょうゆ.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/にんじん.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/バナナ.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/ピーマン.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/ビール.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/プチトマト.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/ぶどう.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/プラム.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/ペットフード.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/ほうれん草.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/レタス.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/牛肩ロース.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/牛豚挽肉.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/牛肉.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/牛乳.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/砂糖.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/若鶏もも肉.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/焼肉のたれ.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/大葉.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/長ネギ.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/豚バラ.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/豚小間切.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/伯方の塩.jpg'
        ]);
        Image::create([
            'url' => 'images/products_all/油.jpg'
        ]);
    }
}
