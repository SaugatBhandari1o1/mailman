<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Kathmandu', 'province_id' => 1],
            ['name' => 'Bhaktapur', 'province_id' => 1],
            ['name' => 'Lalitpur', 'province_id' => 1],
            ['name' => 'Jumla', 'province_id' => 2],
            ['name' => 'Humla', 'province_id' => 2],
        ];

        DB::table('tbl_city')->insert($cities);
    }
}
