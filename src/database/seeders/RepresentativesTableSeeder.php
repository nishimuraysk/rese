<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RepresentativesTableSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'user_id' => 3,
            'shop_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('representatives')->insert($param);
    }
}
