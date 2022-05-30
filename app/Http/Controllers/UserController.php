<?php

namespace App\Http\Controllers;

use App\Mail\RePasswordMail;
use App\Mail\WelcomeMail;
use App\Models\Category;
use App\Models\ResetPass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password as FacadesPassword;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
            ->where('password', md5($request->input('password')))->where('role_id', '=', 2)->first();

        if ($user->status == 'Blocked') {
            return Redirect::route('auth.login')->withErrors(
                [
                    'loginfail' => 'Account has been locked'
                ]
            );;
        }

        if ($user) {
            session()->put('user', $user);
            return redirect(route('index'));
        } else {
            return Redirect::back()->withErrors(
                [
                    'loginfail' => 'Username or password is wrong'
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
            'register-fullname' => 'required|min:10',
            'register-city' => 'required',
            'register-district' => 'required',
            'register-ward' => 'required',
            'register-address' => 'required',
            'register-phone' => 'required|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
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
            'fullname' => $request->input('register-fullname'),
            'phone' => $request->input('register-phone'),
            'city' => $request->input('register-city'),
            'district' => $request->input('register-district'),
            'ward' => $request->input('register-ward'),
            'address' => $request->input('register-address'),
            'gender' => $request->input('register-gender'),
            'join_day' => now(),
            'role_id' => 2
        ]);

        Mail::to($request->input('register-email'))->send(new WelcomeMail());
        session()->flash('message', 'Your account is created');
        return redirect()->route('auth.login');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('index');
    }

    public function updatePass(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'password' => ['required',  Password::min(8)->letters()->numbers()],
            'confirmPassword' => ['required',  Password::min(8)->letters()->numbers()],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['password' => 'Password doesn\'t matching']);
        }

        $user = User::where('email', '=', $input['email'])->where('role_id', '=', 2)->first();
        $session = ResetPass::where('reset_token', '=', $input['token'])->where('email', '=', $input['email'])->first();
        
        if ($session) {
            
            if ($user && $input['password'] == $input['confirmPassword']) {
                $user->password = md5($input['password']);
                $user->save();
            
                session()->flash('message', 'Reset password successfully');
                $session->delete();
                return redirect()->route('auth.login');
            }
            else{
                return redirect()->back()->withErrors(['password' => 'Password is invalid']);
            }
        }
        else{
            return redirect()->route('verify.form')->withErrors(['email' => 'Request Invalid']);
        }
        
    }

    public function resetPasswordForm(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'email' => 'required',
            'token' => 'required',
        ]);

        $session = ResetPass::where('reset_token', '=', $input['token'])->where('email', '=', $input['email'])->first();
     
        if ($session) {
            if(time() - $session->reset_at > 360){
                return redirect()->route('verify.form')->withErrors(['email' => 'Session is over']);
            }
            return view('ResetPass', ['email'=>  $input['email'], 'token' =>  $input['token']]);
        }
        else{
            return redirect()->route('verify.form')->withErrors(['email' => 'Request Invalid']);
        }
    }

    public function forget()
    {
        return view('forget');
    }

    public function setResetSession(Request $request)
    {
        $email = $request->input('email');
        $token = self::generateRandomString(30);
        $time = time();

        $check = User::where('email', '=', $email)->where('provider', '=', 'normal')->where('role_id', '=', 2)->get();

        if ((count($check) > 0)) {
            $reset = new ResetPass;
            $reset->email = $email;
            $reset->reset_token = $token;
            $reset->reset_at = $time;
            $reset->save();
            Session::flash('message', "Email verification sent");

            Mail::to($email)->send(new RePasswordMail($email, $token));
            return redirect()->back();
        }
        else{
            return redirect()->back()->withErrors(['email' => 'Email doesn\'t exist']);
        }

    }

    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
}
