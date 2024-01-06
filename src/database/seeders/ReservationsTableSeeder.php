<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'user_id' => 1,
            'shop_id' => 18,
            'date' => '2024-01-06',
            'time' => '19:00',
            'number' => '6',
            'payment' => 'お支払い済',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 5,
            'date' => '2023-10-24',
            'time' => '19:00',
            'number' => '2',
            'payment' => 'お支払い済',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 11,
            'date' => '2023-04-09',
            'time' => '17:30',
            'number' => '6',
            'payment' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 1,
            'date' => '2023-12-24',
            'time' => '19:00',
            'number' => '2',
            'payment' => null,
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
            'payment' => null,
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
            'payment' => 'お支払い済',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('reservations')->insert($param);
    }
}
