<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 通常ユーザーお気に入り 1件
        Like::create([
            'user_id' => 3,
            'product_id' => 2,
        ]);
    }
}
