@extends('layouts.guest')
@section('content')
<div class="md:w-11/12 w-full lg:max-w-screen-xl mx-auto px-4 pb-8">

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
                <a href="/room-{{$data->id}}/detail" class="relative">
                    <span class="bg-blue-200 text-base font-medium text-blue-800 text-center p-1 leading-none rounded-md px-2 dark:bg-blue-900 dark:text-blue-200 absolute -translate-y-1/2 translate-x-2 left-auto top-0 right-0">{{ $data->status }}</span>
                    <img class="rounded-t-lg" src="storage/{{ $data->image }}" alt="" />
                </a>
                <div class="p-5">
                    <p class="text-gray-900 dark:text-white text-lg flex justify-between">Harga <span class="font-semibold">Rp {{number_format($data->price, 0, ',', '.')}} (per 3 bulan)</span></p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-2">{{$data->description}}</p>
                    @if ($data->status == 'tersedia')
                    <a href="/{{$data->id}}/detail" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
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