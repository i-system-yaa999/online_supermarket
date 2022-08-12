<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 通常ユーザー評価コメント 1件
        $comment = new Comment([
            'user_id' => 3,
            'product_id' => 1,
            'evaluation' => 4,
            'comment' => '新鮮でおいしかったです。',
        ]);
        $comment->save();
    }
}
