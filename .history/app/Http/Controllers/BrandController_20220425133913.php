<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    function getAllBrands() {
        return view('index', ['brands'=>Brand::all()]);
    }
}
