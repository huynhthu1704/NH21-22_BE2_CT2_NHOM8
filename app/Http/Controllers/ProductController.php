<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;

class ProductController extends Controller
{
    protected $product;

    function __construct()
    {
        $this->product = new Product();
    }

    function  index($id)
    {
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
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('colors', 'colors.id', '=', 'images.color_id')
            ->join('dimensions', 'dimension_id', 'dimensions.id')
            ->where('products.id', $id)->get();
        $product = [];
        foreach ($products as $key => $value) {
            $product[$value->product_id] = [
                'name' => $value->product_name,
                'description' => $value->description,
                'price' => $value->sale_amount,
                'category_name' => $value->category_name,
                'dimension_id' => $value->dimension_id,
                'width' => $value->width,
                'height' => $value->height,
                'weight' => $value->weight,
                'length' => $value->length
            ];
        }
        foreach ($products as $key => $value) {
            $product[$value->product_id]['colors'] = [
                'color_id' => $value->color_id,
                'color_name' => $value->color_name,
                'color_code' => $value->color_code,
                'src' => $value->src
            ];
        }
        return $product;
    }


    function getTopProducts($category_id)
    {
        if ($category_id == -1) {
            $products = Product::orderBy('sale_amount', 'desc')->limit(7)->get();
        } else {
            $products = Product::where('category_id', '=', $category_id)->orderBy('sale_amount', 'desc')->limit(7)->get();
        }

        $arr = [];
        foreach ($products as $product) {

            $category = $product->category;

            $arr[$product->id] =
                [
                    'product_id' => $product->id,
                    'product_name' =>  $product->product_name,
                    'price' =>  $product->price,
                    'sales_price' => ($product->price / 100) * (100 - $product->discount->discount_value),
                    'sale_amount' => $product->sale_amount,
                    'category_name' => $category->category_name,
                    'discount' => $product->discount->discount_value
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

        if ($categoryID != -1) {
            $products = $products->where('category_id', '=', $categoryID)->get();
        } else {
            $products = $products->get();
        }

        $arr = [];

        foreach ($products as $key => $product) {

            $category = $product->category;

            $arr[$key] =
                [
                    'product_id' => $product->id,
                    'product_name' =>  $product->product_name,
                    'price' =>  $product->price,
                    'sales_price' => ($product->price / 100) * (100 - $product->discount->discount_value),
                    'sale_amount' => $product->sale_amount,
                    'category_name' => $category->category_name,
                    'discount' => $product->discount->discount_value
                ];

            foreach ($product->images as $img) {
                $color = $img->color;
                $arr[$key]['colors'][] =
                    [
                        'src' => $img->src,
                        'color_id' => $color->id,
                        'color_name' => $color->color_name,
                        'color_code' => $color->color_code,
                    ];
            }
        }

        return json_encode($arr);
    }
}
