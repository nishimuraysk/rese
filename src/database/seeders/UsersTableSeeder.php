<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'name' => 'テスト利用者',
            'email' => 'test01@email.com',
            'password' => bcrypt('test_01'),
            'role_id' => 1,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'テスト管理者',
            'email' => 'test02@email.com',
            'password' => bcrypt('test_02'),
            'role_id' => 2,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'テスト店舗代表者01',
            'email' => 'test03@email.com',
            'password' => bcrypt('test_03'),
            'role_id' => 3,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'テスト店舗代表者02',
            'email' => 'test04@email.com',
            'password' => bcrypt('test_04'),
            'role_id' => 3,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'テスト利用者',
            'email' => 'test05@email.com',
            'password' => bcrypt('test_05'),
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
    }
}
