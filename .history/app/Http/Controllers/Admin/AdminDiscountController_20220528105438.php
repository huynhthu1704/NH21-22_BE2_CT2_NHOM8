<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
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
        if ($request->startDay > $request->endDay) {
            $msg = "Start day can not greater than finish day ";
        } else {
            $discount->discount_value = $request->value;
            $discount->start_at = $request->startDay;
            $discount->finish_at = $request->endDay;
            $discount->save();
            $msg = "Add successfully";
        }
        return redirect()->back()->with('msg', $msg);
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
        if ($request->startDay > $request->endDay) {
            $msg = "Start day can not greater than finish day ";
        } else {
            $discount = Discount::find($id);
            $discount->discount_value = $request->value;
            $discount->start_at = $request->startDay;
            $discount->finish_at = $request->endDay;
            $discount->save();
            $msg = "Edit successfully";
        }
        return redirect()->back()->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
       
       Discount::find($id)->delete();
       $msg = "Delete successfully";
       return redirect()->back()->with('msg', $msg);
    }
}
