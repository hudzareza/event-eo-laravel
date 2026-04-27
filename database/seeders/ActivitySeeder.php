<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        Activity::insert([
            [
                'code' => 'FOOD',
                'name' => 'Konsumsi',
                'max_scan' => 1
            ],
            [
                'code' => 'GAME',
                'name' => 'Game Booth',
                'max_scan' => null // unlimited
            ],
            [
                'code' => 'VIP',
                'name' => 'Akses VIP',
                'max_scan' => null
            ],
        ]);
    }
}