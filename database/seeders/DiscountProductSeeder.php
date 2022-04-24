<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount_product')->insert([
            [	'discount_id' =>	2	,'product_id' =>	27	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	12	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	47	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	41	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	2	,'product_id' =>	31	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	65	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	2	,'product_id' =>	34	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	31	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	45	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	51	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	60	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	2	,'product_id' =>	68	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	45	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	50	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	2	,'product_id' =>	21	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	60	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	2	,'product_id' =>	65	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	2	,'product_id' =>	48	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	20	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	19	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	43	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	2	,'product_id' =>	70	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	24	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	19	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	14	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	27	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	20	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	37	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	22	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	41	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	1	,'product_id' =>	58	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	15	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	2	,'product_id' =>	36	,'created_at' => now()	, 'updated_at' => now()	],
            [	'discount_id' =>	3	,'product_id' =>	43	,'created_at' => now()	, 'updated_at' => now()	],
        ]);
    }
}
