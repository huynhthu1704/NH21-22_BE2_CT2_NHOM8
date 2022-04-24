<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            ['color_name' => 'White'],
            ['color_name' => 'Begie'],
            ['color_name' => 'Gray'],
            ['color_name' => 'BlueDark'],
            ['color_name' => 'Brown'],
            ['color_name' => 'Black']
        ]);
    }
}
