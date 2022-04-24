<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Dimension;
use App\Models\Discount;
use App\Models\Product;
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
        
        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            ColorSeeder::class,
            CustomerSeeder::class,
            RoleSeeder::class,
            DimensionSeeder::class,
            UserSeeder::class,
            DiscountSeeder::class,
            ProductSeeder::class,
            DiscountProductSeeder::class,
            ImageSeeder::class
        ]);

    }
}
