<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name'=>'Province 1'],
            ['name'=>'Province 2'],
            ['name'=>'Province 3'],
        ];
        DB::table('tbl_province')->insert($provinces);
    }
}
