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
            'image' => 'required|image|file|max:10024',
        ]);        

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('pembayaran');
        }

        Pembayaran::create([
            'user_id' => $validatedData['user_id'],
            'room_id' => $validatedData['room_id'],
            'tanggal_pembayaran' => $validatedData['waktu'],
            'image' => $validatedData['image']
        ]);

        return redirect('/dashboard')->with('success', 'Payment evidence has been send !');
    }
}
