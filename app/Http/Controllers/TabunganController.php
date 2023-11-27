<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{

    public function index(){
        
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
            return redirect('/penyewa')->with("success","Berhasil menghapus tabungan");
        }else{
            return redirect('/penyewa')->with("fail","Gagal menghapus tabungan");
        }
    }

}
