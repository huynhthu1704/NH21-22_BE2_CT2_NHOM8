<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    public function run()
    {
        DB::table('brands')->insert([
            [
                'brand_name' => 'Le Barrel',
                // 'created_at' => $this->faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                // 'updated_at' => $this->faker->dateTimeBetween('2015/1/1'),
            ],
            [
                'brand_name' => 'Something',
                // 'created_at' => $this->faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                // 'updated_at' => $this->faker->dateTimeBetween('2015/1/1'),
            ],
                // 'created_at' => $this->faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                // 'updated_at' => $this->faker->dateTimeBetween('2015/1/1'),
            [
                'brand_name' => 'Costa Brava',
                // 'created_at' => $this->faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                // 'updated_at' => $this->faker->dateTimeBetween('2015/1/1'),
            ],
            [
                'brand_name' => 'Oceanic',
                // 'created_at' => $this->faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                // 'updated_at' => $this->faker->dateTimeBetween('2015/1/1'),
            ],
            [
                'brand_name' => 'Fountain',
                // 'created_at' => $this->faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                // 'updated_at' => $this->faker->dateTimeBetween('2015/1/1'),
            ],
            [
                'brand_name' => 'Black Birds',
                // 'created_at' => $this->faker->dateTimeBetween('2010/1/1', '2015/1/1'),
                // 'updated_at' => $this->faker->dateTimeBetween('2010/1/1'),
            ]
        ]);
    }
}
