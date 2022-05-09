<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Image;
use App\Models\Dimension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class ProductController extends Controller
{
    protected $product;

    function __construct()
    {
        $this->product = new Product();
    } 

    function  index($id) {
        $pro = new ProductController();
        return view('product', ['product' => $pro->getDetail($id)]);
    }

    function getDetail($id)
    {
        $products = DB::table('products')->select(
            'products.id as product_id',
            'product_name',
            'price',
            'sale_amount',
            'src',
            'description',
            'colors.id as color_id',
            'colors.color_name',
            'colors.color_code',
            'categories.category_name',
            'dimension_id',
            'width',
            'height',
            'weight',
            'length'
        )
            ->join('images', 'products.id', '=', 'images.product_id')
            ->join('categories', 'products.cate_id', '=', 'categories.id')
            ->join('colors', 'colors.id', '=', 'images.color_id')
            ->join('dimensions', 'dimension_id', 'dimensions.id')
            ->where('products.id', $id)->get();
            $product = [];
            foreach($products as $key=>$value) {
                $product[$value->product_id] = [
                    'name'=> $value->product_name,
                    'description'=>$value->description,
                    'price'=>$value->sale_amount,
                    'category_name'=>$value->category_name,
                    'dimension_id'=>$value->dimension_id,
                    'width'=>$value->width,
                    'height'=> $value-> height,
                    'weight'=>$value->weight,
                    'length'=>$value->length
                ];
            }
            foreach($products as $key=>$value) {
                $product[$value->product_id]['colors'] = [
                   
                ];
            }
        return $product;
    }


    function getTopProducts($cate_id)
    {
        if ($cate_id == -1) {
            $top_id =  DB::table('products')->select('products.id')->limit(7)->orderBy('products.sale_amount')->get()->toArray();
        } else {
            $top_id =  DB::table('products')->select('products.id')->limit(7)->orderBy('products.sale_amount')->join('categories', 'products.cate_id', '=', 'categories.id')->where('categories.id', '=', $cate_id)->distinct()->get()->toArray();
        }

        foreach ($top_id as $key => $value) {
            $top_id[$key] = $value->id;
        }

        $top_products = DB::table('products')->select(
            'products.id as product_id',
            'product_name',
            'price',
            'products.sale_amount',
            'src',
            'colors.id as color_id',
            'colors.color_name',
            'colors.color_code',
            'categories.category_name'
        )
            ->join('images', 'products.id', '=', 'images.product_id')
            ->join('categories', 'products.cate_id', '=', 'categories.id')
            ->join('colors', 'colors.id', '=', 'images.color_id')->whereIn('products.id', $top_id)->distinct()->get();


        $productItem = [];

        foreach ($top_products as $key => $value) {
            $productItem[$value->product_id] =
                [
                    'product_name' =>  $value->product_name,
                    'price' =>  $value->price,
                    'sale_amount' => $value->sale_amount,
                    'category_name' => $value->category_name
                ];
        }
        foreach ($top_products as $key => $value) {
            $productItem[$value->product_id]['colors'][] =
                [
                    'color_id' => $value->color_id,
                    'color_name' => $value->color_name,
                    'color_code' => $value->color_code,
                    'src' => $value->src
                ];
        }

        return $productItem;
    }
}
