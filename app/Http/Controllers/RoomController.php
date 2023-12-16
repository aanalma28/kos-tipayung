<?php

namespace App\Http\Controllers;


use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

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

    private $imgbbApiKey = 'b0f3a62774de5dcafa2985a088e0d9a3';

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nomor_kamar' => 'required|max:20',
            'status' => 'required',
            'deskripsi' => 'required|max:255',
            'harga' => 'required|max:20',
            'url' => 'required',
        ]);

        if(DB::table('rooms')->where('room_number', $validateData['nomor_kamar'])->exists()){
            return redirect('/room')->with('fail', 'Nomor Kamar Sudah ada !');
        }
        // if ($request->file('foto_kamar')) {
        //     $file = $request->file('foto_kamar');
        //     $imageData = file_get_contents($file);
        //     dd(base64_encode($imageData));
        //     $client = new Client();
        //     $response = $client->post('https://www.imghippo.com/v1/upload', [
        //         'headers' => [
        //             'Authorization' => '7CH4pYvJpjeIgXS5pVCv8wtHUQfhiAyS',
        //         ],
        //         'multipart' => [
        //             [
        //                 'name' => 'foto_kamar',
        //                 'contents' => base64_encode($imageData),
        //             ],
        //         ],
        //     ]);

        //     if ($response->successful()) {
        //         $imageUrl = $response->json()['data']['url'];

        //         return response()->json(['message' => 'Image uploaded successfully', 'url' => $imageUrl]);
        //     } else {
        //         return response()->json(['message' => 'Failed to upload image'], 500);
        //     }


            // Save the Imgur link in your database
            Room::create([
                'room_number' => $validateData['nomor_kamar'],
                'price' => $validateData['harga'],
                'image' => $validateData['url'],
                'status' => $validateData['status'],
                'description' => $validateData['deskripsi']
            ]);
        // }
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
            'nomor_kamar' => 'required|max:20',
            'status' => 'required',
            'deskripsi' => 'required|max:255',
            'harga' => 'required|max:20',
            'url' => 'max:255',
        ]);

        // if($request->file('foto_kamar')){
        //     if ($room->image && file_exists(storage_path('app/public/' . $room->image))){
        //         Storage::disk('local')->delete(['public/'.$room->image]);
        //         $validateData['foto_kamar'] = $request->file('foto_kamar')->store('rooms');
        //     }
        // }

        // if($request->file('foto_kamar')){
            $room->update([
                'room_number' => $validateData['nomor_kamar'],
                'price' => $validateData['harga'],
                'image' => $validateData['url'],
                'status' => $validateData['status'],
                'description' => $validateData['deskripsi']
            ]);
        // }else{
        //     $room->update([
        //         'room_number' => $validateData['nomor_kamar'],
        //         'price' => $validateData['harga'],
        //         'status' => $validateData['status'],
        //         'description' => $validateData['deskripsi']
        //     ]);
        // }


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
