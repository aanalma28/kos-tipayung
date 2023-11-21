<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'room_number' => 'required|max:5',
            'price' => 'required|max:20',
            'room_type' => 'required',
            'image' => 'required||file|image|max:10024',
            'status' => 'required',
            'description' => 'required|max:255'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('file-storage');
        }

        Room::create([
            'room_number' => $validateData['room_number'],
            'price' => $validateData['price'],
            'room_type' => $validateData['room_type'],
            'image' => $validateData['image'],
            'status' => $validateData['status'],
            'description' => $validateData['description']
        ]);

        return redirect('')->with('status', 'Room Added !');
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
        return view('', [
            'data' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
        $validateData = $request->validate([
            'room_number' => 'required|max:5',
            'price' => 'required|max:20',
            'room_type' => 'required',
            'image' => 'required||file|image|max:10024',
            'status' => 'required',
            'description' => 'required|max:255'
        ]);

        if($request->file('image')){
            if ($room->image && file_exists(storage_path('app/public/' . $room->image))){
                Storage::delete(['public/'.$room->image]);
                $validateData['image'] = $request->file('image')->store('file-storage');
            }
        }

        $room->update([
            'room_number' => $validateData['room_number'],
            'price' => $validateData['price'],
            'room_type' => $validateData['room_type'],
            'image' => $validateData['image'],
            'status' => $validateData['status'],
            'description' => $validateData['description']
        ]);

        return redirect('' . $room->id)->with('status', 'Room Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
        Room::destroy($room->id);
    }
}
