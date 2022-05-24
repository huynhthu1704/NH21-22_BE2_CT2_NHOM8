<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Image;
use App\Models\Product;

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
        $products = new ProductController();
        return view('product')->with('product', $product)
        ->with('category', $category)
        ->with('productData', $products)
        ->with('dimension', $dimension);
    }
}
