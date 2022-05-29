<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Image;
use App\Models\Product;
use App\Models\Review;

class DetailController extends Controller
{
    public function index()
    {
        
    }

    public function getProductById($id)
    {
        $product = Image::with(['color', 'product'])->whereRelation('product','id', $id)->get();
        $category = Product::with('category')->whereKey($id)->first();
        $dimension = Product::with('dimension')->whereKey($id)->first()->dimension;
        $reviews = Review::with('product')->where('product_id', '=', $id)->get();
        $avgRv = Review::where('product_id', '=', $id)->avg('rating_value');
        $products = new ProductController();
        $avgRv = ($avgRv * 100) / 5;
        return view('product')
        ->with('product', $product)
        ->with('category', $category)
        ->with('productData', $products)
        ->with('dimension', $dimension)
        ->with('reviews', $reviews)
        ->with('avgRv', $avgRv);
    }
}
