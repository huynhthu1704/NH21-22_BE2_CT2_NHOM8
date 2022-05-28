<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = new Order;
        $orders = $order->with('customer')->get();
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
        // $order = Order::where('id', 1)->first();
        // $orderItems = OrderItem::where('order_id', 1)->get();
        // $arr = [];
        // // dd($orderItems);
        // $arr = [];
        // foreach ($orderItems as $key => $value) {
        //     $product = Product::find($value['product_id']);
        //     $arr['item'.$value['id']] = [
        //             'product_id' => $product->id,
        //             'product_name' => $product->product_name,
        //             'quantity' => $value['quantity'],
        //             'price' => $value['price'],
        //             'discount_price'=> $value['discount_price']
        //     ];
        // }
        // $order['item'] = $arr;
        $order = Order->with('orderItem')->get();
        dd($orders);

        // dd($order);

        return view('admin.order-detail', ['order' => $order]);
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
