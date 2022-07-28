<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => '国内産'
        ]);
        Area::create([
            'name' => 'アメリカ産'
        ]);
        Area::create([
            'name' => 'オーストラリア産'
        ]);
        Area::create([
            'name' => '北海道産'
        ]);
        Area::create([
            'name' => '九州産'
        ]);
        Area::create([
            'name' => '四国産'
        ]);
    }
}
