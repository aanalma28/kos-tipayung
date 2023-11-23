<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kos | Form Buat akun</title>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
        
    </script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900">
    @include('partials.navbar')
    <section class="px-4 md:px-20 py-4 flex items-center justify-center">
        <div class="py-8 px-4 border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 rounded shadow-md w-fit">
            <div class="px-4 py-4 min-h-fit border-solid border-slate-700 rounded-lg">
                <h1 class="w-full md:w-[450px] text-4xl font-semibold text-gray-700 dark:text-white">Form Tambah Akun</h1>
                <p class="text-lg w-full text-gray-600 dark:text-gray-300">Isi Formulir berikut untuk membuat akun...</p>
                <div class="py-8">
                    <form action="" class="mt-8 max-w-sm mx-auto">
                        <label class="block">
                            <span class="text-gray-700 dark:text-gray-200">Email*</span>
                            <input type="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh@gmail.com" required>
                        </label>
                        <label class="block mt-3">
                            <span class="text-gray-700 dark:text-gray-200">Password*</span>
                            <input type="password" id="confirmPassword"  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan Password..." required>
                            <button type="button" onclick="togglePasswordVisibility('confirmPassword')" class="mt-2 text-gray-400 ">Lihat Password</button>
                        </label>
                        <button type="submit" class="w-full px-4 py-2 mt-4 text-white bg-green-500 rounded hover:bg-green-700">Buat Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer')
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
</script>

</body>
</html>
