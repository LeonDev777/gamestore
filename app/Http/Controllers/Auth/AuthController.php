<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required|email|exists:users,email',
            'password'=> 'required|max:30'
        ],[
            'email.exists' => "Este email não esta cadastrado"
        ]);

        $credentials = [
            'email' => $request -> email,
            'password' => $request -> password
        ];

        if(Auth::guard('web')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('site.home');
        }else{
            return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem']);
        }

    }

    public function logout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }

}
