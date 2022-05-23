<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function show_form_login()
    {
        if (session()->has('user')) {
            return redirect()->route('index');
        }
        session()->remove('keepRegisterForm');
        $categories = Category::all();
        return view('login', ['categories' => $categories]);
    }

    public function show_form_register()
    {
        if (session()->has('user')) {
            return redirect()->route('index');
        }
        session()->flash('keepRegisterForm', true);
        $categories = Category::all();
        return view('login', ['categories' => $categories]);
    }


    public function process_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|regex:/\w*$/|max:255',
            'password' => ['required',  Password::min(8)->letters()->numbers()],
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth.login')->withErrors($validator)->withInput();
        }

        $user = DB::table('users')->where('username', $request->input('username'))
            ->where('password', md5($request->input('password')))->first();

        if ($user) {
            session()->push('user', $user);
            return redirect(route('index'));
        } 
        else {
            return Redirect::back()->withErrors(
                [
                    'loginfail' => 'Email or password is wrong'
                ]
            );;
        }
    }

    public function process_signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'register-username' => 'required|string|regex:/\w*$/|max:255|unique:users,username',
            'register-password' => ['required',  Password::min(8)->letters()->numbers()],
            'register-email' => 'required|email',
            'register-birthday' => 'required|before:-10 year',
            'register-fullname' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/',
            'register-phone' => 'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'register-address' => 'required|max:2000',
            'register-gender' => 'required', 'max:5'
        ]);
        
        $request->flash();

        if ($validator->fails()) {
            return redirect()->route('auth.register')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'username' => $request->input('register-username'),
            'password' => md5($request->input('register-password')),
            'email' => $request->input('register-email'),
            'birthday' => $request->input('register-birthday'),
            'full_name' => $request->input('register-fullname'),
            'phone' => $request->input('register-phone'),
            'address' => $request->input('register-address'),
            'gender' => $request->input('register-gender'),
            'join_day' => now(),
            'role_id' => 2
        ]);

        session()->flash('message', 'Your account is created');

        return redirect()->route('auth.login');
    }


    public function logout()
    {
        Auth::logout();
        session()->flush();

        return redirect()->route('index');
    }
}
