<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Financial;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    //
    public function calculate(){
        $currentYear = Carbon::now()->year;
        $years = range($currentYear, $currentYear - 5);

        return view('owner.addkeuangan', [
            'years' => $years,
        ]);

    }

    public function create(Request $request){        
        $validateData = $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'uang_rental' => 'required',
            'lain_lain_pemasukan' => 'required',
            'total_pemasukan' => 'required',
            'biaya_utilitas' => 'required',
            'biaya_operasional' => 'required',
            'biaya_lain_lain' => 'required',
            'total_pengeluaran' => 'required',
            'pendapatan_kotor' => 'required',
            'pendapatan_bersih' => 'required',
        ]);

        Financial::create([
            'month' => $validateData['bulan'],
            'year' => $validateData['tahun'],
            'rent_costs' => $validateData['uang_rental'],
            'other_income' => $validateData['lain_lain_pemasukan'],
            'sum_income' => $validateData['total_pemasukan'],
            'utility_costs' => $validateData['biaya_utilitas'],
            'operational_costs' => $validateData['biaya_operasional'],
            'other_outcome' => $validateData['biaya_lain_lain'],
            'sum_outcome' => $validateData['total_pengeluaran'],
            'gross_income' => $validateData['pendapatan_kotor'],
            'net_income' => $validateData['pendapatan_bersih'],
        ]);

        return redirect('/reports')->with('success', 'Financial Reports has been added !');
    }

    public function reports(){
        return view('owner.laporan', [
            'datas' => Financial::all()
        ]);
    }

    public function delete(Financial $data){        
        Financial::destroy($data->id);
        return redirect('/reports')->with('success', 'Data has been deleted !');
    }
}
