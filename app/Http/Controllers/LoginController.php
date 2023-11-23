<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns|max:30',
            'password' => 'required|min:5|max:50'
        ]);

        if(Auth::attempt($credentials)){            
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('Error', 'Login Failed !');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request0>session()->regenerateToken();
        return redirect('/login');
    }
}
