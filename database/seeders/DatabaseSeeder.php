<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['category_name' => 'sofas'],
            ['category_name' => 'armchairs'],
            ['category_name' => 'chairs'],
            ['category_name' => 'tables'],
            ['category_name' => 'storage'],
            ['category_name' => 'beds'],
            ['category_name' => 'lamps']
            
        ]);
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
