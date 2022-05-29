<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingFee as ModelsShippingFee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ShippingFee;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Session::has('user')){
            return view('checkout');
        }else{
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
       $order->order_date = now();
        $order->save();

        $carts = Session::get('cart');
        $orderItem = new OrderItem;
        $orderItem->order_id = $order->id;
        foreach ($carts as  $item) {
            $orderItem->product_id = $item['product_id'];
            $orderItem->color_id = $item['color_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->discount_price = $item['sales_price'];
        }
        $orderItem->save();

    }
}
