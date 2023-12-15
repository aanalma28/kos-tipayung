<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Mail\RegisterMail;
use App\Models\RegisterRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterRoomController extends Controller
{
    //
    public function index(Room $room){
        return view('guest.detail',[
            'data'=>$room,
        ]);
    }

    public function create(Request $request){
        $arrayData = $request->all();

        $validateData = $request->validate([
            'room_number' => 'required',
            'status' => 'required',
            'name' => 'required|max:20',
            'email' => 'required|email:dns|max:50',
            'phone' => 'required|max:12',
            'url' => 'max:255',
            'image' => 'required|file|image|max:10024'
        ]);


        // if($request->file('image')){
        //     $validateData['image'] = $request->file('image')->store('ktp');
        // }

        RegisterRoom::create([
            'room_number' => $validateData['room_number'],
            'status' => $validateData['status'],
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'phone' => $validateData['phone'],
            'image' => $validateData['url']
        ]);

        Mail::to($validateData['email'])->send(new RegisterMail($arrayData, 'email'));

        return redirect('/')->with('success', 'Data has been send !');
    }

    public function account($id)
    {   $data = RegisterRoom::find($id);
        return view('owner.createuser',[
            'data' =>$data,
            'rooms' => Room::where('status', 'tersedia')->get(),
        ]);
    }
}
