@extends('layouts.dashboard')

@section('content')
<h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Laporan Keuangan</h1>
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
                            <th id="kanan" scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- jika tidak ada data -->
                        <!-- <tr>
                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white" colspan="4">Tidak ada pengajuan sewa</th>
                        </tr> -->
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                01
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Pending
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Pending
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Pending
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Pending
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Pending
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Pending
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Pending
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Hapus
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </div>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection