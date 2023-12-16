@extends('layouts.guest')
@section('content')
<div class="grid gap-4">
        <section class="py-4 flex justify-center">
            <div>
                <img class="h-auto md:max-h-[400px] max-w-full rounded-lg" src="{{ $data->image }}" alt="">
            </div>
        </section>
        <section class="w-full pt-4 pb-20 px-4 md:w-5/6 mx-auto">
            <div class="flex mx-auto gap-8 flex-col md:flex-row md:w-max md:min-w-[600px] md:max-w-2xl lg:max-w-3xl">
                <div class="flex flex-col w-full gap-1 md:w-1/4">
                    <p class="flex justify-between text-gray-900 dark:text-white font-light">No. Kamar <span class="font-semibold">{{$data->room_number}}</span></p>
                    <p class="flex justify-between text-gray-900 dark:text-white font-light">Status <span class="font-semibold">{{$data->status}}</span></p>
                    <p class="flex justify-between text-gray-900 dark:text-white font-light">Harga <span class="font-semibold">Rp. {{number_format($data->price, 0, ',', '.')}}</span></p>
                    <!-- Modal toggle -->
                    <button data-modal-target="form-sewa-modal" data-modal-toggle="form-sewa-modal" class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-md px-5 py-2.5 mb-2 mt-4 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                    Ajukan penyewaan!
                    </button>

                    <!-- Main modal -->
                    <div id="form-sewa-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Form penyewaan
                                    </h3>
                                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="form-sewa-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form class="space-y-4" action="/register-room" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="hidden">
                                            <label for="room_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room Number<span class="text-red-600">*</span></label>
                                            <input type="text" name="room_number" id="room_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$data->room_number}}" required>
                                        </div>
                                        <div class="hidden">
                                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room Number<span class="text-red-600">*</span></label>
                                            <input type="text" name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="pending" required>
                                        </div>
                                        <div>
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama <span class="text-red-600">*</span></label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: John Doe" required>
                                        </div>
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email <span class="text-red-600">*</span></label>
                                            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: johndoe@example.com" required>
                                            @error('email')
                                                <div class="text-red-600">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon<span class="text-red-600">*</span></label>
                                            <input type="number" name="phone" id="phone" placeholder="Contoh: 085xxxxxxxx" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            @error('phone')
                                                <div class="text-red-600">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Foto KTP/KK</label>
                                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="foto_pengajuan" name="image" type="file"accept=".jpg, .jpeg, .png" max="10485760" required>
                                            <p class="text-gray-600 text-xs italic">Max 10Mb Format JPG atau PNG</p>
                                        </div>
                                        <div class="notifs dark:text-white"></div>
                                        <input type="text" name="url" id="url" class="urlimg hidden" required readonly>
                                        <button type="submit" disabled class="waitsubmit w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Ajukan Penyewaan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col flex-1 gap-2 text-gray-900 dark:text-white">
                    <h5 class="font-light">Deskripsi</h5>
                    {!!nl2br(e($data->description))!!}
                </div>
            </div>
        </section>
    </div>
@endsection
