<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('order_date', '>=', Carbon::now()->subDays(7)->toDateTimeString())->get();
        //  dd($orders);
        //     $data = [];
        $dataPoints = array(
            array("y" => 25, "label" => "Sunday"),
            array("y" => 15, "label" => "Monday"),
            array("y" => 25, "label" => "Tuesday"),
            array("y" => 5, "label" => "Wednesday"),
            array("y" => 10, "label" => "Thursday"),
            array("y" => 0, "label" => "Friday"),
            array("y" => 20, "label" => "Saturday")
        );

        $renderData = [];
        // dd($orders);
        foreach ($orders as $order) {
            $day = Carbon::parse($order->order_date->format('l');
            $total = (int) $order->total;
            $data = ['y' => $total, 'label' => $day];
            array_push($renderData, $data);
        }
        // return json_encode($renderData);
        // dd($renderData);
        // $data['chart_data'] = json_encode($data);
        return view('admin.index', ['renderData' => $renderData]);
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
        //
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
