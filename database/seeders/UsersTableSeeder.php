<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Manager;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Delivery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // システム管理者 1件
        $user = new User([
            'name' => 'かんりしゃ',
            'email' => 'admin@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'role' => '1',
        ]);
        $user->save();

        // 売り場担当者 1件
        $user = new User([
            'name' => 'うりばたんとうしゃ',
            'email' => 'manager@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'role' => '5',
        ]);
        $user->save();
        $manager = new Manager([
            'user_id' => 2,
            'genre_id' => 1,
        ]);
        $manager->save();
        
        // 通常ユーザー 1件
        $user = new User([
            'name' => 'つうじょうゆーざー',
            'email' => 'user@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'role' => '10',
        ]);
        $user->save();
        // 通常ユーザー予約情報 1件
        // $delivery = new Delivery([
        //     'user_id' => 3,
        //     'shop_id' => 19,
        //     'reserved_at' => now(),
        //     'number' => 3,
        // ]);
        // $delivery->save();
        // 通常ユーザー評価コメント 1件
        $comment = new Comment([
            'user_id' => 3,
            'product_id' => 5,
            'evaluation' => 4,
            'comment' => '新鮮でおいしかったです。',
        ]);
        $comment->save();
        // 通常ユーザーお気に入り 1件
        $like = new Like([
            'user_id' => 3,
            'product_id' => 2,
        ]);
        $like->save();

        // ダミーユーザー 10件
        User::factory(10)->create();

    }
}
