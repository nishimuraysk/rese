<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'reservation_id' => 2,
            'evaluation' => 5,
            'comment' => '家族での食事でしたが、接客もよく大変満足しました。また機会があれば行きたいです。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('reviews')->insert($param);
    }
}
