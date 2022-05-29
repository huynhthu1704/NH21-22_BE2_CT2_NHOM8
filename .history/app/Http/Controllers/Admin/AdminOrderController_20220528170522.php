<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        foreach ($orders as $key1 => $value1) {
            $customers = Customer::where('id', $value1['customer_id'])->get(['first_name', 'last_name']);
            foreach ($customers as $key2 => $value2) {
                $value1['customer_name'] = $value2->first_name.$value2->last_name;
            }
        }
        // dd($orders);
        return view('admin.order', ['orders' => $orders]);
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
        $order = Order::where('id', 1)->first();
        $orderItems = OrderItem::where('order_id', 1)->get();
        $arr = [];
        // dd($orderItems);
        foreach ($orderItems as $key => $value) {
            $oder[$value['id']] = [
                    'product_id' => $value['product_id'],
                    'quantity' => $value['quantity'],
                    'price' => $value['price'],
                    'discount_price'=> $value['discount_price']
            ];
        }
        dd($arr);

        return view('admin.order-detail', ['orderItems' => OrderItem::all()]);
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
