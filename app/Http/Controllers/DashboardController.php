<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){        
        $role = auth()->user()->role;
        $tabungans = auth()->user()->tabungans;

        if($role === 'owner'){
            return view('owner.owner');
        }else{
            return view('penyewa.penyewa',[
                'tabungans' => $tabungans
            ]);
        }        
    }
}
