<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function viewProductDetail()
    {
    }
    function getTopProducts($cate_id)
    {
        // $top_products = DB::limit(7)->orderByDesc('sale_amount')->get();
        $top_products = DB::table('products')->select('products.id', 'product_name', 'price', 'products.sale_amount', 'src')->join('images', 'products.id', '=', 'images.product_id')->join('categories', 'products.cate_id', '=', 'categories.id')->limit(7)->orderByDesc('products.sale_amount')->distinct();
        $top_products = $cate_id === -1 ? $top_products : $top_products->where('categories.id', '=', $cate_id);
        return $top_products->get();
    }
    // function getProductByCategory($id)
    // {
    //     $productByCate = Product::where('cate_id', $id)->litmit(7)->orderByDesc('sale_amount')->get();
    //     return view('index', ['productByCate' => $productByCate]);;
    // }
}
