<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ShippingFee;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Session::has('user')) {
            return view('checkout');
        } else {
            return redirect()->route('auth.login');
        }
    }
    public function getShipping()
    {
        $shippings = ShippingFee::all();
        return response()->json($shippings);
    }
    public function placeOrder(Request $request)
    {
        $user = Session::get('user');
        $customer = new Customer;
        $customer->first_name = $request->input('fname');
        $customer->last_name = $request->input('fname');
        $customer->address = $request->input('address');
        $customer->city = $request->ls_province;
        $customer->district = $request->input('ls_district');
        $customer->ward = $request->input('ls_ward');
        $customer->phone_number = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->save();

        $order = new Order;
        $order->customer_id = $customer->id;
        $order->user_id = $user->id;
        $order->quantity = $request->input('quantity');
        $order->subtotal = $request->input('subtotal');
        $order->shipping_fee = $request->input('shipping_fee');
        $order->total = $request->input('total');
        $order->note = $request->input('note');
        $order->save();

        $carts = Session::get('cart');
       
        foreach ($carts as  $item) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->user_id = $user->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->color_id = $item['color_id'];
            $orderItem->color_name = $item['color_name'];
            $orderItem->product_name = $item['product_name'];
            $orderItem->category_name = $item['category_name'];
            $orderItem->image_src = $item['src'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->discount_price = $item['sales_price'];
            $orderItem->save();
        }
        
        Session::forget('cart');
        return redirect()->route('dashboard');
    }
}
