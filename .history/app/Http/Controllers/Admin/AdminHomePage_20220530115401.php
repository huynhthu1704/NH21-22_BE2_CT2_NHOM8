<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;

class AdminHomePage extends Controller
{

    public function getUserTotal() {
        return User::all()->count('id');
    }

    public function getNewOrder() {
        $orders = Order::all();
        $now = Carbon::now();
        $total = 0;
        foreach ($orders as $order) {
            $orderDate = Carbon::parse($order->order_date);
            $days =  $now->diffInDays($orderDate);
            // dd($days);
            if ($days <= 30) {
                $total++;
            }
        }
        return $total;
    }

}
