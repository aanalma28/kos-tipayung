<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Tabungan;
use App\Mail\RegisterMail;
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
        $sekarang = Carbon::now()->addDays(90);

        if($user->role === 'owner'){
            return view('owner.owner', [
                'datas' => RegisterRoom::all()
            ]);
        }else{
            return view('penyewa.penyewa',[
                'tabungans' => $tabungans,
                'user' => $user,
                'sekarang' => $sekarang,
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
