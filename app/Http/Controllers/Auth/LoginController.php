<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use http\Env\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//
//use Illuminate\Support\Facades\Auth;



//namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
//
//    /**
//     * Where to redirect users after login.
//     *
//     * @var string
//     */
//    protected $redirectTo = '/home';
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        echo __FUNCTION__;
////        $this->authenticate();
//
//        $this->middleware('guest')->except('logout');
//    }
////
////    public function name()
////    {
////        return 'name';
//////    }
////
//    public function authenticate()
//    {
//        echo __FUNCTION__;
//        if (Auth::attempt(['email' => '', 'password' => ''])) {
//            // 认证通过...
//
//            return redirect()->intended('dashboard');
//        }
//    }



    public function login(Request $request)
    {
        $name = $request->input('email');
        $password = $request->input('password');
        $test = $request->input('test');
        if (Auth::attempt(['email' => $name, 'password' => $password,'test'=>$test])) {
            // Authentication passed...
//            dd('ok');
                        return redirect()->intended('/test');

        }else{
            dd('error');
        }
    }



}
