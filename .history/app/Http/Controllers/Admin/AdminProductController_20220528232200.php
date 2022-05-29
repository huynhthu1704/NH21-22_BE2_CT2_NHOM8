<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Dimension;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::addSelect([
            'category_name' => Category::select('category_name')
                ->whereColumn('category_id', 'id')

        ])->get();;
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product',['products'=>$products , 'brands'=>$brands , 'categories'=>$categories]);
    }
    
    public function getimage($id, $colorId) {
        return Product->where(['product_id', '=', $id],['color_id', '=', $id]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $dimension = new Dimension;
        $dimension->width = $request->product_width;
        $dimension->height = $request->product_height;
        $dimension->weight = $request->product_weight;
        $dimension->length = $request->product_length;
        $dimension->save();
        echo $dimension->id;
        // $product->product_name = $request->product_name;
        // $product->category_id = $request->product_category;
        // $product->price = $request->product_price;
        // $product->brand_id = $request->product_brand;
        // $product->description = $request->product_description;
        // $product->quantity = $request->product_quantity;
        // $product->dimension_id = $dimension->id;
        // $product->save();
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
