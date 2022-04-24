<?php

namespace Database\Seeders;

use Faker\Factory;
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
        $faker = Factory::create();
        DB::table('colors')->insert([
            [
                'color_name' => 'White',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'color_name' => 'Begie',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'color_name' => 'Gray',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'color_name' => 'BlueDark',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'color_name' => 'Brown',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'color_name' => 'Black',
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ]
        ]);
    }
}
