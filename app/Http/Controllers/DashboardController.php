<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has("user")) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        $orders = Order::where("user_id", '=', $user->id)->orderBy('created_at', 'desc');

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
        $user = Session::get('user');

        if ($user->provider == 'normal') {
            $validator = Validator::make($request->all(), [
                'password' => ['required',  Password::min(8)->letters()->numbers()],
                'new-password' => ['required',  Password::min(8)->letters()->numbers()],
                'confirm-password' => ['required',  Password::min(8)->letters()->numbers()],
                'email' => 'required|email',
                'birthday' => 'required|before:-10 year',
                'fullname' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
                'phone' => 'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
                'address' => 'required|max:2000',
                'gender' => 'required', 'max:5'
            ]);

            if ($validator->fails()) {
                return json_encode($validator->errors());
            }

            if (md5($input['password']) == $user->password && $input['new-password'] == $input['confirm-password']) {
                DB::table('users')->where('id', '=', $user->id)->update(
                    [
                        'email' => $input['email'],
                        'password' => $input['new-password'],
                        'birthday' => $input['birthday'],
                        'fullname' => $input['fullname'],
                        'phone' => $input['phone'],
                        'address' => $input['address'],
                        'gender' => $input['gender'],
                    ]
                );
            }
            Session::put('user', User::find($user->id));
            return json_encode(true);
        } else {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'birthday' => 'required|before:-10 year',
                'fullname' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
                'phone' => 'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
                'address' => 'required|max:2000',
                'gender' => 'required', 'max:5'
            ]);

            if ($validator->fails()) {
                return json_encode($validator->errors());
            }

            DB::table('users')->where('id', '=', $user->id)->update(
                [
                    'email' => $input['email'],
                    'birthday' => $input['birthday'],
                    'fullname' => $input['fullname'],
                    'phone' => $input['phone'],
                    'address' => $input['address'],
                    'gender' => $input['gender'],
                ]
            );
            Session::put('user', User::find($user->id));
            return json_encode(true);
        }
    }
}
