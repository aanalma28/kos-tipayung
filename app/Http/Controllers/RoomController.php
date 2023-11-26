<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('owner.kamar', [
            'datas' => Room::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('owner.createroom');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->nomor_kamar);
        $validateData = $request->validate([
            'nomor_kamar' => 'required|max:20',
            'status' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|max:20',
            'foto_kamar' => 'required|image|file|max:10024',
        ]);        
        
        if(DB::table('rooms')->where('room_number', $validateData['nomor_kamar'])->exists()){
            return redirect('/room')->with('error', 'Nomor Kamar Sudah ada !');            
        }

        if($request->file('foto_kamar')){
            $validateData['foto_kamar'] = $request->file('foto_kamar')->store('rooms');
        }        

        Room::create([
            'room_number' => $validateData['nomor_kamar'],
            'price' => $validateData['harga'],   
            'image' => $validateData['foto_kamar'],
            'status' => $validateData['status'],
            'description' => $validateData['deskripsi']
        ]);

        return redirect('/room')->with('success', 'Room Added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
        return view('', [
            'data' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
        return view('owner.editroom', [
            'data' => $room,
            'options' => ['Tersedia', 'Disinggahi'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //        
        $validateData = $request->validate([
            'nomor_kamar' => 'required|max:5',
            'deskripsi' => 'required|max:255',
            'harga' => 'required|max:20',        
            'foto_kamar' => 'file|image|max:10024',
            'status' => 'required',
        ]);  

        if($request->file('foto_kamar')){
            if ($room->image && file_exists(storage_path('app/public/' . $room->image))){                
                Storage::disk('local')->delete(['public/'.$room->image]);
                $validateData['foto_kamar'] = $request->file('foto_kamar')->store('rooms');                
            }            
        }

        if($request->file('foto_kamar')){
            $room->update([
                'room_number' => $validateData['nomor_kamar'],
                'price' => $validateData['harga'],
                'image' => $validateData['foto_kamar'],
                'status' => $validateData['status'],
                'description' => $validateData['deskripsi']
            ]);
        }else{
            $room->update([
                'room_number' => $validateData['nomor_kamar'],
                'price' => $validateData['harga'],            
                'status' => $validateData['status'],
                'description' => $validateData['deskripsi']
            ]);
        }


        return redirect('/room')->with('success', 'Room Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
        Room::destroy($room->id);
        Storage::disk('local')->delete(['public/'.$room->image]);
        return redirect('/room')->with('success', 'Room has been deleted !');
    }
}
