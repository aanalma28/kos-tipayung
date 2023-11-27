<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $old_password = $request->get('old_password');
        $new_password = $request->get('new_password');

        if ($old_password && $new_password) {
            $old_password_hash = bcrypt($old_password);
            
            if (!Hash::check($old_password, $user->password)) {
                return redirect()->back()->with('error', 'Kata sandi lama salah.');
            }
            $user->password = bcrypt($new_password);
        }


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('akun.show')->with('success', 'Akun anda telah berhasil diubah.');
    }
    
}
