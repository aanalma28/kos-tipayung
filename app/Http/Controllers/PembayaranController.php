<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    //

    public function store(Request $request){
        $validatedData = $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'waktu' => 'required',
            'image' => 'required|file|image|max:10024',
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('pembayaran');
        }

        Pembayaran::create([
            'user_id' => $validateData['user_id'],
            'room_id' => $validateData['room_id'],
            'tanggal_pembayaran' => $validateData['waktu'],
            'image' => $validateData['image']
        ]);

        return redirect('/dashboard')->with('success', 'Data has been send !');

    }
}
