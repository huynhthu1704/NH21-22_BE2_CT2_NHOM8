<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            ['category_id' => 	1	, 'title' => 'New and inspiration'	, 'content' =>	'The Most Comfortable Sofas!' , 'pageName' => 'index' , 'position' => 'header' , 'imgSrc' => 'sofas4.jpg'	],
            ['category_id' => 	1	, 'title' => 'Collection'	, 'content' =>	'Living Room Furniture' , 'pageName' => 'index' , 'position' => 'header' , 'imgSrc' => 'sofa2.jpg'	],
            ['category_id' => 	1	, 'title' => 'Outdoor Furniture'	, 'content' =>	'Inspire your personal space' , 'pageName' => 'index' , 'position' => 'header' , 'imgSrc' => 'sofa4.jpg'	],
            ['category_id' => 	2	, 'title' => 'Clearence'	, 'content' =>	'Modern and comfortable living space' , 'pageName' => 'index' , 'position' => 'header' , 'imgSrc' => 'ArmChair3.jpg'	],
            ['category_id' => 	3	, 'title' => 'Furniture and design'	, 'content' =>	'Furniture Close To Nature' , 'pageName' => 'index' , 'position' => 'header' , 'imgSrc' => 'chair2.jpg'	],
            ['category_id' => 	4	, 'title' => 'Working Space'	, 'content' =>	'Minimalist, youthful style' , 'pageName' => 'index' , 'position' => 'categories' , 'imgSrc' => 'table.jpg'	],
            ['category_id' => 	5	, 'title' => 'Storage'	, 'content' =>	'Timeless Styles' , 'pageName' => 'index' , 'position' => 'categories' , 'imgSrc' => 'storage.jpg'	],
            ['category_id' => 	6	, 'title' => 'Sleep Quality'	, 'content' =>	'Inspire your personal space' , 'pageName' => 'index' , 'position' => 'categories' , 'imgSrc' => 'bed1.jpg'	],
            ['category_id' => 	7	, 'title' => 'Lighting'	, 'content' =>	'Let There Be Light!' , 'pageName' => 'index' , 'position' => 'categories' , 'imgSrc' => 'lamp.jpg'	],
        ]);
    }
}
