<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(!session()->has("user")){
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        $orders = Order::where("user_id", '=', $user->id)->orderBy('created_at','desc');

        $data = 
        [
            'user' => $user,
            'orders' => $orders
        ];
        return view('dashboard',  $data);
    }

    public function setProfile(Request $request)
    {
        $input = $request->all();
     
    }
}
