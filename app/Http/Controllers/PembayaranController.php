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
            'url' => 'max:255',
            'image' => 'required|image|file|max:10024',
        ]);

        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('pembayaran');
        // }

        Pembayaran::create([
            'user_id' => $validatedData['user_id'],
            'room_id' => $validatedData['room_id'],
            'tanggal_pembayaran' => $validatedData['waktu'],
            'image' => $validatedData['url']
        ]);

        return redirect('/dashboard')->with('success', 'Payment evidence has been send !');
    }

    public function accept(Pembayaran $pembayaran){
        $pembayaran->update([
            'status' => 'lunas'
        ]);

        // Mail::to($user->email)->send(new RegisterMail($arrayData, 'acceptemail'));
        return redirect('/dashboard')->with('success', 'Accept feedback send !');
    }

    public function reject(Pembayaran $pembayaran){
        $pembayaran->update([
            'status' => 'tidak valid'
        ]);

        // Mail::to($user->email)->send(new RegisterMail($arrayData, 'acceptemail'));
        return redirect('/dashboard')->with('success', 'Accept feedback send !');
    }
}
