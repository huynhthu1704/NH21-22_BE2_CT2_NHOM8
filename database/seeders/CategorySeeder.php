<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => 'sofas'],
            ['category_name' => 'armchairs'],
            ['category_name' => 'chairs'],
            ['category_name' => 'tables'],
            ['category_name' => 'storage'],
            ['category_name' => 'beds'],
            ['category_name' => 'lamps']
            
        ]);
    }
}
