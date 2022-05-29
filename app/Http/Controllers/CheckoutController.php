<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }
    public function placeOrder(Request $request)
    {
       $customer = new Customer;
       $customer->first_name = $request->input('fname');
       $customer->last_name = $request->input('fname');
       $customer->city = $request->ls_province;
       $customer->distric = $request->input('ls_district');
       $customer->ward = $request->input('ls_ward');
       $customer->phone_number = $request->input('phone');
       $customer->email = $request->input('email');
    //    $customer->save();

    //    $order = new Order;
    //    $order->customer_id = $customer->id;
    //    $order->user_id = Auth::id();
    //    $order->quantity = $request->quantity;
    //    $order->subtotal = $request->subtotal;
    //    $order->shipping_fee = $request->shipping_fee;
    //    $order->total = $request->total;
    //    $order->order_date = Carbon::now();
        dd(Carbon::now());

    }
}
