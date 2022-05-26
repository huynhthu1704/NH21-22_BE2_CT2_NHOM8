<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::addSelect([
            'category_name' => Category::select('category_name')
                ->whereColumn('category_id', 'id')
        ])->get();
        $categories = Category::all();

        return view('admin.banner', ['banners' => $banners, 'categories' => $categories]);
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

        $allowedFileExtension=['pdf','jpg','png','docx'];
        $file = $request->file('imgSrc');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $check=in_array($extension,$allowedFileExtension);
        if($check){
            $msg = "Added successfully";
            $banner->imgSrc = $request->file('imgSrc');
            $banner->save();
        } else {
            $msg = "Added fail";
        }
        // return redirect()->route('admin.banner', compact($msg));
    
        echo  $request->file('imgSrc');
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
