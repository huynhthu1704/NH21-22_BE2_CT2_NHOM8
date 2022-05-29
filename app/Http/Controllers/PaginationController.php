<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaginationController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::limit(12);
        return View('category', ['products' => $products, 'brandId' => $request->brandId, 'keyword' => $request->keyword, 'categoryId' => $request->categoryId]);
    }

    public function CategoryTwoCol(Request $request)
    {
        return View('category-2cols');
    }

    public function getProductByFilter(Request $request)
    {

        $input = $request->all();
        $start = ($input['page'] - 1) * $input['perpage'];
        
        $products = Product::whereBetween('price', [$input['price']['min'], $input['price']['max']]);

        if (!empty($input['categories'])) {
            $products = $products->whereIn('category_id', $input['categories']);
        }
        if (!empty($input['brands'])) {
            $products = $products->whereIn('brand_id', $input['brands']);
        }
        if (!empty($input['colors'])) {
            $productIdWithColors = Image::select('product_id')->whereIn('color_id', $input['colors'])->distinct()->get();
            $products = $products->whereIn('id', $productIdWithColors);
        }
 
        if ($input['keyword'] != '') {
            $products = $products->where('product_name', 'like', '%'.$input['keyword'].'%');
        }

        $total = count($products->get());
        $numPages = ceil($total / $input['perpage']);
        $products = $products->whereBetween('price', [$input['price']['min'], $input['price']['max']]);
        $products = $products->orderBy($input['sortby']['sortby'], $input['sortby']['type'])->limit($input['perpage'])->offset($start)->get();

        $arr = [];

        foreach ($products as $key => $product) {
            $category = $product->category;
            $arr['data'][$key] =
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
                $arr['data'][$key]['colors'][] =
                    [
                        'src' => $img->src,
                        'color_id' => $color->id,
                        'color_name' => $color->color_name,
                        'color_code' => $color->color_code,
                    ];
            }
        }

        $arr['numPage'] = $numPages;
        $arr['currentPage'] = $input['page'];
        $arr['total'] = $total;
        $arr['quantity'] = count($products);

        return response()->json($arr);
    }

    
}
