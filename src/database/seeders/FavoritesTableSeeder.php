<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FavoritesTableSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'user_id' => 1,
            'shop_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 14,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => 1,
            'shop_id' => 20,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('favorites')->insert($param);
    }
}
