<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    //
    public function store(Request $request){
        $vallidateData = $request->validate([
            'id_user' => 'required',
            'id_room' => 'required',
            'date_now' => 'required',
            'status' => 'required',
            'image' => 'required|image|file|max:10024'
        ]);

        if($request->file('image')){
            $vallidateData['image'] = $request->file('image')->store('bukti_pembayaran');
        }

        Pembayaran::create([
            'user_id' => $vallidateData['id_user'],
            'room_id' => $vallidateData['id_room'],
            'tanggal_pembayaran' => $vallidateData['date_now'],
            'status' => $vallidateData['status'],
            'image' => $vallidateData['image']
        ]);

        return redirect('/dashboard')->with('success', 'Bukti pembayaran sudah dikirim');
    }
}
