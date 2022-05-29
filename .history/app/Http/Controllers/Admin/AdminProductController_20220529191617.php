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
        // /dd(Image::where(['product_id' => $id],['color_id' => $colorId])->first());
        return Image::where(['product_id' => $id], ['color_id' => $colorId])->first();
    }

    public function getCategory($id)
    {
        // /dd(Image::where(['product_id' => $id],['color_id' => $colorId])->first());
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

        // Get all color for checking image
        $colors = Color::all();

        // Insert into image table
        $image = new Image;
       
        // Loop the colors collection for checking
        foreach ($colors as $key => $value) {
            
            $name = "product_image_" . $value->color_name;
            if ($request->hasFile($name)) {
                $image->color_id = $value->id;
                $image->product_id = $product->id;
                $stringImg = "";
                $images = $request->file($name);
                $i = 0;
                foreach ($images as $img) {
                    $i++;
                    $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
                    $imgName = $img->getClientOriginalName();
                    echo "img" . $i . " - " . $imgName;
                    $extension = $img->getClientOriginalExtension();
                    $check = in_array($extension, $allowedFileExtension);
                    if ($check) {
                        $img->move(public_path('/images/banners'), $imgName);
                        $stringImg = $stringImg . "#" . $imgName;
                    }
                }
                $image->src = $stringImg;
            } else {
                $msg = "Added fail";
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
        //
    }
}
