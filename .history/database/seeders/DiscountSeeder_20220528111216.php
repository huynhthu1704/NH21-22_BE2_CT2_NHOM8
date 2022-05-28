<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('discounts')->insert([
            [
                'discount_value' => 0,
                'start_at' => now(),
                'finish_at' => new Date(2018, 11, 24, 10, 33, 30, 0);,
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'discount_value' => 20,
                'start_at' => now(),
                'finish_at' => now(),
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'discount_value' => 30,
                'start_at' => now(),
                'finish_at' => now(),
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
            [
                'discount_value' => 50,
                'start_at' => now(),
                'finish_at' => now(),
                'created_at' => $faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                'updated_at' => $faker->dateTimeBetween('2015/1/1')
            ],
        ]);
    }
}
