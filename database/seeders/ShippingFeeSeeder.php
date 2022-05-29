<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_fees')->insert([
            [
                'shipping_type' => 'Free shipping',
                'price' => 0
            ],
            [
                'shipping_type' => 'Standart',
                'price' => 40000
            ],
        ]);
    }
}
