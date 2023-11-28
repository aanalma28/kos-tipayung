<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function authenticate(Request $request){        
        $credentials = $request->validate([
            'email' => 'required|email:dns|max:30',
            'password' => 'required|min:5|max:50'
        ]);        

        if(Auth::attempt($credentials)){                   
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('success','Login Success!');
        }        

        return redirect('/')->with('fail', 'Login Failed !');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request>session()->regenerateToken();
        return redirect('/');
    }
}
