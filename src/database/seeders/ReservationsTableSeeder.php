<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'user_id' => 1,
            'shop_id' => 1,
            'date' => '2023-12-24',
            'time' => '19:00',
            'number' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 10,
            'date' => '2024-01-16',
            'time' => '19:30',
            'number' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 15,
            'date' => '2024-04-09',
            'time' => '18:00',
            'number' => '6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('reservations')->insert($param);
    }
}
