<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class HomeController extends Controller
{

    function getAllBrands()
    {
        return view('index', ['brands' => Brand::all()]);
    }
    function getAllCategories()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }
}
