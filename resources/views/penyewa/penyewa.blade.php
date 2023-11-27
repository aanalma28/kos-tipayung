@extends('layouts.dashboard')

@section('content')
    @if(session()->has('fail'))
        <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{session('fail')}}</div>
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
    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-12 gap-8 mt-2">
        <div class="order-2 md:order-1">
            <form action="/tambahtabungan" method="post" class="flex flex-col gap-4">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Tabungan</h2>
                @csrf
                <input type="text" value="{{auth()->user()->id}}" name="user_id" hidden>
                <div>
                    <label for="namatabungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama tabungan</label>
                    <input type="text" id="namatabungan" name="namatabungan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: Pergi ke jepang" required>
                </div>
                <div>
                    <label for="targettabungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target tabungan</label>
                    <div class="relative mb-6">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none text-gray-900 dark:text-white">
                        Rp
                    </div>
                    <input type="number" id="targettabungan" name="targettabungan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                    </div>
                </div>
                <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Tambahkan tabungan</button>
            </form>
        </div>
        <div class="order-1 md:order-2 max-w-sm bg-white  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-max">
            <div class="p-5">
                <p class="text-gray-900 dark:text-white text-lg flex justify-between">Nomor Kamar<span class="font-semibold">01</span></p>
                <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp 300.000/bulan</span></p>
            </div>
        </div>
    </div>
    @if($tabungans->count())
    <h2 class="mt-6 mb-3 text-3xl font-bold text-gray-900 dark:text-white">Daftar tabungan</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($tabungans as $tabungan)
                <div class="block bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-4">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$tabungan->namatabungan}}</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Target : Rp {{number_format($tabungan->targettabungan, 0, ',', '.')}}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Saldo : Rp {{number_format($tabungan->saldotabungan, 0, ',', '.')}}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        @if ($tabungan->targettabungan - $tabungan->saldotabungan >= 0)
                        Tabungan kurang <span class="text-red-700">Rp {{number_format($tabungan->targettabungan - $tabungan->saldotabungan, 0, ',', '.')}}</span> lagi
                        @else
                        Tabungan lebih <span class="text-green-700">Rp {{number_format(abs($tabungan->targettabungan - $tabungan->saldotabungan), 0, ',', '.')}}</span> melebihi target 
                        @endif
                    </p>
                    <div class="mt-2 flex justify-center items-center gap-8">
                        <!-- Modal toggle -->
                        <button data-modal-target="{{$tabungan->id}}" data-modal-toggle="{{$tabungan->id}}" class=" block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex-1" type="button">
                            Tambahkan saldo / Edit
                        </button>
                        <form action="/{{$tabungan->id}}/hapustabungan" method="post">
                            @csrf
                            <input type="text" value="{{$tabungan->id}}" class="hidden">
                            <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-500 dark:focus:ring-red-800 flex-1">Hapus</button>
                        </form>
                    </div>

                        <!-- Main modal -->
                        <div id="{{$tabungan->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Edit Tabungan
                                        </h3>
                                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{$tabungan->id}}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <form class="space-y-4" action="/tabungan/{{$tabungan->id}}/edit" method="post">
                                            @csrf
                                            <div>
                                                <label for="namatabungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama tabungan</label>
                                                <input type="text" name="namatabungan" id="namatabungan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$tabungan->namatabungan}}" required>
                                            </div>
                                            <div>
                                                <label for="targettabungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target tabungan</label>
                                                <input type="number" name="targettabungan" id="targettabungan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$tabungan->targettabungan}}" required>
                                            </div>
                                            <div>
                                                <label for="saldotabungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saldo tabungan</label>
                                                <input type="number" name="saldotabungan" id="saldotabungan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$tabungan->saldotabungan}}" required>
                                            </div>
                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                </div>
                @endforeach
        @endif
    </div>
@endsection