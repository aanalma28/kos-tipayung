<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('createuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|max:50',
            'email' => 'required|max:100|unique:users|email:dns',
            'phone' => 'required|max:12',
            'password' => 'required|max:50',
            'role' => 'required|max:20',
        ]);                

        if(DB::table('users')->where('email', $validateData['email'])->exists()){
            return redirect('/user')->with('error', 'Email sudah terdaftar !');
        }

        $validateData['password'] = bcrypt($validateData['password']);        

        // dd($validateData);

        User::create([
            'role' => $validateData['role'],
            'name' => $validateData['name'],
            'username' => $validateData['username'],
            'email' => $validateData['email'],
            'password' => $validateData['password'],
            'phone' => $validateData['phone'],
        ]);                
        
        return redirect('/user')->with('success', 'User has been added !');
        
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
        return view('edituser', [
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|max:50',
            'email' => 'required|max:100|unique:users|email:dns',
            'phone' => 'required|max:12',
            'password' => 'required|max:50',
            'role' => 'required|max:20',
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
        
        return redirect('/user' . $user->id)->with('success', 'User Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        User::destroy($user->id);
        return redirect('/user')->with('success', 'User has been deleted !');
    }
}
