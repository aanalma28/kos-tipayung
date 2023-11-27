<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunsetController extends Controller
{
    public function showAccount(Request $request)
    {
        $user = auth()->user();
        return view('penyewa.akunsetting', ['user' => $user]);
    }

    public function updateAccount(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('akun.show')->with('success', 'Akun anda telah berhasil diubah.');
    }
}
