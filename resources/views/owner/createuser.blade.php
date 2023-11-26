@extends('layouts.dashboard')
@section('content')
<section class="px-4 md:px-20 py-4 flex items-center justify-center">
    <div class="py-8 px-4 border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 rounded shadow-md w-fit">
        <div class="px-4 py-4 min-h-fit border-solid border-slate-700 rounded-lg">
            <h1 class="w-full md:w-[450px] text-4xl font-semibold text-gray-700 dark:text-white">Form Tambah Akun</h1>
            <p class="text-lg w-full text-gray-600 dark:text-gray-300">Isi Formulir berikut untuk membuat akun...</p>
            <div class="py-8">
                <form class="mt-8 max-w-sm mx-auto" method="post" action="/user" onsubmit="return validateForm()">
                    @csrf
                    <label class="block">
                        <span class="text-gray-700 dark:text-gray-200">Name <span class="text-red-600">*</span></span>
                        <input type="text" name="name" id="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: John Doe" required>
                    </label>
                    <label class="block mt-3">
                        <span class="text-gray-700 dark:text-gray-200">Email <span class="text-red-600">*</span></span>
                        <input type="email" name="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh@gmail.com" required>
                    </label>
                    <label class="block mt-3">
                        <span class="text-gray-700 dark:text-gray-200">Phone <span class="text-red-600">*</span></span>
                        <input type="number" name="phone" id="phone" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: 081234567890" required>
                    </label>
                    <label class="block mt-3">
                        <span class="text-gray-700 dark:text-gray-200">Password <span class="text-red-600">*</span></span>
                        <input type="password" name="password" id="confirmPassword"  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan Password..." required>
                        <button type="button" onclick="togglePasswordVisibility('confirmPassword')" class="mt-2 text-gray-400 ">Lihat Password</button>
                    </label>
                    <div class="grid grid-cols-2 gap-8">
                    <button type="submit"
                        class="w-full px-4 py-2 mt-4 text-white bg-green-500 rounded hover:bg-green-700">Buat Akun</button>
                    <a href="/user" id="cancelButton"
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
