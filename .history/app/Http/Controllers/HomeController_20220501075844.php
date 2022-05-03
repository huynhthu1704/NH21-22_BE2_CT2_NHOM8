<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class HomeController extends Controller
{

    function index()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('index', ['brands'=>$brands]);
        // return view('index', ['categories' => $categories, 'brands'=>$brands]);
    }
}
