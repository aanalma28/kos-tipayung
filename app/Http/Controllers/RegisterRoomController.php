<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterRoom;
use App\Mail\RegisterRoomMail;
use Illuminate\Support\Facades\Mail;

class RegisterRoomController extends Controller
{
    //
    public function index(){
        return view('');
    }

    public function create(Request $request){
        $arrayData = $request->all();

        $validateData = $request->validate([
            'name' => 'required|max:20',            
            'email' => 'required|email:dns|max:50',
            'phone' => 'required|max:12',
            'image' => 'required|file|image|max:10024'
        ]);

        RegisterRoom::create([
            $validateData
        ]);

        Mail::to($validateData['email'])->send(new RegisterRoomMail($arrayData));

        return redirect('')->with('status', 'Data has been send !');
    }
}
