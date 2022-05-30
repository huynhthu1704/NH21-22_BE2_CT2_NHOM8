<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Session;
>>>>>>> f30ce465827fdb15d2967c29cb31ed0c178ed806

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders as o')
            ->select(array(DB::Raw('sum(o.total) as revenue'), DB::Raw('DATE(o.order_date) day')))
            ->groupBy('day')
            ->orderBy('o.order_date')
            ->get();
        $renderData = [];
        foreach ($orders as $order) {
            $day = Carbon::parse($order->day)->format('l');
            $total = (int) $order->revenue;
            $data = ['y' => $total, 'label' => $day];
            array_push($renderData, $data);
        }

        return view('admin.index', ['renderData' => $renderData]);
    }
    public function getUserTotal()
    {
        return User::all()->count('id');
    }

    public function getNewOrder()
    {
        $orders = Order::all();
        $now = Carbon::now();
        $total = 0;
        foreach ($orders as $order) {
            $orderDate = Carbon::parse($order->order_date);
            $days =  $now->diffInDays($orderDate);
            if ($days <= 30) {
                $total++;
            }
        }
        return $total;
    }

    public function login()
    {
        if (Session::has('admin') && !empty(Session::get('admin'))) {
            return redirect()->route('admin.home');
        } else {
            return view('admin.login');
        }
    }

    public function actionLogin(Request $request)
    {
        $input = $request->all();
        $admin = User::where('username', '=', $input['username'])->where('password', '=', md5($input['password']))
            ->where('role_id', '=', 1)->first();
        if ($admin) {
            session()->put('admin', $admin);
            return redirect()->route('admin.home');
        } else {
            return redirect()->back()->withErrors(['loginfails' => 'Username or password is wrong']);
        }
    }
    public function actionLogout(Request $request)
    {
       Session::forget('admin');
       return redirect()->route('admin.login');
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
