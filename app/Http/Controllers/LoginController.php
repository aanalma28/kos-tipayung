<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required|max:20',
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
