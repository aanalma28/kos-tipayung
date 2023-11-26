@extends('layouts.dashboard')
@section('content')
    <section class="px-4 md:px-20 py-4 flex items-center justify-center">
        <div class="py-8 px-4 border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 rounded shadow-md w-fit">
            <div class="px-4 py-4 min-h-fit border-solid border-slate-700 rounded-lg">
                <h1 class="w-full md:w-[450px] text-4xl font-semibold text-gray-700 dark:text-white">Form Edit Kamar</h1>
                <p class="text-lg w-full text-gray-600 dark:text-gray-300">Isi Formulir berikut untuk meng-edit kamar...</p>
                <div class="py-8">
                <form action="/room/{{ $data->id }}" enctype="multipart/form-data" method="post" title="Form Untuk Edit Kamar" class="mt-8 max-w-sm mx-auto">
                @method('put')
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 mb-2" for="nomor_kamar">
                        Nomor Kamar <span class="text-red-600">*</span>
                    </label>
                    <input required name="nomor_kamar"
                        value="{{ $data->room_number }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="nomor_kamar" 
                        type="text" 
                        placeholder="01, 02 ...">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 mb-2" for="status">
                        Status <span class="text-red-600">*</span>
                    </label>
                    <select required id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($options as $option)
                            @if ($option == $data->status )
                                <option value="{{strtolower($option)}}" selected>{{$option}}</option>
                                @else
                                <option value="{{strtolower($option)}}">{{$option}}</option>
                            @endif    
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 mb-2" for="deskripsi">
                        Deskripsi <span class="text-red-600">*</span>
                    </label>
                    <textarea required 
                        name="deskripsi"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="deskripsi" placeholder="Deskripsi">{{ $data->description }}</textarea>                        
                    </textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 mb-2" for="harga">
                        Harga <span class="text-red-600">*</span>
                    </label>
                    <input required
                        value="{{ $data->price }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="harga" 
                        name="harga" 
                        type="number" 
                        placeholder="1000000">
                    <p href="#" title="Penyebutan Harga" id="harga-text" class="text-gray-600 text-sm italic"></p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 mb-2" for="foto_kamar">
                        Upload Foto Kamar <span class="text-red-600">*</span>
                    </label>
                    <input 
                        name="foto_kamar"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"                        
                        id="foto_kamarroom" 
                        type="file"
                        accept=".jpg, .jpeg, .png" >
                    <p class="text-gray-600 text-xs italic">Format JPG atau PNG</p>
                </div>
                <div class="grid grid-cols-2 gap-8">
                    <button type="submit"
                        class="w-full px-4 py-2 mt-4 text-white bg-green-500 rounded hover:bg-green-700">Simpan</button>
                    <a id="cancelButton"
                        class="cursor-pointer w-full px-4 py-2 mt-4 text-green-700 border border-green-500 rounded hover:border-green-700 hover:bg-green-900/20 text-center">Batal</a>
                </div>
                </form>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer')
    <!-- script penyebutan -->
    <script>
    const harga = document.getElementById("harga");
    const hargaText = document.getElementById("harga-text");

    harga.addEventListener("input", function () {
        let angka = this.value;
        hargaText.innerHTML = terbilang(angka) + " rupiah";
    });

    function terbilang(angka) {
        if (angka < 0) return "minus " + terbilang(-angka);
        if (angka < 10) return satuan[angka];
        if (angka < 20) return belasan[angka - 10];
        if (angka < 100) return puluhan[Math.floor(angka / 10)] + (angka % 10 ? " " + satuan[angka % 10] : "");
        if (angka < 1000) return satuan[Math.floor(angka / 100)] + " ratus" + (angka % 100 ? " " + terbilang(angka % 100) : "");
        if (angka < 1000000) return terbilang(Math.floor(angka / 1000)) + " ribu" + (angka % 1000 ? " " + terbilang(angka % 1000) : "");
        return terbilang(Math.floor(angka / 1000000)) + " juta" + (angka % 1000000 ? " " + terbilang(angka % 1000000) : "");
    }

    const satuan = ["nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];
    const belasan = ["sepuluh", "sebelas", "dua belas", "tiga belas", "empat belas", "lima belas", "enam belas", "tujuh belas", "delapan belas", "sembilan belas"];
    const puluhan = ["", "", "dua puluh", "tiga puluh", "empat puluh", "lima puluh", "enam puluh", "tujuh puluh", "delapan puluh", "sembilan puluh"];

    </script>
@endsection
