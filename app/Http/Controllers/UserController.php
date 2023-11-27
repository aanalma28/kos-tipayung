<?php

namespace App\Http\Controllers;



use App\Models\Room;
use App\Models\User;
use App\Mail\RegisterMail;
use App\Models\RegisterRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('owner.user', [
            'datas' => User::where('role', 'penyewa')->get(),
            'register_room' => new RegisterRoom
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('owner.createuser', [
            'rooms' => Room::where('status', 'tersedia')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $validateData = $request->validate([            
            'name' => 'required|max:20',
            'email' => 'required|unique:users|email:dns|max:50',
            'password' => 'required|min:5|max:20',
            'phone' => 'required|max:12',
            'room_number' => 'required'
        ]);        
        
        $arrayData = [
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => $validateData['password']
        ];

        Mail::to($validateData['email'])->send(new RegisterMail($arrayData, 'giveaccountemail'));

        if(DB::table('users')->where('email', $validateData['email'])->exists()){
            return redirect('/user/create')->with('error', 'Email sudah terdaftar !');
        }

        $validateData['password'] = bcrypt($validateData['password']);

        // dd($validateData);
        $room = Room::where('room_number', $validateData['room_number'])->first();                

        if(!$room){
            return redirect('/user/create')->with('error', 'Nomor kamar tidak ditemukan');
        }

        User::create([
            'role' => 'penyewa',
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => $validateData['password'],
            'phone' => $validateData['phone'],
        ]);        

        $user = User::where('email', $validateData['email'])->first();        
        
        $room->update([
            'user_id' => $user->id,
            'status' => 'disinggahi'
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
        return view('owner.editroom', [
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
            'name' => 'required|max:20',
            'email' => 'required|unique:users|email:dns|max:50',
            'password' => 'required|min:5|max:20',
            'phone' => 'required|max:12',
            'role' => 'required|max:20',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        $user->update([
            'role' => $validateData['role'],
            'name' => $validateData['name'],
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
        $room = Room::where('user_id', $user->id)->first();
        $room->update([
            'user_id' => null,
            'status' => 'tersedia'
        ]);
        return redirect('/user')->with('success', 'User has been deleted !');
    }
}
