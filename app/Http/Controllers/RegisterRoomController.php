<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\RegisterRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterRoomController extends Controller
{
    //
    public function index(){
        return view('guest.detail');
    }

    public function create(Request $request){
        $arrayData = $request->all();

        $validateData = $request->validate([
            'room_number' => 'required',
            'name' => 'required|max:20',
            'email' => 'required|email:dns|max:50',
            'phone' => 'required|max:12',
            'image' => 'required|file|image|max:10024'
        ]);


        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('ktp');
        }

        RegisterRoom::create([
            'room_number' => $validateData['room_number'],
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'phone' => $validateData['phone'],
            'image' => $validateData['image']
        ]);

        Mail::to($validateData['email'])->send(new RegisterMail($arrayData));

        return redirect('/success')->with('success', 'Data has been send !');
    }
}
