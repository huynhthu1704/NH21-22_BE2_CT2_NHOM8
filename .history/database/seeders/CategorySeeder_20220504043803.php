<?php

namespace Database\Seeders;

use Faker\Factory;
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
        $faker = Factory::create();
        DB::table('categories')->insert([
            [
                'category_name' => 'Sofas', 
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'category_name' => 'Armchairs', 
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'category_name' => 'Chairs', 
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'category_name' => 'Tables', 
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'category_name' => 'Storage', 
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'category_name' => 'Beds', 
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'category_name' => 'Lamps', 
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ]

        ]);
    }
}
