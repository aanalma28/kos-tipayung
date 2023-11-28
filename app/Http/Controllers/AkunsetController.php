<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunsetController extends Controller
{
    public function showAccount()
    {
        date_default_timezone_set('Asia/Jakarta');
        $user = auth()->user();
        $sekarang = new DateTime();

        return view('penyewa.akunsetting', [
            'user' => $user,
            'current' =>$sekarang->format('Y-m-d H:i:s')
        ]);
    }

    public function updateAccount(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $old_password = $request->get('old_password');
        $new_password = $request->get('new_password');

        if ($old_password && $new_password) {
            $old_password_hash = bcrypt($old_password);
            
            if (!Hash::check($old_password, $user->password)) {
                return redirect()->back()->with('error', 'Password lama salah.');
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
