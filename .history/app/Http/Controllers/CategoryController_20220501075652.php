<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function getAllCategories() {
        $categories = Category::all();
        return view('master', ['categories'=>$categories]);
    }
}
