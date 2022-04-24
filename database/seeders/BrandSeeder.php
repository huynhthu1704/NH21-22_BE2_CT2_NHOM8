<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            ['brand_name' => 'Le Barrel'],
            ['brand_name' => 'Something'],
            ['brand_name' => 'Costa Brava'],
            ['brand_name' => 'Oceanic'],
            ['brand_name' => 'Fountain'],
            ['brand_name' => 'Black Birds']
            
        ]);
    }
}
