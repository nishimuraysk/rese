<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'name' => '利用者',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('roles')->insert($param);

        $param = [
            'name' => '管理者',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('roles')->insert($param);

        $param = [
            'name' => '店舗代表者',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('roles')->insert($param);
    }
}
