<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Models\Color;
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
        $colors = Color::all();
        return view('admin.product', ['products' => $products, 'brands' => $brands, 'categories' => $categories, 'colors' => $colors]);
    }

    public function getImage($id, $colorId)
    {
        return Image::where(['product_id' => $id], ['color_id' => $colorId])->first();
    }

    public function getCategory($id)
    {
        return Category::where('id', $id)->first();
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
        // Insert into dimensions table
        $dimension = new Dimension;
        $dimension->width = $request->product_width;
        $dimension->height = $request->product_height;
        $dimension->weight = $request->product_weight;
        $dimension->length = $request->product_length;
        $dimension->save();

        // Insert into products table
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->category_id = $request->product_category;
        $product->price = $request->product_price;
        $product->brand_id = $request->product_brand;
        $product->description = $request->product_description;
        $product->quantity = $request->product_quantity;
        $product->dimension_id = $dimension->id;
        $product->save();

        $category = Category::find($request->product_category)->first();
        // dd($category);
        // Get all color for checking image
        $colors = Color::all();

        // Loop the colors collection for checking
        foreach ($colors as $key => $value) {
            $name = "product_image_" . $value->color_name;
            // Check if the image request is exist
            if ($request->hasFile($name)) {
                $image = new Image;
                $image->color_id = $value->id;
                $image->product_id = $product->id;
                // Accumulator for save the image source
                $arrImg = [];
                $images = $request->file($name);
                foreach ($images as $img) {
                    $allowedFileExtension = ['jpg', 'png'];
                    $imgName = $img->getClientOriginalName();
                    $name = str_replace(' ', '_', $imgName);
                    $name = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
                    $extension = $img->getClientOriginalExtension();
                    $check = in_array($extension, $allowedFileExtension);
                    if ($check) {
                        $img->move(public_path('/images/molla/'.$category->category_name), $imgName);
                        array_push($arrImg, $imgName);
                    }
                }
                $image->src = join("#",$arrImg);
                $image->save();
            } 
        }
        return redirect()->back();
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
        $images = Image::where('product_id', $id)->delete();
          
        $product = Product::find($id);
        $dimension = Dimension::find($product->dimension_id);
        $product->delete();
        $dimension->delete();
        return redirect()->route('admin.product');
    }
}
