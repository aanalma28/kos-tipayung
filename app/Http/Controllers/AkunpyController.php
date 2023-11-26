<?php

namespace App\Http\Controllers;

use App\Models\Akunpenyewa;
use Illuminate\Http\Request;

class AkunpyController extends Controller
{

    public function index(){
        return view('penyewa.akunpy',[
            'users' => User::all()
        ]);
    }
}
