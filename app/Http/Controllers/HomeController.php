<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{

    function index(String $name = "index")
    {
        $brands = Brand::all();
        $categories = Category::all();
        $categories_limit = Category::limit(3)->orderBy('id','ASC')->get();
        $colors = Color::all();
        $product = new ProductController();

        
        return view($name, ['categories' => $categories, 'brands'=>$brands, 'colors'=>$colors , 'categories_limit' => $categories_limit ,'productData' => $product] );
    }
}
