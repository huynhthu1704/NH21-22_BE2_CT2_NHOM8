<?php

namespace Database\Seeders;

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
        DB::table('discounts')->insert([
            [
                'discount_value' => 20,
                'start_at' => now(),
                'finish_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'discount_value' => 30,
                'start_at' => now(),
                'finish_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'discount_value' => 50,
                'start_at' => now(),
                'finish_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
