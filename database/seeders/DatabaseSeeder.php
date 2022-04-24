<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
