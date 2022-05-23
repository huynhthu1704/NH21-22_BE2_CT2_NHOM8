<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function getBannerByCate($category_id)
    {
        if($category_id == 1)
        {
            $banners = Banner::where('category_id', '=', $category_id)->get();
        }else{
            $banners = Banner::where('category_id', '=', $category_id)->first();
        }
        
        
        return $banners;
    }
    function getBannerByPosition($position)
    {
        $banners = Banner::where('postiton', '=', $position)->get();
        return $banners;
    }
}
