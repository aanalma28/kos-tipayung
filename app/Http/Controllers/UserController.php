<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:20',
            'username' => 'required|max:12',
            'email' => 'required|unique:users|email:dns|max:50',
            'password' => 'required|min:5|max:20',
            'phone' => 'required|max:12',
            'role' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create([
            'role' => $validateData['role'],
            'name' => $validateData['name'],
            'username' => $validateData['username'],
            'email' => $validateData['email'],
            'password' => $validateData['password'],
            'phone' => $validateData['phone']
        ]);

        $request->session()->flash('status', 'Registration Successfull !');
        return redirect();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('', [
            'data' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:20',
            'username' => 'required|max:12',
            'email' => 'required|unique:users|email:dns|max:50',
            'password' => 'required|min:5|max:20',
            'phone' => 'required|max:12',
            'role' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        $user->update([
            'role' => $validateData['role'],
            'name' => $validateData['name'],
            'username' => $validateData['username'],
            'email' => $validateData['email'],
            'password' => $validateData['password'],
            'phone' => $validateData['phone']
        ]);
        
        return redirect('' . $user->id)->with('status', 'User Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        User::destroy($user->id);
    }
}