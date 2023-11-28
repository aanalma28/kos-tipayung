@extends('layouts.dashboard')
@section('content')
<section class="px-4 md:px-20 py-4 flex items-center justify-center">
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
    <div class="py-8 px-4 border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 rounded shadow-md w-fit">
        <div class="px-4 py-4 min-h-fit border-solid border-slate-700 rounded-lg">
            <h1 class="w-full md:w-[450px] text-4xl font-semibold text-gray-700 dark:text-white">Form Buat Akun</h1>
            <p class="text-lg w-full text-gray-600 dark:text-gray-300">Isi Formulir berikut untuk membuat akun</p>
            <div class="py-4">
                <form class="mt-4 max-w-sm mx-auto" method="post" action="/user" onsubmit="return validateForm()">
                    @csrf                    
                    <label class="block">
                        <span class="text-gray-700 dark:text-gray-200">Name <span class="text-red-600">*</span></span>
                        <input type="text" name="name" id="name" value="{{$data->name}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: John Doe" required>
                        @error('name')
                            <div class="text-red-600">
                                {{$message}}
                            </div>
                        @enderror
                    </label>
                    <label class="block mt-3">
                        <span class="text-gray-700 dark:text-gray-200">Email <span class="text-red-600">*</span></span>
                        <input type="email" name="email" value="{{$data->email}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh@gmail.com" required>
                        @error('email')
                            <div class="text-red-600">
                                {{$message}}
                            </div>
                        @enderror
                    </label>
                    <label class="block mt-3">
                        <span class="text-gray-700 dark:text-gray-200">Phone <span class="text-red-600">*</span></span>
                        <input type="number" name="phone" id="phone" value="{{$data->phone}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: 081234567890" required>
                        @error('phone')
                            <div class="text-red-600">
                                {{$message}}
                            </div>
                        @enderror
                    </label>
                    <label class="block mt-3">
                        <span class="text-gray-700 dark:text-gray-200">Password <span class="text-red-600">*</span></span>
                        <input type="password" name="password" id="confirmPassword" value="" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan Password..." required>
                        @error('password')
                            <div class="text-red-600">
                                {{$message}}
                            </div>
                        @enderror
                        <button type="button" onclick="togglePasswordVisibility('confirmPassword')" class="mt-2 text-gray-400 ">Lihat Password</button>
                    </label>
                    <label class="block mt-3" for="room_number">
                        <span class="text-gray-700 dark:text-gray-200">Kamar Tersedia <span class="text-red-600">*</span>
                    </label>
                    <select required id="room_number" name="room_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected >Pilih Kamar</option>
                        @foreach($rooms as $room)                     
                            <option value="{{ $room->room_number }}"
                            @if ($room->room_number == $data->room_number)
                                selected
                            @endif
                            >{{ $room->room_number }}</option>
                        @endforeach
                    </select>
                    @error('room_number')
                        <div class="text-red-600">
                            {{$message}}
                        </div>
                    @enderror
                    <div class="grid grid-cols-2 gap-8">
                    <button type="submit"
                        class="w-full px-4 py-2 mt-4 text-white bg-green-500 rounded hover:bg-green-700">Buat Akun</button>
                    <a href="/dashboard" id="cancelButton"
                        class="w-full px-4 py-2 mt-4 text-green-700 border border-green-500 rounded hover:border-green-700 hover:bg-green-900/20 text-center">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function togglePasswordVisibility(inputId) {
        const passwordInput = document.getElementById(inputId);
        const button = document.querySelector('[onclick="togglePasswordVisibility(\'' + inputId + '\')"]');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            button.textContent = "Sembunyikan Password";
        } else {
            passwordInput.type = "password";
            button.textContent = "Lihat Password";
        }
    }

    // Validasi sebelum mengirim formulir
    function validateForm() {
        const passwordInput = document.getElementById('confirmPassword');

        if (passwordInput.type === 'text') {
            alert('Sembunyikan password sebelum mengirim formulir!');
            return false;
        }

        return true;
    }

</script>
@endsection
