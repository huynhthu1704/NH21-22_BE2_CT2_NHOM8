<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use App\Models\User;
use Exception;
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
        $orders = Order::select('*')->with(["orderItem"])->where("user_id", '=', $user->id)->orderBy('created_at', 'desc')->get();

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
                'fullname' => 'required',
                'phone' => 'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
                'address' => 'required|max:2000',
                'city' => 'require',
                'district' => 'require',
                'ward' => 'require',
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
                        'city' => $input['city'],
                        'district' => $input['district'],
                        'ward' => $input['ward'],
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
                'fullname' => 'required',
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
                    'city' => $input['register-city'],
                    'district' => $input['register-district'],
                    'ward' => $input['register-ward'],
                    'gender' => $input['gender'],
                ]
            );
            Session::put('user', User::find($user->id));
            return json_encode(true);
        }
    }

    public function review(Request $request)
    {
        $input = $request->all();
        $user = Session::get('user');
        $review = new Review;


        try {
            $review->user_id = $user->id;
            $review->product_id = $input['product_id'];
            $review->rating_value = $input['rating_value'];
            $review->content = $input['content'];
            $review->save();

            $order = OrderItem::find($input['order_item_id']);
            $order->isReviewed = true;
            $order->save();

            return response()->json(true);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
