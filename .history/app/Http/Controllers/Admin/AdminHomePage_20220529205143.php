<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;

class AdminHomePage extends Controller
{
    public function index() {

    }

    public function getUserTotal() {
        return User::all()->sum('id');
    }

    public function getNewOrder() {
        $orders = Order::all();
        $now = Carbon::now();
        $total = 0;
        foreach ($orders as $order) {
            $orderDate = Carbon::parse($order->order_date);
            $days = $now->diff($orderDate);
            if ($days <= 30) {
                $total++;
            }
        }
        return total;
    }

    // public function getUserTotal() {
    //     return User::all()->sum('id');
    // }
}
