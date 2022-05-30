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
        $orders = Order::select(
            "id" ,
            // DB::raw("(sum(total)) as revenue"),
            DB::raw("(DATE_FORMAT(order_date, '%d-%m-%Y')) as date")
            )
            ->orderBy('order_date')
            // ->groupBy(DB::raw("DATE_FORMAT(date, '%d-%m-%Y')"))
            ->get();

        $renderData = [];
        // // $o = $orders->distinct()->count('pid');
        // dd($orders);
        // foreach ($orders as $order) {
        //     $day = Carbon::parse($order->order_date)->format('l');
        //     $total = (int) $order->total;
        //     $data = ['y' => $total, 'label' => $day];
        //     array_push($renderData, $data);
        // }
        // return json_encode($renderData);
        dd($orders);
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
