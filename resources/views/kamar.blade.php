@extends('layouts.dashboard')

@section('content')
@if(session()->has('success'))
    <h3>Sukses</h3>
@endif
@if(session()->has('error'))
    <h3>Error</h3>
@endif
<a href="/room/create" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Tambah Kamar</a>
<div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-5">
    @foreach($datas as $data):    
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="/detail" class="relative">
            <span class="bg-blue-200 text-base font-medium text-blue-800 text-center p-1 leading-none rounded-md px-2 dark:bg-blue-900 dark:text-blue-200 absolute -translate-y-1/2 translate-x-2 left-auto top-0 right-0">{{ $data->status }}</span>
            <img class="rounded-t-lg" src="storage/{{ $data->image }}" alt="" />
        </a>
        <div class="p-5">
            <p class="text-gray-900 dark:text-white text-lg flex justify-between">Nomor Kamar<span class="font-semibold">{{ $data->room_number }}</span></p>
            <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp {{ $data->price }}</span></p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $data->description }}</p>
            <div class="flex gap-4">
                <a href="/room/{{ $data->id }}/edit" class="inline-flex flex-1 justify-center items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Edit
                <form action="/room/{{ $data->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="inline-flex flex-1 justify-center items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection