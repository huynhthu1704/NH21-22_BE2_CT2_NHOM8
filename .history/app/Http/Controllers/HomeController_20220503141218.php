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
        return view('/{name}', ['categories' => $categories, 'brands'=>$brands]);
    }
}
