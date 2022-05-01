<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Arr;


class LoginController extends Controller
{
    public function login(){

        Session::push('previous_url',url()->previous());

        if(Auth::check()){
            return redirect()->back();
        }
        return view('front-end.login');
    }

    public function postLogin(LoginRequest $request){

        $remember = $request->get('remember') == 'on' ? true : false;
        $credentials = $request->only('email', 'password');
        
        if(is_numeric($request->get('email'))){
            $credentials = [
                'phone' => $request->email,
                'password' => $request->password
            ];
        }

        if(Auth::attempt($credentials,$remember))  {
            $last_url = Arr::last(Session::get('previous_url'));
            return redirect($last_url);
            // return redirect('/');
        }else{
            return back()->with('error','Your username or password are wrong! Please reconfirm it. ');
        }
        
    }



    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

}
