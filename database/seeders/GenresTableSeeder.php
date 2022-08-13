<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'name' => 'お肉'
        ]);
        Genre::create([
            'name' => '野菜・くだもの'
        ]);
        Genre::create([
            'name' => 'お魚'
        ]);
        Genre::create([
            'name' => '調味料'
        ]);
        Genre::create([
            'name' => 'その他'
        ]);
    }
}
