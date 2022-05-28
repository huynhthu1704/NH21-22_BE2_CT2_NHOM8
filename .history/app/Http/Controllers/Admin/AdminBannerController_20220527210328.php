<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\Paginator;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(5);
        // $banners = Banner::addSelect([
        //     'category_name' => Category::select('category_name')
        //         ->whereColumn('category_id', 'id')
        // ])->get()->paginate(5);
        // $hihi = Banner::paginate(5);
        $categories = Category::all();
$products = Product::paginate(10);
        return view('admin.banner', ['banners' => $banners, 'categories' => $categories, 'products' => $products]);
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
        $banner = new Banner;
        $banner->title = $request->title;
        $banner->content = $request->content;
        $banner->category_id = $request->category;
        $banner->position = $request->position;
        $banner->pageName = "index";

        $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
        $file = $request->file('imgSrc');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $check = in_array($extension, $allowedFileExtension);
        if ($check) {
            $msg = "Added successfully";
            $banner->imgSrc = $filename;
            $file->move(public_path('/images/banners'), $filename);
            $banner->save();
        } else {
            $msg = "Added fail";
        }

        return redirect()->route('admin.banner')->with('msg', $msg);

        // echo  "$filename $extension";
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
        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->content = $request->content;
        $banner->category_id = $request->category;
        $banner->position = $request->position;
        $banner->pageName = "index";
        if ($request->hasFile('imgSrc')) {
            $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $file = $request->file('imgSrc');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedFileExtension);
            if ($check) {
                $banner->imgSrc = $filename;
                $file->move(public_path('/images/banners'), $filename);
            }
        }
        $msg = "Added successfully";
        $banner->save();

        return redirect()->route('admin.banner')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Banner::find($id)->delete();
        return redirect()->route('admin.banner');
    }
}
