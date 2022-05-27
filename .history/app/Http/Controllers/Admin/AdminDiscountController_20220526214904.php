<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class AdminDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.discount', ['discounts' => Discount::all()]);
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
        $discount = new Discount;
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
            $file->move(public_path('/images/banners'),$filename);
            $banner->save();
        } else {
            $msg = "Added fail";
        }

        return redirect()->route('admin.banner', ['msg' => $msg]);
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
