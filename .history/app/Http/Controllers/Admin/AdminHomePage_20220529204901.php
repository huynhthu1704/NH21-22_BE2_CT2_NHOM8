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
        
        $now = Carbon::now();

        return User::all()->sum('id');
    }

    // public function getUserTotal() {
    //     return User::all()->sum('id');
    // }
}
