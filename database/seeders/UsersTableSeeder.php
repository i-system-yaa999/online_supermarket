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
        User::create([
            'name' => 'かんりしゃ',
            'email' => 'admin@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'role' => '1',
        ]);

        // ID = 2
        // 売り場担当者 1件
        User::create([
            'name' => 'うりばたんとうしゃ',
            'email' => 'manager@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'role' => '5',
        ]);
        Manager::create([
            'user_id' => 2,
            'genre_id' => 1,
        ]);

        // ID = 3
        // 通常ユーザー 1件
        User::create([
            'name' => 'つうじょうゆーざー',
            'email' => 'user@system.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'remember_token' => Str::random(10),
            'role' => '10',
        ]);

        // ダミーユーザー 10件
        User::factory(10)->create();

    }
}
