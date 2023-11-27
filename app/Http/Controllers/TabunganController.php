<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{

    public function update(Request $request, Tabungan $tabungan){
        $validateData = $request->validate([
            'namatabungan' => 'required',
            'targettabungan' => 'required',
            'saldotabungan' => 'required',    
        ]);

        $tabungan->update([
            'namatabungan' => $validateData['namatabungan'],
            'targettabungan' => $validateData['targettabungan'],
            'saldotabungan' => $validateData['saldotabungan'],            
        ]);
        return redirect('/dashboard')->with('success', 'Tabungan Updated !');
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'namatabungan' => 'required',
            'targettabungan' => 'required',
            'user_id'=>'required'
        ]);

        Tabungan::create($validatedData);

        return redirect('/dashboard')->with("success","Berhasil menambahkan tabungan");
    }

    public function destroy(Tabungan $tabungan){
        $hapus = Tabungan::destroy($tabungan->id);
        if($hapus){
            return redirect('/dashboard')->with("success","Berhasil menghapus tabungan");
        }else{
            return redirect('/dashboard')->with("fail","Gagal menghapus tabungan");
        }
    }

}
