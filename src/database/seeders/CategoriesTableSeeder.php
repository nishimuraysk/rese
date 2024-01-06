<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'name' => '寿司',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => '焼肉',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => '居酒屋',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'イタリアン',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'ラーメン',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('categories')->insert($param);
    }
}
