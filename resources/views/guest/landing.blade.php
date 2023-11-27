@extends('layouts.guest')
@section('content')
<div class="md:w-11/12 w-full lg:max-w-screen-xl mx-auto px-4 pb-8">
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

<!-- Hero section -->
    <section class="bg-white dark:bg-gray-900 py-8">
        <div class="flex flex-col md:flex-row justify-between gap-10 text-center md:text-left">
            <div class="flex-1 flex flex-col justify-center items-center md:items-start">
                <h1 class="text-4xl text-gray-900 font-bold mb-6 dark:text-white">Kos Putra Tipayung 2</h1>
                <p class="text-2xl text-gray-500 font-normal mb-8 dark:text-gray-400">Segera rasakan atmosfer nyaman dan aman di kos kami. Ayo, cari kamar Anda sekarang!</p>
                <a href="#daftarKamar" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-semibold rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-max">Cari kamar sekarang!</a>
            </div>
            <div class="flex-1">
                <img class="rounded-2xl" src="https://placehold.co/600x400" alt="Kos Tipayung 2">
            </div>
        </div>
    </section>

    <!-- Lokasi section -->
    <section id="lokasi" class="bg-white dark:bg-gray-900 py-8 mt-8">
        <h2 class="text-gray-900 dark:text-white text-3xl font-semibold text-center mb-9">Lokasi</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.4543291479133!2d110.8654164!3d-6.7920706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dad2c0394f15%3A0xa1da0622ddd76581!2sCristal%20Es!5e0!3m2!1sen!2sid!4v1700620839202!5m2!1sen!2sid" class="w-full md:w-4/5 h-[300px] md:h-[500px] rounded-2xl mx-auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    
    <!-- Daftar kamar section -->
    <section id="daftarKamar" class="bg-white dark:bg-gray-900 py-8 mt-8">
        <h2 class="text-gray-900 dark:text-white text-3xl font-semibold text-center mb-9">Daftar Kamar</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ( $datas as $data )
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 {{$data->status == 'disinggahi' ? 'pointer-events-none':''}}">
                <a href="/register-room/{{$data->id}}/detail" class="relative">
                    <span class="bg-blue-200 text-base font-medium text-blue-800 text-center p-1 leading-none rounded-md px-2 dark:bg-blue-900 dark:text-blue-200 absolute -translate-y-1/2 translate-x-2 left-auto top-0 right-0">{{ $data->status }}</span>
                    <img class="rounded-t-lg" src="storage/{{ $data->image }}" alt="" />
                </a>
                <div class="p-5">
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp {{number_format($data->price, 0, ',', '.')}} (per 3 bulan)</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-2">{{$data->description}}</p>
                    @if ($data->status == 'tersedia')
                    <a href="/register-room/{{$data->id}}/detail" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Lihat Detail
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection