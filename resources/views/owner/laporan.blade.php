@extends('layouts.dashboard')

@section('content')
<h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Laporan Keuangan</h1>
@if(session()->has('error'))
    <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{session('error')}}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
@if(session()->has('success'))
    <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{session('success')}}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
<div class="grid grid-cols-2 gap-8">
    <a href="#kiri" class="dark:text-gray-400">&lt;&lt;--</a>
    <a href="#kanan" class="text-right dark:text-gray-400" >--&gt;&gt;</a>
</div>
<div class="overflow-y-scroll max-h-screen scroll-smooth table-container ">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table id="tabel" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 divide-y divide-gray-200 sm:divide-y-0 sm:divide-x sm:w-full">
                <div class="overflow-auto max-h-screen scroll-smooth table-container ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                        <tr>
                            <th id="kiri" scope="col" class="px-6 py-3">
                                Bulan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tahun
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Uang Rental (Pemasukan)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lain-Lain (Pemasukan)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Pemasukan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Biaya Utilitas (Pengeluaran)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Biaya Operasional (Pengeluaran)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lain-lain (Pengeluaran)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Pengeluaran
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pendapatan Kotor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pendapatan Bersih
                            </th>
                            <th id="kanan" scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($datas->isEmpty())
                        <!-- jika tidak ada data -->
                        <tr>
                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="4">Tidak ada pengajuan sewa</th>
                        </tr>
                        @else
                        @foreach($datas as $data)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->month}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->year}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white currency">
                                {{$data->rent_costs}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white currency">
                                {{$data->other_income}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white currency">
                                {{$data->sum_income}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white currency">
                                {{$data->utility_costs}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white currency">
                                {{$data->operational_costs}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white currency">
                                {{$data->other_outcome}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white currency">
                                {{$data->sum_outcome}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white currency">
                                {{$data->gross_income}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white currency">
                                {{$data->net_income}}
                            </td>
                            <td class="px-6 py-4">
                                <form action="/reports/{{$data->id}}/delete" method="post">
                                    @csrf
                                    <button type="submit"
                                    class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </div>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection