<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::where('order_date', '>=', Carbon::now()->subDays(7)->toDateTimeString())->groupBy(function($date) {
        //     // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
        //     //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        // })->get();
        $orders = DB::table('orders as o')
        ->select(array(DB::Raw('sum(o.total) as revenue'),DB::Raw('DATE(o.order_date) day')))
        ->groupBy('day')
        ->orderBy('o.order_date')
        ->get();
        $renderData = [];
        foreach ($orders as $order) {
            $day = Carbon::parse($order->day)->format('l');
            $total = (int) $order->revenue;
            $data = ['y' => $total, 'label' => $day];
            array_push($renderData, $data);
        }
        return json_encode($renderData);
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
