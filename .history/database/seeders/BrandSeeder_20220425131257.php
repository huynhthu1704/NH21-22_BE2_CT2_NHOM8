<?php

namespace Database\Seeders;

use Faker\Factory;
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
        $faker = Factory::create();

        DB::table('brands')->insert([
            [
                'brand_name' => 'Le Barrel',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1'),
               // 'img'        => ''
            ],
            [
                'brand_name' => 'Something',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1'),
            ],
            [
                'brand_name' => 'Costa Brava',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1'),
            ],
            [
                'brand_name' => 'Oceanic',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1'),
            ],
            [
                'brand_name' => 'Fountain',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1'),
            ],
            [
                'brand_name' => 'Black Birds',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1'),
            ]
        ]);
    }
}
