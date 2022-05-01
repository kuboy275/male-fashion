<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;



class RegisterController extends Controller
{
    public function register(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('front-end.register');
    }

    public function postRegister(Request $request) {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, 
            'password' =>Hash::make($request->password)
        ];

        if($request->password == $request->password_confirmation){
            $user = User::create($data);
        }

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->to('/');
        }

    }
}
