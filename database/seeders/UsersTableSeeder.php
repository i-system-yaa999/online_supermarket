<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Manager;
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
        // ID = 1
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

        // ID = 2
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
        
        // ID = 3
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

        // ダミーユーザー 10件
        User::factory(10)->create();

    }
}
