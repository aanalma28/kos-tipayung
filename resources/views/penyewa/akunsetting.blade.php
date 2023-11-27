@extends('layouts.dashboard')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-12 gap-8 mt-2">
        <div class="order-2 md:order-1">
            <form action="{{ route('akun.update') }}" method="post" class="flex flex-col gap-4">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Akun</h2>
                <p class="text-gray-500" >Berikut informasi Akun penyewa...</p>
                @csrf
                <input type="text" value="{{auth()->user()->id}}" hidden>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                    <input 
                    type="text" 
                    id="nama_lengkap" 
                    name="name" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    value="{{ $user->name }}" 
                    required readonly>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    value="{{ $user->email }}" 
                    required readonly>
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
                    <input 
                    type="number" 
                    id="telepon" 
                    name="phone" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    value="{{ $user->phone }}" 
                    required readonly>
                </div>
                <button id="editkah" type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Edit Akun?</button>
            </form>
        </div>
        <div class="order-1 md:order-2 max-w-sm bg-white  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-max">
            <div class="p-5">
                <p class="text-gray-900 dark:text-white text-lg flex justify-between">Nomor Kamar<span class="font-semibold">{ $user->room->room_number }</span></p>
                <div class="text-gray-900 dark:text-white text-lg flex justify-between">Harga
                    <p class="flex justify-end">
                        <span class="font-semibold currency">{ $user->room->price }</span>
                        <span class="font-semibold">/3 bln</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection