<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Tabungan;
use App\Mail\RegisterMail;
use App\Models\Pembayaran;
use App\Models\RegisterRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    //
    public function index(){        
        date_default_timezone_set('Asia/Jakarta');
        $user = auth()->user();
        $tabungans = auth()->user()->tabungans;
        $current = Carbon::now();
        $get_user_bayar = Pembayaran::where('user_id',$user->id)->latest()->get();
        $user_bayar = Pembayaran::where('user_id',$user->id)->latest()->first();
        if($get_user_bayar->count()){
            $tanggalPembayaran = Carbon::parse($user_bayar->tanggal_pembayaran);
            $tanggalPembayaranFormatted = $tanggalPembayaran->toFormattedDateString();
            $user_tenggat = $tanggalPembayaran->addMonths(3)->toFormattedDateString();
            if (now()->greaterThan($user_tenggat)) {
                $sisa_hari = "Sudah waktunya membayar";
            } else {
                $sisa = now()->diffInDays($user_tenggat);
                $sisa_hari = $sisa . ' Hari lagi'; 
            }
        }else{
            $tanggalPembayaranFormatted = '';
            $user_tenggat = '';
            $sisa_hari = ''; 
        }


        if($user->role === 'owner'){
            return view('owner.owner', [
                'datas' => RegisterRoom::all()
            ]);
        }else{
            return view('penyewa.penyewa',[
                'tabungans' => $tabungans,
                'user' => $user,
                'current' => $current,
                'get_user_bayar' => $get_user_bayar,
                'user_bayar' => $tanggalPembayaranFormatted,
                'user_tenggat' => $user_tenggat,
                'sisa_hari' => $sisa_hari
            ]);
        }        
    }

    public function accept(RegisterRoom $user){
        $arrayData = [
            "name" => $user->name,
            "email" => $user->email,
            "phone" => $user->phone,            
        ];        
        $user->update([
            'status' => 'accepted'
        ]);

        Mail::to($user->email)->send(new RegisterMail($arrayData, 'acceptemail'));
        return redirect('/dashboard')->with('success', 'Accept feedback send !');
    }

    public function decline(RegisterRoom $user){
        $arrayData = [
            "name" => $user->name,
            "email" => $user->email,
            "phone" => $user->phone,            
        ];
        $user->update([
            'status' => 'rejected'
        ]);

        Mail::to($user->email)->send(new RegisterMail($arrayData, 'rejectemail'));
        return redirect('/dashboard')->with('success', 'Reject feedback send !');
    }    

    public function delete(RegisterRoom $user){
        RegisterRoom::destroy($user->id);
        return redirect('/dashboard')->with('success', 'Data has been deleted !');
    }
}
