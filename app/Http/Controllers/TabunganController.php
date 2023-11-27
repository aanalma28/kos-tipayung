<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{

    public function index(){
        $user = auth()->user();
        return view('penyewa.penyewa',[
            'tabungans' => Tabungan::all(),
            'user' => $user
        ]);
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'namatabungan' => 'required',
            'targettabungan' => 'required',
            'user_id'=> auth()->user()->id,
        ]);

        Tabungan::create($validatedData);

        return redirect('/penyewa')->with("success","Berhasil menambahkan tabungan");
    }

    public function destroy(Request $request){
        $tabungan = Tabungan::findOrFail($request->id);
        $tabungan->delete();
        // Tabungan::where("id", $request->id)->delete();
        
        return redirect('/penyewa')->with("successDelete","Berhasil menghapus tabungan");
    }

}
