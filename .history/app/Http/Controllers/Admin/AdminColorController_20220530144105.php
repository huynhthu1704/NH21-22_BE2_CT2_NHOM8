<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Image;

class AdminColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.color',['colors'=>$colors]);
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
        $color = new Color;
        $color->color_name = $request->color_name;
        $color->color_code = $request->color_code;
        $color->save();
        return redirect()->route('admin.color');
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
       
            $color = Color::find($id);
  
            $color->color_name = $request->name;
            $color->color_code = $request->code;
            $msg = "Added successfully";
            $color->save();
    
       
       
        return redirect()->route('admin.color', ['msg' => $msg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Image::where('cocor_id', $id);
        dd($images);
        if (empty($images)) {
            $color = Color::find($id);
  
            $color->color_name = $request->name;
            $color->color_code = $request->code;
            $msg = "Added successfully";
            $color->save();
    
        } else {
            $msg = "Can not delete this color";
        }
       
        $color = Color::find($id)->delete();
        return redirect()->route('admin.color');
    }
}
