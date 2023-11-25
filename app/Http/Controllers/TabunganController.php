<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{

    public function index(){
        return view('penyewa.penyewa',[
            'tabungans' => Tabungan::all()
        ]);
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'namatabungan' => 'required',
            'targettabungan' => 'required'
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
