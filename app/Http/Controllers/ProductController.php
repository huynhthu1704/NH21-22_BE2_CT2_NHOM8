<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    protected $product;

    function __construct()
    {
        $this->product = new Product();
    }

    function viewProductDetail()
    {
    }

        
    function getTopProducts($cate_id)
    {
        if ($cate_id == -1) {
            $products = Product::orderBy('sale_amount', 'desc')->limit(7)->get();
        } else {
            $products = Product::where('cate_id', '=', $cate_id)->orderBy('sale_amount', 'desc')->limit(7)->get();
        }

        $arr = [];
        foreach ($products as $product) {
            
            $category = $product->category;

            $arr[$product->id] = 
            [
                'product_id' => $product->id,
                'product_name' =>  $product->product_name,
                'price' =>  $product->price,
                'sale_amount' => $product->sale_amount,
                'category_name' => $category->category_name,
            ];

            foreach ($product->images as $img) {
                $color = $img->color;
                $arr[$product->id]['colors'][] = 
                [
                    'src' => $img->src,  
                    'color_id' => $color->id,
                    'color_name' => $color->color_name,
                    'color_code' => $color->color_code,
                ];
            }
        }
        return $arr;
    }

    function getNewProducts($categoryID, $page, $perPage)
    {

        $start = $page * $perPage;

        $products = Product::orderBy('sale_amount', 'desc')->limit($perPage + 1)->offset($start);

        if($categoryID != -1) {
            $products = $products->where('cate_id', '=', $categoryID);
        }

        return $products->get();
    }

}
