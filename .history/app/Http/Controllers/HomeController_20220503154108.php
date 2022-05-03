<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;

class HomeController extends Controller
{

    function index(String $name = "index")
    {
        $brands = Brand::all();
        $categories = Category::all();
        $colors = Color::all();
        return view($name, ['categories' => $categories, 'brands'=>$brands, 'colors'=>$colors]);
    }
}
